<?php

if (isset($_GET['$cid'])) {
    $cid = $_GET['$cid'];
}

$pageName="client_view";
$pageTitle="Client Overview";
require('config/database.php');
include('resources/structure/head.php');
include('resources/structure/navbar.php');
include('resources/structure/contenthead.php');
navBarDisplay($pageName);
displayContentHead($pageName, $pageTitle);
?>

<!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    [cid] <?php echo $cid; ?>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
include('resources/structure/sidebar.php');
include('resources/structure/footer.php');
include('resources/structure/scripts.php');

// close the db connection
mysqli_close($mysqli_link);
?>