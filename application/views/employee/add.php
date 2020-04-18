<div class="container">

    <div class="content">

        <div class="content-container">
            <div class="content-header">                
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>">Home</a></li>                    
                    <li class="active">Employee</li>
                </ol>
            </div>
            <div class="row">

                <div class="col-md-12">

                    <div class="portlet">

                        <div class="portlet-header">

                            <h3>
                                <i class="fa fa-table"></i>
                                Current Employee List
                            </h3>
                            <a href="<?php echo base_url('employees'); ?>" class="btn btn-secondary pull-right">Employee List</a>

                        </div> <!-- /.portlet-header -->
                        <div class="portlet-content">
                            <form  class="form parsley-form" method="post" autocomplete="off" id="category-form" action="<?php echo base_url() . 'admin/category/ajax_add_channel'; ?>" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="text-input">Text input</label>
                                            <input type="text" id="text-input" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label for="textarea-input">Textarea</label>
                                            <textarea name="textarea-input" id="textarea-input" cols="10" rows="3" class="form-control"></textarea>
                                        </div>

                                    </div> <!-- /.col -->

                                    <div class="col-sm-4">
                                        <div class="form-group">  
                                            <label for="select-input">Select</label>
                                            <select id="select-input" class="form-control">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                                <option>6</option>
                                            </select>
                                        </div>

                                    </div> <!-- /.col -->

                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                            <a href="<?php echo base_url(); ?>admin/category/channel_list" class="btn btn-primary">Cancel</a>                                    
                                            <button type="submit" class="btn btn-success">Submit</button>
                                        </div>
                                    </div>

                                </div> <!-- /.row -->
                            </form>

                        </div>

                    </div>

                </div> <!-- /.portlet -->



            </div> <!-- /.col -->

        </div> <!-- /.row -->


    </div> <!-- /.content-container -->

</div> <!-- /.content -->

</div> <!-- /.container -->