<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Excel {

    private $excel;

    public function __construct() {
        require_once APPPATH . 'third_party/PHPExcel.php';
        $this->excel = new PHPExcel();
    }

    public function load($path) {
        $objReader = PHPExcel_IOFactory::createReader('Excel5');
        $this->excel = $objReader->load($path);
    }

    public function save($path) {
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
        $objWriter->save($path);
    }

    public function stream($filename, $data = null) {
        if ($data != null) {
            $col = 'A';
            foreach ($data[0] as $key => $val) {
                $objRichText = new PHPExcel();
                $this->excel->getActiveSheet()->getCell($col . '1')->setValue($key);
                $col++;
            }
            $rowNumber = 2;
            foreach ($data as $row) {
                $col = 'A';
                foreach ($row as $cell) {
                    $this->excel->getActiveSheet()->setCellValue($col . $rowNumber, $cell);
                    $col++;
                }
                $rowNumber++;
            }
        }
        header('Content-type: application/ms-excel');
        header("Content-Disposition: attachment; filename=\"" . $filename . "\"");
        header("Cache-control: private");
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
        $objWriter->save("export/$filename");
        //header("location: " . base_url() . "export/$filename");
        //unlink(base_url() . "export/$filename");
    }

    public function __call($name, $arguments) {
        if (method_exists($this->excel, $name)) {
            return call_user_func_array(array($this->excel, $name), $arguments);
        }
        return null;
    }

    public function streamCustom($filename, $data = array()) {

        if ($data != null) {
            $col = 'A';
            foreach ($data['list'][0] as $key => $val) {
                if (isset($data['headingname'][$key])) {
                    $objRichText = new PHPExcel();
                    $this->excel->getActiveSheet()->getCell($col . '1')->setValue($data['headingname'][$key]);
                    $this->excel->getActiveSheet()->getStyle($col . '1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('11B1ED');
                    $this->excel->getActiveSheet()->getStyle($col . '1')->getFont()->setBold(true)->setName('Verdana')->setSize(10)->getColor()->setRGB('FFFFFF');
                    $this->excel->getActiveSheet()->getColumnDimension($col)->setAutoSize(true);
                    $col++;
                }
            }
            $rowNumber = 2;
            foreach ($data['list'] as $key => $row) {

                $col = 'A';
                foreach ($row as $key => $cell) {

                    if (isset($data['headingname'][$key])) {
                        $this->excel->getActiveSheet()->setCellValue($col . $rowNumber, $cell);
                        $this->excel->getActiveSheet()->getDefaultRowDimension(1)->setRowHeight(20);
                        $ecol = $col;
                        $col++;
                    }
                }
                $rowNumber++;
            }

            if (isset($data['totalcommission'])) {
                $nextrowNumber = $rowNumber + 1;
                $previousCol = $this->get_previous_letter($ecol);
                $nextprevcol = $this->get_previous_letter($previousCol);
                $this->excel->getActiveSheet()->setCellValue($nextprevcol . $nextrowNumber, "Total Amount: " . $data['totalamount']);
                $this->excel->getActiveSheet()->getDefaultRowDimension(1)->setRowHeight(20);
                $this->excel->getActiveSheet()->setCellValue($previousCol . $nextrowNumber, "Total Commission: " . $data['totalcommission']);
                $this->excel->getActiveSheet()->getDefaultRowDimension(1)->setRowHeight(20);
                $this->excel->getActiveSheet()->setCellValue($ecol . $nextrowNumber, "Total: " . $data['grandtotal']);
                $this->excel->getActiveSheet()->getDefaultRowDimension(1)->setRowHeight(20);
            } else if (isset($data['totaltax'])) {
                $nextrowNumber = $rowNumber + 1;
                $previousCol = $this->get_previous_letter($ecol);
                $this->excel->getActiveSheet()->setCellValue($previousCol . $nextrowNumber, "Total Amount: " . $data['totalamount']);
                $this->excel->getActiveSheet()->getDefaultRowDimension(1)->setRowHeight(20);
                $this->excel->getActiveSheet()->setCellValue($ecol . $nextrowNumber, "Total GST: " . $data['totaltax']);
                $this->excel->getActiveSheet()->getDefaultRowDimension(1)->setRowHeight(20);
            } else if (isset($data['total'])) {
                $nextrowNumber = $rowNumber + 1;
                $this->excel->getActiveSheet()->setCellValue($ecol . $nextrowNumber, "Total Amount: " . $data['total']);
                $this->excel->getActiveSheet()->getDefaultRowDimension(1)->setRowHeight(20);
            }
        }

        header('Content-type: application/ms-excel');
        header("Content-Disposition: attachment; filename=\"" . $filename . "\"");
        header("Cache-control: private");
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
        $objWriter->save("export/$filename");
    }

    function get_previous_letter($string) {
        $last = substr($string, -1);
        $part = substr($string, 0, -1);
        if (strtoupper($last) == 'A') {
            $l = substr($part, -1);
            if ($l == 'A') {
                return substr($part, 0, -1) . "Z";
            }
            return $part . chr(ord($l) - 1);
        } else {
            return $part . chr(ord($last) - 1);
        }
    }

}
