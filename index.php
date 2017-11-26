<?php
    session_start();
    $_SESSION['username']   = 'M Beny P';
    $page   = $_GET['p'];
    $id     = $_GET['id'];
    $action = $_GET['a'];
    if (isset($page)) {
        require_once "module/$page.php";
        $data   = new $page();
    }
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

    <?php include "pages/includes/head.php"; ?>

    <body class="padTop53 " >
         <!-- MAIN WRAPPER -->
        <div id="wrap">
            <?php
                include_once "pages/includes/header_topbar.php";
                include_once "pages/includes/sidebar.php";
            ?>

            <!--PAGE CONTENT -->
            <div id="content">
                <div class="inner">
                    <div class="row">
                        <div class="col-lg-12">

                            <?php
                                if (!isset($page))
                                    include_once "pages/home.php";
                                else {
                                    if (isset($action))
                                        include_once "pages/admin/$page/$action.php";
                                    else
                                        include_once "pages/admin/$page/list.php";
                                }
                            ?>

                        </div>
                    </div>

                </div>
            </div>
           <!--END PAGE CONTENT -->
        </div>
         <!--END MAIN WRAPPER -->
        <?php include "pages/includes/foot.php"; ?>

         <?php
         if ($_GET['a'] == 'delete') {
             $delete     = $data->delete($page, $id);
         }
         ?>

    </body>
</html>
