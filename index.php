<?php  

// Data World Positif
$data_positif = file_get_contents('https://api.kawalcorona.com/positif');
$result_data_positif = json_decode($data_positif, true);

// Data World Sembuh
$data_sembuh = file_get_contents('https://api.kawalcorona.com/sembuh');
$result_data_sembuh = json_decode($data_sembuh, true);

// Data World Meninggal
$data_meninggal = file_get_contents('https://api.kawalcorona.com/meninggal');
$result_data_meninggal = json_decode($data_meninggal, true);

// Data Indo
$data_indo = file_get_contents('https://api.kawalcorona.com/indonesia');
$result_data_indo = json_decode($data_indo, true);

// Data Indonesia berdasarkan Provinsi
$data_prov = file_get_contents('https://api.kawalcorona.com/indonesia/provinsi');
$result_data_prov = json_decode($data_prov, true);

// Data Global
$data_global = file_get_contents('https://api.kawalcorona.com');
$result_data_global = json_decode($data_global, true);


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Corona</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="asset/dist/modules/bootstrap/css/bootstrap.min.css">

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="asset/dist/css/style.css">

  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/ec1c7d40ae.js" crossorigin="anonymous"></script>

</head>

<body class="layout-3">

  <div id="app">
    <div class="main-wrapper container">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <a href="" class="navbar-brand sidebar-gone-hide"><div class="bullet"></div>CORONA</a>
        <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
      </nav>

      <nav class="navbar navbar-secondary navbar-expand-lg">
        <div class="container">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a href="#" class="nav-link"><i class="fas fa-fire"></i><span>Coronavirus</span></a>
            </li>
          </ul>
        </div>
      </nav>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">

          <div class="section-body">

            <!-- Card -->
            <div class="row">
              <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon bg-danger">
                    <i class="fas fa-user-plus"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4><?= $result_data_positif["name"]; ?></h4>
                    </div>
                    <div class="card-body">
                      <?= $result_data_positif["value"]; ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon bg-success">
                    <i class="fas fa-user-check"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4><?= $result_data_sembuh["name"]; ?></h4>
                    </div>
                    <div class="card-body">
                      <?= $result_data_sembuh["value"]; ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon bg-warning">
                    <i class="fas fa-user-times"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4><?= $result_data_meninggal["name"]; ?></h4>
                    </div>
                    <div class="card-body">
                      <?= $result_data_meninggal["value"]; ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Card -->

            <!-- Data Indonesia -->
            <div class="row">
              <div class="col-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Total Kasus Coronavirus di Indonesia</h4>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col text-center">
                        <h5>Positif</h5>
                        <h3 class="mb-1"><?= $result_data_indo[0]["positif"]; ?></h3>
                        <p class="text-muted">Orang</p>
                      </div>
                      <div class="col text-center">
                        <h5>Sembuh</h5>
                        <h3 class="mb-1"><?= $result_data_indo[0]["sembuh"]; ?></h3>
                        <p class="text-muted">Orang</p>
                      </div>
                      <div class="col text-center">
                        <h5>Meninggal</h5>
                        <h3 class="mb-1"><?= $result_data_indo[0]["meninggal"]; ?></h3>
                        <p class="text-muted">Orang</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Data Indonesia -->

            <!-- Data Indonesia berdasarkan Provinsi -->
            <div class="row">
              <div class="col-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Data kasus Coronavirus di Indonesia berdasarkan Provinsi</h4>
                  </div>
                  <div class="card-body p-0" style="overflow-y: auto; max-height: 500px">
                    <div class="table-responsive">
                      <table class="table table-striped table-md">
                        <tr>
                          <th>#</th>
                          <th>Provinsi</th>
                          <th>Positif</th>
                          <th>Sembuh</th>
                          <th>Meninggal</th>
                        </tr>
                        <?php $no = 1; ?>
                        <?php foreach($result_data_prov as $dv) : ?>
                          <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $dv["attributes"]["Provinsi"]; ?></td>
                            <td><?= number_format($dv["attributes"]["Kasus_Posi"]); ?></td>
                            <td><?= number_format($dv["attributes"]["Kasus_Semb"]); ?></td>
                            <td><?= number_format($dv["attributes"]["Kasus_Meni"]); ?></td>
                          </tr>
                        <?php endforeach; ?>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Data Indonesia berdasarkan Provinsi -->

            <!-- Data Global -->
            <div class="row">
              <div class="col-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Data kasus Coronavirus Global</h4>
                  </div>
                  <div class="card-body p-0" style="overflow-y: auto; max-height: 500px">
                    <div class="table-responsive">
                      <table class="table table-striped table-md">
                        <tr>
                          <th>#</th>
                          <th>Negara</th>
                          <th>Positif</th>
                          <th>Sembuh</th>
                          <th>Meninggal</th>
                        </tr>
                        <?php $no = 1; ?>
                        <?php foreach($result_data_global as $dg) : ?>
                          <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $dg["attributes"]["Country_Region"]; ?></td>
                            <td><?= number_format($dg["attributes"]["Confirmed"]); ?></td>
                            <td><?= number_format($dg["attributes"]["Recovered"]); ?></td>
                            <td><?= number_format($dg["attributes"]["Deaths"]); ?></td>
                          </tr>
                        <?php endforeach; ?>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Data Global -->

          </div>
        </section>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Made with <i class="fas fa-heart"></i> by Iwan <br>
          <i class="fas fa-terminal"></i> API from <a href="https://kawalcorona.com" target="_blank">kawalcorona.com</a><br>
          Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/" target="_blank">Muhamad Nauval Azhar</a>
        </div>
        <div class="footer-right">
          v2.0.0
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="asset/dist/modules/jquery.min.js"></script>
  <script src="asset/dist/modules/popper.js"></script>
  <script src="asset/dist/modules/tooltip.js"></script>
  <script src="asset/dist/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="asset/dist/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="asset/dist/modules/moment.min.js"></script>
  <script src="asset/dist/js/stisla.js"></script>
  
  <!-- JS Libraies -->

  <!-- Page Specific JS File -->
  
  <!-- Template JS File -->
  <script src="asset/dist/js/scripts.js"></script>
  <script src="asset/dist/js/custom.js"></script>
</body>
</html>