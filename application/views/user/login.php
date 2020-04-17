<!DOCTYPE html>
<html class="no-js"> 
    <head>
        <title>mangoO | Microfinance Management</title>

        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/admin//ico/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/font-awesome.min.css">        
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/bootstrap.min.css">
        <style type="text/css">
            .heading{
                font-weight: bold;
                color: #fa6900;
            }
            .bodybackground {              
                width: 100%;
                margin-top: 10em;
                min-height: 380px;                
                position: relative;
                background-color: #e0e4cc;
            }
            .error
            {
                color: #df2e1b;
            }
        </style>
    </head>

    <body class="bodybackground">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="<?php echo base_url(); ?>assets/admin//ico/mangoo_l.png">
                </div>

                <div class="col-md-4">

                    <p class="heading">Please login...</p>

                    <form class="form account-form" action="" method="post" autocomplete="off" id="login-form">
                        <?php
                        if ($msg != "") {
                            echo "<span class='error'>$msg</span>";
                        }
                        if ($this->session->flashdata('successmsg') != "") {
                            echo "<span style='color:#04770E;' class='success'>" . $this->session->flashdata('successmsg') . "</span>";
                        }
                        ?>
                        <div class="form-group elVal">

                            <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?php echo set_value('username') ?>" >
                            <span class="text-error"><?php echo form_error('username'); ?></span>

                        </div>
                        <div class="form-group elVal">


                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="<?php echo set_value('password') ?>">
                            <span class="text-error"><?php echo form_error('password'); ?></span>

                        </div>                        

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block" tabindex="4">
                                Login 
                            </button>
                        </div> 
                    </form>

                </div> 

            </div> 
        </div> 

        <script src="<?php echo base_url(); ?>assets/admin/js/jquery.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/js/lib/jquery.validate.js"></script>
        <script>
            $(document).ready(function () {
                setTimeout(function () {
                    $('.error').fadeOut();
                }, 4000);
                setTimeout(function () {
                    $('.success').fadeOut();
                }, 4000);
                $("#login-form").validate({
                    highlight: function (element) {
                        $(element).closest('.elVal').addClass("form-field text-error");
                    },
                    unhighlight: function (element) {
                        $(element).closest('.elVal').removeClass("form-field text-error");
                    }, errorElement: 'span',
                    rules: {
                        username: {
                            required: true,
                            minlength: 2,
                            maxlength: 40,
                        },
                        password: {
                            required: true,
                            minlength: 4,
                            maxlength: 24,
                        }
                    },
                    messages: {
                        username: {
                            required: "Please enter your username"

                        },
                        password: {
                            required: "Please enter your password"

                        }
                    },
                    errorPlacement: function (error, element) {
                        error.appendTo(element.closest(".elVal"));
                    }
                });


                $.validator.addMethod("Alphaspace", function (value, element) {
                    return this.optional(element) || /^[a-z ]+$/i.test(value);
                }, "Username must contain only letters, numbers, or dashes.");

                $.validator.addMethod("Alphanumeric", function (value, element) {
                    return this.optional(element) || /^[a-z0-9]+$/i.test(value);
                }, "Username must contain only letters, numbers, or dashes.");

                $.validator.addMethod("nowhitespace", function (value, element) {
                    return this.optional(element) || /^\S+$/i.test(value);
                }, "Space are not allowed");

            });
        </script>


    </body>
</html>
