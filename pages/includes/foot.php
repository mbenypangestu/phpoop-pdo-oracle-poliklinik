<!-- FOOTER -->
<!--<div id="footer">-->
<!--    <p>&copy;  binarytheme &nbsp;2014 &nbsp;</p>-->
<!--</div>-->
<!--END FOOTER -->

<!-- GLOBAL SCRIPTS -->
<script src="assets/plugins/jquery-2.0.3.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>

<!-- PAGE LEVEL SCRIPTS -->
<script src="assets/plugins/dataTables/jquery.dataTables.js"></script>
<script src="assets/plugins/dataTables/dataTables.bootstrap.js"></script>
<!-- Sweetalert -->
<script src="assets/plugins/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $(document).ready(function () {
        $('#dataTables-example').dataTable();
    });
</script>
<!-- END PAGE LEVEL SCRIPTS -->

<?php
    $page   = $_GET['p'];
    if (isset($page))
        include_once "pages/admin/$page/_js.php";
?>