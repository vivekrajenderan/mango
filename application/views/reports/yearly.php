<div class="container">

    <div class="content">

        <div class="content-container">
            <div class="content-header">                
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>">Home</a></li>                    
                    <li class="active">Yearly</li>
                </ol>
            </div>
            <div class="row">

                <div class="col-md-12">

                    <div class="portlet">

                        <div class="portlet-header">

                            <h3>
                                <i class="fa fa-table"></i>
                                Yearly Report 
                            </h3>                            
                        </div> <!-- /.portlet-header -->

                        <div class="portlet-content">
                            <div class="row">
                                <div class="col-sm-8 col-sm-offset-2">
                                    <form class="form parsley-form" action="<?php echo base_url() . 'reports/ajaxYearlyReport'; ?>" id="yearlyReport" method="post">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <label for="name">Choose Year</label>
                                            </div>
                                            <div class="col-sm-4">

                                                <input type="text" data-date-autoclose="true" data-date-format="yyyy" name="year" id="year" placeholder="Year" class="form-control" style="border: 1px solid #ccc;">

                                            </div>
                                            <div class="col-sm-4">
                                                <button class="btn btn-primary" type="submit">Submit</button>
                                            </div>
                                        </div>


                                    </form>
                                </div>
                            </div>
                            <div class="row" style="padding: 30px;">
                                <div id="ajaxReport" class="col-md-9 col-sm-offset-1">

                                </div>
                            </div>

                        </div> <!-- /.portlet-content -->

                    </div> <!-- /.portlet -->



                </div> <!-- /.col -->

            </div> <!-- /.row -->


        </div> <!-- /.content-container -->

    </div> <!-- /.content -->

</div> <!-- /.container -->
