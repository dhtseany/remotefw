<?php
$pageName="template";
$pageTitle="Template";
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
                <h1>Coming soon!</h1>
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