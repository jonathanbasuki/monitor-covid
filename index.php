<?php 
  require_once('curl.php');

  function lastUpdate() {
    date_default_timezone_set('Asia/Jakarta');

    $date = date('d F Y H:i:s', time());
    return $date;
  }

 ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

    <title>Monitor Covid | Coronavirus Global & Indonesia Live Data</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-12 my-4">
          <div class="card text-center">
            <div class="card-header bg-success text-light py-4">
              <h1 class="text-uppercase fw-light">Monitor covid-19</h1>
              <p>Coronavirus Global & Indonesia Live Data</p>
            </div>

            <div class="card-body">
              <h5 class="card-title fw-light mb-3">Last update : <?= lastUpdate(); ?> WIB</h5>
              <div class="row">
                <div class="col-md-4 mb-3">
                  <div class="bg-danger cases-info">
                    <div class="row p-3">
                      <div class="col-md-8 text-light text-start">
                        <h4 class="text-uppercase fw-light fs-5">Confirmed</h4>
                        <h3><b id="cases"></b></h3>
                      </div>
                      <div class="col-md-3 d-flex align-items-start">
                        <img src="assets/img/positive.png" alt="Coronavirus cases" width="60px" class="img-responsive pr-2">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 col-xs-12 mb-3">
                  <div class="bg-primary cases-info">
                    <div class="row p-3">
                      <div class="col-md-8 text-light text-start">
                        <h4 class="text-uppercase fw-light fs-5">Deaths</h4>
                        <h3><b id="deaths"></b></h3>
                      </div>
                      <div class="col-md-3 d-flex align-items-start">
                        <img src="assets/img/died.png" alt="Recovered" width="60px" class="img-responsive">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 mb-3">
                  <div class="bg-success cases-info">
                    <div class="row p-3">
                      <div class="col-md-8 text-light text-start">
                        <h4 class="text-uppercase fw-light fs-5">Recovered</h4>
                        <h3><b id="recovered"></b></h3>
                      </div>
                      <div class="col-md-3 d-flex align-items-start">
                        <img src="assets/img/recovered.png" alt="Recovered" width="60px" class="img-responsive">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-12 mb-3">
                  <div class="bg-info cases-info">
                    <div class="row p-3">
                      <div class="col-md-9 text-dark text-start">
                        <h4 class="text-uppercase fw-light fs-5"><b>Indonesia</b></h4>
                        <p id="data-indonesia"></p>
                      </div>
                      <div class="col-md-3 d-flex align-items-start">
                        <img src="assets/img/indonesia.svg" alt="Recovered" width="80px" class="img-responsive">
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="card">
                <div class="card-header text-uppercase text-start fw-bold">
                  Global Coronavirus Cases
                </div>
                <div class="card-body">
                  <table class="table table-striped data" id="table-data">
                    <thead>
                      <th>#</th>
                      <th>Country</th>
                      <th>Confirmed</th>
                      <th>Deaths</th>
                      <th>Recovered</th>
                    </thead>
                    <tbody>
                      <?php
                        for ($i=0; $i < $totalGlobal; $i++) :
                          $result = $global[$i]['attributes'];
                         ?>

                          <tr>
                            <td><?= $indexGlobal++ ?></td>
                            <td><?= $result['Country_Region'] ?></td>
                            <td><?= number_format($result['Confirmed']) ?></td>
                            <td><?= number_format($result['Deaths']) ?></td>
                            <td><?= number_format($result['Recovered']) ?></td>
                          </tr>

                         <?php endfor; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

              <div class="card">
                <div class="card-header text-uppercase text-start fw-bold">
                  Indonesia Coronavirus Cases
                </div>
                <div class="card-body">
                  <table class="table table-striped data" id="table-data">
                    <thead>
                      <th>#</th>
                      <th>Province</th>
                      <th>Confirmed</th>
                      <th>Deaths</th>
                      <th>Recovered</th>
                    </thead>
                    <tbody>
                      <?php
                        for ($i=0; $i < $totalProvince; $i++) :
                          $result = $province[$i]['attributes'];
                         ?>

                          <tr>
                            <td><?= $indexProvince++ ?></td>
                            <td><?= $result['Provinsi'] ?></td>
                            <td><?= number_format($result['Kasus_Posi']) ?></td>
                            <td><?= number_format($result['Kasus_Meni']) ?></td>
                            <td><?= number_format($result['Kasus_Semb']) ?></td>
                          </tr>

                         <?php endfor; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            <div class="card-footer">
              &copy; <?= date('Y'); ?>, Jonathan Basuki.
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>
    <script src="assets/js/script.js"></script>
    <script>
      $(document).ready(function() {
            $('table.data').DataTable({
              "scrollX": true
            });
        } );
    </script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
  </body>
</html>