<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <title>Kurinji Finance Management</title>

        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/admin//ico/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/font-awesome.min.css">        
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/jquery-ui-1.9.2.custom.min.css">        
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/custom.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/mango-admin.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/datepicker.css">
        <script>
            var baseurl = '<?php echo base_url(); ?>';
        </script> 
    </head>

    <body>

        <div class="navbar">

            <div class="container">

                <div class="navbar-header">

                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <i class="fa fa-cogs"></i>
                    </button>

                    <a class="navbar-brand navbar-brand-image" href="./index.html">
                        <img src="<?php echo base_url('assets/admin/ico/mangoo_logo_m.png'); ?>" alt="Logo">
                    </a>

                </div> <!-- /.navbar-header -->

                <div class="navbar-collapse collapse">


                    <ul class="nav navbar-nav navbar-right">   

                        <li class="dropdown navbar-profile">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:;">                                
                                <span class="navbar-profile-label"><?php echo ucfirst($this->session->userdata('log_user')); ?> &nbsp;</span>
                                <i class="fa fa-caret-down"></i>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="<?php echo base_url('logout'); ?>">
                                        <i class="fa fa-sign-out"></i> 
                                        &nbsp;&nbsp;Logout
                                    </a>
                                </li>

                            </ul>

                        </li>

                    </ul>

                </div> <!--/.navbar-collapse -->

            </div> <!-- /.container -->

        </div> <!-- /.navbar -->

        <div class="mainbar">

            <div class="container">

                <button type="button" class="btn mainbar-toggle" data-toggle="collapse" data-target=".mainbar-collapse">
                    <i class="fa fa-bars"></i>
                </button>

                <div class="mainbar-collapse collapse">

                    <ul class="nav navbar-nav mainbar-nav">

                        <li class="active">
                            <a href="<?php echo base_url(); ?>">
                                <i class="fa fa-dashboard"></i>
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('customers'); ?>">
                                <i class="fa fa-user"></i>
                                Customer
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('loan'); ?>">
                                <i class="fa fa-dollar"></i>
                                Loans
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('accounting'); ?>">
                                <i class="fa fa-building-o"></i>
                                Accounting
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('employees'); ?>">
                                <i class="fa fa-users"></i>
                                Employees
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
                                <i class="fa fa-bars"></i>
                                Reports
                                <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="<?php echo base_url('reports/daily'); ?>">
                                        <i class="fa fa-user nav-icon"></i> 
                                        &nbsp;&nbsp;Daily Report
                                    </a>
                                </li>     

                                <li>
                                    <a href="<?php echo base_url('reports/monthly'); ?>">
                                        <i class="fa fa-group"></i> 
                                        &nbsp;&nbsp;Monthly Report
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('reports/yearly'); ?>">
                                        <i class="fa fa-group"></i> 
                                        &nbsp;&nbsp;Yearly Report
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
                                <i class="fa fa-cogs"></i>
                                Settings
                                <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="<?php echo base_url('users'); ?>">
                                        <i class="fa fa-user nav-icon"></i> 
                                        &nbsp;&nbsp;Users
                                    </a>
                                </li>     

                                <li>
                                    <a href="<?php echo base_url('usergroups'); ?>">
                                        <i class="fa fa-group"></i> 
                                        &nbsp;&nbsp;User Group
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('tax'); ?>">
                                        <i class="fa fa-group"></i> 
                                        &nbsp;&nbsp;Tax
                                    </a>
                                </li>

                            </ul>
                        </li>                      

                    </ul> 

                </div> <!-- /.navbar-collapse -->   

            </div> <!-- /.container --> 

        </div> <!-- /.mainbar -->





