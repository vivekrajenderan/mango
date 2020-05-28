<div class="container">

    <div class="content">

        <div class="content-container">
            <div class="content-header">                
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>">Home</a></li>                    
                    <li class="active">Daily</li>
                </ol>
            </div>
            <div class="row">

                <div class="col-md-12">

                    <div class="portlet">

                        <div class="portlet-header">

                            <h3>
                                <i class="fa fa-table"></i>
                                Daily Report - <?php echo date('d/m/Y');?>
                            </h3>                            
                        </div> <!-- /.portlet-header -->

                        <div class="portlet-content">           

                            <div class="table-responsive">                                
                                <table 
                                    class="table table-bordered">
                                    <thead>
                                        <tr>                                            
                                            <th>Account Type.</th>
                                            <th>Trans Amount</th>                                                                                     
                                            <th>Reference No</th> 
                                            <th>Trans Date</th>                                           
                                            <th>Comment</th>                       
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($list as $key => $value) { ?>
                                            <tr>                                           
                                                <td><?php echo (isset($value->acctype)) ? $value->acctype : ""; ?></td>
                                                <td><?php echo (isset($value->transamount)) ? $value->transamount : ""; ?></td>    
                                                <td><?php echo (isset($value->refno)) ? $value->refno : ""; ?></td>
                                                <td><?php echo (isset($value->transdate)) ? cdatedbton($value->transdate) : ""; ?></td>                                                                                                                                            
                                                <td><?php echo (isset($value->transtext)) ? $value->transtext : ""; ?></td>
                                            </tr>                                             
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div> <!-- /.table-responsive -->


                        </div> <!-- /.portlet-content -->

                    </div> <!-- /.portlet -->



                </div> <!-- /.col -->

            </div> <!-- /.row -->


        </div> <!-- /.content-container -->

    </div> <!-- /.content -->

</div> <!-- /.container -->

<div id="popupshow"></div>