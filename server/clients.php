<?php

$pageName="clients";
$pageTitle="Clients";

require('config/database.php');
include('resources/structure/head.php');
include('resources/structure/navbar.php');
include('resources/structure/contenthead.php');
navBarDisplay($pageName);
displayContentHead($pageName, $pageTitle);

// MySQL query of the clients table
$select_query = "SELECT * FROM clients LIMIT 10";
$result = mysqli_query($mysqli_link, $select_query);

?>

<!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Active Client Devices</h3>
              <div class="card-tools">
                <ul class="pagination pagination-sm float-right">
                  <li class="page-item"><a class="page-link" href="#">«</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">»</a></li>
                </ul>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <table class="table">
                <thead>
                      <tr>
                        <th style="width: 5%">cid</th>
                        <th style="width: 20%">customer</th>
                        <th style="width: 12.5%">location</th>
                        <th style="width: 12.5%">osType</th>
                        <th style="width: 12.5%">osArch</th>
                        <th style="width: 7%">osVer</th>
                        <th style="width: 5.5%">cpuCores</th>
                        <th style="width: 5%">lastCheckInTime</th>
                        <th style="width: 20%">Actions</th>
                      </tr>
                </thead>
                <tbody>
                <?php
                  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    function time_elapsed_string($datetime, $full = false) {
                      $now = new DateTime;
                      $ago = new DateTime($datetime);
                      $diff = $now->diff($ago);
                      $diff->w = floor($diff->d / 7);
                      $diff->d -= $diff->w * 7;
                      $string = array(
                          'y' => 'year',
                          'm' => 'month',
                          'w' => 'week',
                          'd' => 'day',
                          'h' => 'hour',
                          'i' => 'minute',
                          's' => 'second',
                      );
                      foreach ($string as $k => &$v) {
                          if ($diff->$k) {
                              $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
                          } else {
                              unset($string[$k]);
                          }
                      }
                      if (!$full) $string = array_slice($string, 0, 1);
                      return $string ? implode(', ', $string) . ' ago' : 'just now';
                  }
                    echo '
                      <tr>
                        <td>'. $row["cid"] .'</td>
                        <td>'. $row["custID"] .'</td>
                        <td>'. $row["location"] .'</td>
                        <td>'. $row["osType"] .'</td>
                        <td>'. $row["osArch"] .'</td>
                        <td>'. $row["osVer"] .'</td>
                        <td>'. $row["cpuCores"] .'</td>
                        <td>'. time_elapsed_string($row["lastCheckInTime"]) .'</td>
                        <td>
                          <button type="button" class="btn btn-danger">System</button>
                          <button type="button" class="btn btn-danger dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                            <div class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-1px, 37px, 0px);">
                              <a class="dropdown-item" href="#">Action</a>
                              <a class="dropdown-item" href="#">Another action</a>
                              <a class="dropdown-item" href="#">Something else here</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="#">Separated link</a>
                            </div>
                          </button>
                        </td>
                      </tr>
                    ';
                  }
                  ?>  
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
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