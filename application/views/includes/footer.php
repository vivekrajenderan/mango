
<footer class="footer">

    <div class="container">

        <div class="row">

            <div class="col-sm-12">


                <hr>    

                <p>&copy; <?php echo date('Y'); ?> Kurinji Finance Management.</p>

            </div> <!-- /.col -->

        </div> <!-- /.row -->

    </div> <!-- /.container -->

</footer>
<ul class="howl" style="display: none;" id="dangermsg">
    <li class="howl-slot howl-has-icon" style="display: list-item;">
        <div class="howl-message howl-danger">
            <button class="close howl-close">×</button>
            <div class="howl-message-inner">
                <p id="error-text"></p>
            </div><i class="howl-icon fa fa-ban"></i>
        </div>
    </li>
</ul>
<ul class="howl" style="display: none;" id="successmsg">
    <li class="howl-slot howl-has-icon" style="display: list-item;">
        <div class="howl-message howl-success">
            <button class="close howl-close">×</button>
            <div class="howl-message-inner">
                <p id="success-text"></p>
            </div><i class="howl-icon fa fa-check-square-o"></i>
        </div>
    </li>
</ul>

<script src="<?php echo base_url(); ?>assets/admin/js/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/lib/jquery-1.10.1.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/lib/jquery-ui-1.9.2.custom.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/lib/target-admin.js"></script>

<script src="<?php echo base_url(); ?>assets/admin/js/lib/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/custom.js"></script>
<?php
if (isset($jsfile) && count($jsfile)) {    
    foreach ($jsfile as $key => $value) {
        echo "<script src='" . base_url($value)."'></script>";
    }
}
?>

</body>
</html>
