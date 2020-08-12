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

                        <li class="<?php echo ($this->uri->segment(1)=='dashboard')?'active':''; ?>">
                            <a href="<?php echo base_url(); ?>">
                                <i class="fa fa-dashboard"></i>
                                Dashboard
                            </a>
                        </li>
                        <!-- <li class="<?php echo ($this->uri->segment(1)=='customers')?'active':''; ?>">
                            <a href="<?php echo base_url('customers'); ?>">
                                <i class="fa fa-user"></i>
                                Customer
                            </a>
                        </li> -->
                        <li class="<?php echo ($this->uri->segment(1)=='loan')?'active':''; ?>">
                            <a href="<?php echo base_url('loan'); ?>">
                                <i class="fa fa-dollar"></i>
                                Loans
                            </a>
                        </li>
                        <li class="<?php echo ($this->uri->segment(1)=='accounting')?'active':''; ?>">
                            <a href="<?php echo base_url('accounting'); ?>">
                                <i class="fa fa-building-o"></i>
                                Accounting
                            </a>
                        </li>
                        <li class="<?php echo ($this->uri->segment(1)=='employees')?'active':''; ?>">
                            <a href="<?php echo base_url('employees'); ?>">
                                <i class="fa fa-users"></i>
                                Employees
                            </a>
                        </li>
                        <li class="<?php echo ($this->uri->segment(1)=='agent')?'active':''; ?>">
                            <a href="<?php echo base_url('agent'); ?>">
                                <i class="fa fa-users"></i>
                                Agent
                            </a>
                        </li>
                        <li class="dropdown <?php echo ($this->uri->segment(1)=='reports')?'active':''; ?>">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
                                <i class="fa fa-bars"></i>
                                Reports
                                <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li class="<?php echo ($this->uri->segment(2)=='daily')?'active':''; ?>">
                                    <a href="<?php echo base_url('reports/daily'); ?>">
                                        <i class="fa fa-user nav-icon"></i> 
                                        &nbsp;Daily Report
                                    </a>
                                </li>     

                                <li class="<?php echo ($this->uri->segment(2)=='loandetailedreport')?'active':''; ?>">
                                    <a href="<?php echo base_url('reports/loandetailedreport'); ?>">
                                        <i class="fa fa-money"></i> 
                                        &nbsp;&nbsp;Loan Detailed Report
                                    </a>
                                </li>
                                <li class="<?php echo ($this->uri->segment(2)=='monthlypaymentreport')?'active':''; ?>">
                                    <a href="<?php echo base_url('reports/monthlypaymentreport'); ?>">
                                        <i class="fa fa-group"></i> 
                                        &nbsp;&nbsp;Monthly Repayment Report
                                    </a>
                                </li>
                                <li class="<?php echo ($this->uri->segment(2)=='allpendingpaymentreport')?'active':''; ?>">
                                    <a href="<?php echo base_url('reports/allpendingpaymentreport'); ?>">
                                        <i class="fa fa-group"></i> 
                                        &nbsp;&nbsp;Pending payment Report
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="dropdown <?php echo ($this->uri->segment(1)=='users')?'active':''; ?>">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
                                <i class="fa fa-cogs"></i>
                                Settings
                                <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li class="<?php echo ($this->uri->segment(1)=='users')?'active':''; ?>">
                                    <a href="<?php echo base_url('users'); ?>">
                                        <i class="fa fa-user nav-icon"></i> 
                                        &nbsp;&nbsp;Users
                                    </a>
                                </li>     

                                <li style="display: none;">
                                    <a href="<?php echo base_url('usergroups'); ?>">
                                        <i class="fa fa-group"></i> 
                                        &nbsp;&nbsp;User Group
                                    </a>
                                </li>
                                <li style="display: none;">
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





