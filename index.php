<!DOCTYPE html>
<html lang="en">

<?php
session_start();
if (!isset($_SESSION["id"])) {
  header("Location: login.php");
  exit;
}
include_once "proses/koneksi.php";
$kon = new Koneksi();

include_once "template/header.php" ?>

<body class="g-sidenav-show   bg-gray-100">
  <div class="min-height-300 bg-primary position-absolute w-100"></div>
  <?php //include_once "template/sidebar.php" 
  ?>
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->

    <?php include_once "template/topbar.php" ?>

    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <?php //include_once "template/bardata.php"
      ?>
      <div class="container">
        <div class="row">
          <!-- Card 1 -->
          <div class="col-lg-8 mb-lg-4 mb-4">
            <div class="card z-index-2 h-100 mx-auto p-4" style="box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
              <div class="card-header pb-0 bg-transparent">
                <h6 class="text-center text-capitalize"><b>Peta Pesebaran Air Quality</b></h6>
              </div>
              <div class="card-body p-0"> <!-- Remove padding to allow image to fill the card -->
                <img id="idpeta" src="img/peta/semuanormal.png" class="w-100" style="object-fit: cover; width: 100%; height: 100%;" alt="Responsive image of peta">
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-lg-4 mb-4">
            <div class="card z-index-2 h-100 mx-auto p-4" style="box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
              <div class="card-header pb-0 bg-transparent">
                <h6 class="text-center text-capitalize"><b>Kondisi Emisi Dilokasi Anda</b></h6>
              </div>
              <div class="card-body p-0"> <!-- Remove padding to allow image to fill the card -->
                <img id="idperingatan" src="img/peringatanbahaya.png" class="w-100" style="object-fit: cover; width: 120%; height: 100%;" alt="Responsive image of peta">
              </div>
            </div>
          </div>

        </div>
        <div class="row mt-4">
          <!-- Card 1 -->
          <div class="container">
            <div class="row justify-content-center">
              <!-- Card 1 -->
              <div class="col-lg-6 mb-lg-4 mb-4">
                <div class="card z-index-2 h-100 mx-auto p-4" id="bgaq1" style="box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                  <div class="card-header pb-0 bg-transparent">
                    <h6 class="text-center text-capitalize"><b>Data AQ 1</b></h6>
                  </div>
                  <div class="card-body p-3">
                    <div class="row text-center">
                      <!-- AQI Data Section -->
                      <div class="col-lg-8 mb-lg-4 mb-4">
                        <div class="row text-center">
                          <!-- Dust Data -->
                          <div class="col-lg-4 col-md-4 col-sm-12 mb-3">
                            <div class="p-3 bg-light rounded shadow-sm">
                              <i class="fa fa-smog fa-2x mb-2 text-primary"></i>
                              <h5 class="font-weight-bold">Dust</h5>
                              <p class="mb-0" id="dustaq1">Loading....</p>
                            </div>
                          </div>
                          <!-- CO2 Data -->
                          <div class="col-lg-4 col-md-4 col-sm-12 mb-3">
                            <div class="p-3 bg-light rounded shadow-sm">
                              <i class="fa fa-smog fa-2x mb-2 text-success"></i>
                              <h5 class="font-weight-bold">CO2</h5>
                              <p class="mb-0" id="co2aq1">Loading....</p>
                            </div>
                          </div>
                          <!-- Ammonia Data -->
                          <div class="col-lg-4 col-md-4 col-sm-12 mb-3">
                            <div class="p-3 bg-light rounded shadow-sm">
                              <i class="fa fa-gas-pump fa-2x mb-2 text-warning"></i>
                              <h5 class="font-weight-bold">NH3</h5>
                              <p class="mb-0" id="nh3aq1">Loading....</p>
                            </div>
                          </div>
                          <!-- NOx Data -->
                          <div class="col-lg-4 col-md-4 col-sm-12 mb-3">
                            <div class="p-3 bg-light rounded shadow-sm">
                              <i class="fa fa-exclamation-triangle fa-2x mb-2 text-danger"></i>
                              <h5 class="font-weight-bold">NOx</h5>
                              <p class="mb-0" id="noxaq1">Loading....</p>
                            </div>
                          </div>
                          <!-- Temperature Data -->
                          <div class="col-lg-4 col-md-4 col-sm-12 mb-3">
                            <div class="p-3 bg-light rounded shadow-sm">
                              <i class="fa fa-thermometer-half fa-2x mb-2 text-primary"></i>
                              <h5 class="font-weight-bold">Suhu</h5>
                              <p class="mb-0" id="tempaq1">Loading....</p>
                            </div>
                          </div>
                          <!-- Humidity Data -->
                          <div class="col-lg-4 col-md-4 col-sm-12 mb-3">
                            <div class="p-3 bg-light rounded shadow-sm">
                              <i class="fa fa-tint fa-2x mb-2 text-info"></i>
                              <h5 class="font-weight-bold" style="white-space: nowrap; font-size: 16px;">Humidity</h5>



                              <p class="mb-0" id="humiaq1">Loading....</p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- Image Section -->
                      <div class="col-lg-4 d-flex align-items-center">
                        <img id="aq1Image" src="img/co/normal.png" alt="aq Image" class="img-fluid" style="width: 55%; height: auto;">
                      </div>
                    </div>
                  </div>
                  <div class="card-footer text-center bg-transparent border-0">
                    <a href="detailaq1.php" class="btn btn-primary" style="margin-top: -10px;">View Details</a>
                  </div>
                </div>
              </div>

              <!-- Card 2 -->
              <!-- Card 1 -->
              <div class="col-lg-6 mb-lg-4 mb-4">
                <div class="card z-index-2 h-100 mx-auto p-4" id="bgcems1" style="box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                  <div class="card-header pb-0 bg-transparent">
                    <h6 class="text-center text-capitalize"> <b>Data CEMS 1</b></h6>
                  </div>
                  <div class="card-body p-3">
                    <div class="row text-center">
                      <!-- CEMS Data Section -->
                      <div class="col-lg-8 mb-lg-4 mb-4">
                        <div class="row text-center">
                          <!-- Dust Data -->
                          <div class="col-lg-4 col-md-4 col-sm-12 mb-3">
                            <div class="p-3 bg-light rounded shadow-sm">
                              <i class="fa fa-smog fa-2x mb-2 text-primary"></i>
                              <h5 class="font-weight-bold">Dust</h5>
                              <p class="mb-0" id="dustcems1">Loading....</p>
                            </div>
                          </div>
                          <!-- CO Data -->
                          <div class="col-lg-4 col-md-4 col-sm-12 mb-3">
                            <div class="p-3 bg-light rounded shadow-sm">
                              <i class="fa fa-coffee fa-2x mb-2 text-danger"></i>
                              <h5 class="font-weight-bold">CO</h5>
                              <p class="mb-0" id="cocems1">Loading....</p>
                            </div>
                          </div>
                          <!-- CO2 Data -->
                          <div class="col-lg-4 col-md-4 col-sm-12 mb-3">
                            <div class="p-3 bg-light rounded shadow-sm">
                              <i class="fa fa-smog fa-2x mb-2 text-success"></i>
                              <h5 class="font-weight-bold">CO2</h5>
                              <p class="mb-0" id="co2cems1">Loading....</p>
                            </div>
                          </div>
                          <!-- NH3 Data -->
                          <div class="col-lg-4 col-md-4 col-sm-12 mb-3">
                            <div class="p-3 bg-light rounded shadow-sm">
                              <i class="fa fa-gas-pump fa-2x mb-2 text-warning"></i>
                              <h5 class="font-weight-bold">NH3</h5>
                              <p class="mb-0" id="nh3cems1">Loading....</p>
                            </div>
                          </div>
                          <!-- NO Data -->
                          <div class="col-lg-4 col-md-4 col-sm-12 mb-3">
                            <div class="p-3 bg-light rounded shadow-sm">
                              <i class="fa fa-exclamation-triangle fa-2x mb-2 text-danger"></i>
                              <h5 class="font-weight-bold">NO</h5>
                              <p class="mb-0" id="nocems1">Loading....</p>
                            </div>
                          </div>
                          <!-- NO2 Data -->
                          <div class="col-lg-4 col-md-4 col-sm-12 mb-3">
                            <div class="p-3 bg-light rounded shadow-sm">
                              <i class="fa fa-exclamation-triangle fa-2x mb-2 text-danger"></i>
                              <h5 class="font-weight-bold">NO2</h5>
                              <p class="mb-0" id="no2cems1">Loading....</p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- Image Section -->
                      <div class="col-lg-4 d-flex align-items-center">
                        <img id="cems1Image" src="img/co/normal.png" alt="CEMS Image" class="img-fluid" style="width: 55%; height: auto;">
                      </div>
                    </div>
                  </div>
                  <div class="card-footer text-center bg-transparent border-0">
                    <a href="detailcems1.php" class="btn btn-primary" style="margin-top: -10px;">View Details</a>
                  </div>
                </div>
              </div>

              <!-- Card 3 -->
              <div class="col-lg-6 mb-lg-4 mb-4">
                <div class="card z-index-2 h-100 mx-auto p-4" id="bgaq2" style="box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                  <div class="card-header pb-0 bg-transparent">
                    <h6 class="text-center text-capitalize"><b>Data AQ 2</b></h6>
                  </div>
                  <div class="card-body p-3">
                    <div class="row text-center">
                      <!-- AQI Data Section -->
                      <div class="col-lg-8 mb-lg-4 mb-4">
                        <div class="row text-center">
                          <!-- Dust Data -->
                          <div class="col-lg-4 col-md-4 col-sm-12 mb-3">
                            <div class="p-3 bg-light rounded shadow-sm">
                              <i class="fa fa-smog fa-2x mb-2 text-primary"></i>
                              <h5 class="font-weight-bold">Dust</h5>
                              <p class="mb-0" id="dustaq2">Loading....</p>
                            </div>
                          </div>
                          <!-- CO2 Data -->
                          <div class="col-lg-4 col-md-4 col-sm-12 mb-3">
                            <div class="p-3 bg-light rounded shadow-sm">
                              <i class="fa fa-smog fa-2x mb-2 text-success"></i>
                              <h5 class="font-weight-bold">CO2</h5>
                              <p class="mb-0" id="co2aq2">Loading....</p>
                            </div>
                          </div>
                          <!-- Ammonia Data -->
                          <div class="col-lg-4 col-md-4 col-sm-12 mb-3">
                            <div class="p-3 bg-light rounded shadow-sm">
                              <i class="fa fa-gas-pump fa-2x mb-2 text-warning"></i>
                              <h5 class="font-weight-bold">NH3</h5>
                              <p class="mb-0" id="nh3aq2">Loading....</p>
                            </div>
                          </div>
                          <!-- NOx Data -->
                          <div class="col-lg-4 col-md-4 col-sm-12 mb-3">
                            <div class="p-3 bg-light rounded shadow-sm">
                              <i class="fa fa-exclamation-triangle fa-2x mb-2 text-danger"></i>
                              <h5 class="font-weight-bold">NOx</h5>
                              <p class="mb-0" id="noxaq2">Loading....</p>
                            </div>
                          </div>
                          <!-- Temperature Data -->
                          <div class="col-lg-4 col-md-4 col-sm-12 mb-3">
                            <div class="p-3 bg-light rounded shadow-sm">
                              <i class="fa fa-thermometer-half fa-2x mb-2 text-primary"></i>
                              <h5 class="font-weight-bold">Suhu</h5>
                              <p class="mb-0" id="tempaq2">Loading....</p>
                            </div>
                          </div>
                          <!-- Humidity Data -->
                          <div class="col-lg-4 col-md-4 col-sm-12 mb-3">
                            <div class="p-3 bg-light rounded shadow-sm">
                              <i class="fa fa-tint fa-2x mb-2 text-info"></i>
                              <h5 class="font-weight-bold" style="white-space: nowrap; font-size: 16px;">Humidity</h5>
                              <p class="mb-0" id="humiaq2">Loading....</p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- Image Section -->
                      <div class="col-lg-4 d-flex align-items-center">
                        <img id="aq2Image" src="img/co/normal.png" alt="aq Image" class="img-fluid" style="width: 55%; height: auto;">

                      </div>
                    </div>
                  </div>
                  <div class="card-footer text-center bg-transparent border-0">
                    <a href="detail_aq2.html" class="btn btn-primary" style="margin-top: -10px;">View Details</a>
                  </div>
                </div>
              </div>

              <!-- Card 2 -->
              <!-- Card 1 -->
              <div class="col-lg-6 mb-lg-4 mb-4">
                <div class="card z-index-2 h-100 mx-auto p-4" id="bgcems2" style="box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                  <div class="card-header pb-0 bg-transparent">
                    <h6 class="text-center text-capitalize"><b>Data CEMS 2</b></h6>
                  </div>
                  <div class="card-body p-3">
                    <div class="row text-center">
                      <!-- CEMS Data Section -->
                      <div class="col-lg-8 mb-lg-4 mb-4">
                        <div class="row text-center">
                          <!-- Dust Data -->
                          <div class="col-lg-4 col-md-4 col-sm-12 mb-3">
                            <div class="p-3 bg-light rounded shadow-sm">
                              <i class="fa fa-smog fa-2x mb-2 text-primary"></i>
                              <h5 class="font-weight-bold">Dust</h5>
                              <p class="mb-0" id="dustcems2">Loading....</p>
                            </div>
                          </div>
                          <!-- CO Data -->
                          <div class="col-lg-4 col-md-4 col-sm-12 mb-3">
                            <div class="p-3 bg-light rounded shadow-sm">
                              <i class="fa fa-coffee fa-2x mb-2 text-danger"></i>
                              <h5 class="font-weight-bold">CO</h5>
                              <p class="mb-0" id="cocems2">Loading....</p>
                            </div>
                          </div>
                          <!-- CO2 Data -->
                          <div class="col-lg-4 col-md-4 col-sm-12 mb-3">
                            <div class="p-3 bg-light rounded shadow-sm">
                              <i class="fa fa-smog fa-2x mb-2 text-success"></i>
                              <h5 class="font-weight-bold">CO2</h5>
                              <p class="mb-0" id="co2cems2">Loading....</p>
                            </div>
                          </div>
                          <!-- NH3 Data -->
                          <div class="col-lg-4 col-md-4 col-sm-12 mb-3">
                            <div class="p-3 bg-light rounded shadow-sm">
                              <i class="fa fa-gas-pump fa-2x mb-2 text-warning"></i>
                              <h5 class="font-weight-bold">NH3</h5>
                              <p class="mb-0" id="nh3cems2">Loading....</p>
                            </div>
                          </div>
                          <!-- NO Data -->
                          <div class="col-lg-4 col-md-4 col-sm-12 mb-3">
                            <div class="p-3 bg-light rounded shadow-sm">
                              <i class="fa fa-exclamation-triangle fa-2x mb-2 text-danger"></i>
                              <h5 class="font-weight-bold">NO</h5>
                              <p class="mb-0" id="nocems2">Loading....</p>
                            </div>
                          </div>
                          <!-- NO2 Data -->
                          <div class="col-lg-4 col-md-4 col-sm-12 mb-3">
                            <div class="p-3 bg-light rounded shadow-sm">
                              <i class="fa fa-exclamation-triangle fa-2x mb-2 text-danger"></i>
                              <h5 class="font-weight-bold">NO2</h5>
                              <p class="mb-0" id="no2cems2">Loading....</p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- Image Section -->
                      <div class="col-lg-4 d-flex align-items-center">
                        <img id="cems2Image" src="img/co/normal.png" alt="aq Image" class="img-fluid" style="width: 55%; height: auto;">
                      </div>
                    </div>
                  </div>
                  <div class="card-footer text-center bg-transparent border-0">
                    <a href="detail_cems2.html" class="btn btn-primary" style="margin-top: -10px;">View Details</a>
                  </div>
                </div>
              </div>

              <div class="col-lg-6 mb-lg-4 mb-4">
                <div class="card z-index-2 h-100 mx-auto p-4" id="bgaq3" style="box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                  <div class="card-header pb-0 bg-transparent">
                    <h6 class="text-center text-capitalize"><b>Data AQ 3</b></h6>
                  </div>
                  <div class="card-body p-3">
                    <div class="row text-center">
                      <!-- AQI Data Section -->
                      <div class="col-lg-8 mb-lg-4 mb-4">
                        <div class="row text-center">
                          <!-- Dust Data -->
                          <div class="col-lg-4 col-md-4 col-sm-12 mb-3">
                            <div class="p-3 bg-light rounded shadow-sm">
                              <i class="fa fa-smog fa-2x mb-2 text-primary"></i>
                              <h5 class="font-weight-bold">Dust</h5>
                              <p class="mb-0" id="dustaq3">Loading....</p>
                            </div>
                          </div>
                          <!-- CO2 Data -->
                          <div class="col-lg-4 col-md-4 col-sm-12 mb-3">
                            <div class="p-3 bg-light rounded shadow-sm">
                              <i class="fa fa-smog fa-2x mb-2 text-success"></i>
                              <h5 class="font-weight-bold">CO2</h5>
                              <p class="mb-0" id="co2aq3">Loading....</p>
                            </div>
                          </div>
                          <!-- Ammonia Data -->
                          <div class="col-lg-4 col-md-4 col-sm-12 mb-3">
                            <div class="p-3 bg-light rounded shadow-sm">
                              <i class="fa fa-gas-pump fa-2x mb-2 text-warning"></i>
                              <h5 class="font-weight-bold">NH3</h5>
                              <p class="mb-0" id="nh3aq3">Loading....</p>
                            </div>
                          </div>
                          <!-- NOx Data -->
                          <div class="col-lg-4 col-md-4 col-sm-12 mb-3">
                            <div class="p-3 bg-light rounded shadow-sm">
                              <i class="fa fa-exclamation-triangle fa-2x mb-2 text-danger"></i>
                              <h5 class="font-weight-bold">NOx</h5>
                              <p class="mb-0" id="noxaq3">Loading....</p>
                            </div>
                          </div>
                          <!-- Temperature Data -->
                          <div class="col-lg-4 col-md-4 col-sm-12 mb-3">
                            <div class="p-3 bg-light rounded shadow-sm">
                              <i class="fa fa-thermometer-half fa-2x mb-2 text-primary"></i>
                              <h5 class="font-weight-bold">Suhu</h5>
                              <p class="mb-0" id="tempaq3">Loading....</p>
                            </div>
                          </div>
                          <!-- Humidity Data -->
                          <div class="col-lg-4 col-md-4 col-sm-12 mb-3">
                            <div class="p-3 bg-light rounded shadow-sm">
                              <i class="fa fa-tint fa-2x mb-2 text-info"></i>
                              <h5 class="font-weight-bold" style="white-space: nowrap; font-size: 16px;">Humidity</h5>
                              <p class="mb-0" id="humiaq3">Loading....</p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- Image Section -->
                      <div class="col-lg-4 d-flex align-items-center">
                        <img id="aq3Image" src="img/co/normal.png" alt="aq Image" class="img-fluid" style="width: 55%; height: auto;">

                      </div>
                    </div>
                  </div>
                  <div class="card-footer text-center bg-transparent border-0">
                    <a href="detail_aq3.html" class="btn btn-primary" style="margin-top: -10px;">View Details</a>
                  </div>
                </div>
              </div>

              <!-- Card 2 -->
              <!-- Card 1 -->
              <div class="col-lg-6 mb-lg-4 mb-4">
                <div class="card z-index-2 h-100 mx-auto p-4" id="bgcems3" style="box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                  <div class="card-header pb-0 bg-transparent">
                    <h6 class="text-center text-capitalize"><b>Data CEMS 3</b></h6>
                  </div>
                  <div class="card-body p-3">
                    <div class="row text-center">
                      <!-- CEMS Data Section -->
                      <div class="col-lg-8 mb-lg-4 mb-4">
                        <div class="row text-center">
                          <!-- Dust Data -->
                          <div class="col-lg-4 col-md-4 col-sm-12 mb-3">
                            <div class="p-3 bg-light rounded shadow-sm">
                              <i class="fa fa-smog fa-2x mb-2 text-primary"></i>
                              <h5 class="font-weight-bold">Dust</h5>
                              <p class="mb-0" id="dustcems3">Loading....</p>
                            </div>
                          </div>
                          <!-- CO Data -->
                          <div class="col-lg-4 col-md-4 col-sm-12 mb-3">
                            <div class="p-3 bg-light rounded shadow-sm">
                              <i class="fa fa-coffee fa-2x mb-2 text-danger"></i>
                              <h5 class="font-weight-bold">CO</h5>
                              <p class="mb-0" id="cocems3">Loading....</p>
                            </div>
                          </div>
                          <!-- CO2 Data -->
                          <div class="col-lg-4 col-md-4 col-sm-12 mb-3">
                            <div class="p-3 bg-light rounded shadow-sm">
                              <i class="fa fa-smog fa-2x mb-2 text-success"></i>
                              <h5 class="font-weight-bold">CO2</h5>
                              <p class="mb-0" id="co2cems3">Loading....</p>
                            </div>
                          </div>
                          <!-- NH3 Data -->
                          <div class="col-lg-4 col-md-4 col-sm-12 mb-3">
                            <div class="p-3 bg-light rounded shadow-sm">
                              <i class="fa fa-gas-pump fa-2x mb-2 text-warning"></i>
                              <h5 class="font-weight-bold">NH3</h5>
                              <p class="mb-0" id="nh3cems3">Loading....</p>
                            </div>
                          </div>
                          <!-- NO Data -->
                          <div class="col-lg-4 col-md-4 col-sm-12 mb-3">
                            <div class="p-3 bg-light rounded shadow-sm">
                              <i class="fa fa-exclamation-triangle fa-2x mb-2 text-danger"></i>
                              <h5 class="font-weight-bold">NO</h5>
                              <p class="mb-0" id="nocems3">Loading....</p>
                            </div>
                          </div>
                          <!-- NO2 Data -->
                          <div class="col-lg-4 col-md-4 col-sm-12 mb-3">
                            <div class="p-3 bg-light rounded shadow-sm">
                              <i class="fa fa-exclamation-triangle fa-2x mb-2 text-danger"></i>
                              <h5 class="font-weight-bold">NO2</h5>
                              <p class="mb-0" id="no2cems3">Loading....</p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- Image Section -->
                      <div class="col-lg-4 d-flex align-items-center">
                        <img id="cems3Image" src="img/co/normal.png" alt="CEMS Image" class="img-fluid" style="width: 55%; height: auto;">
                      </div>
                    </div>
                  </div>
                  <div class="card-footer text-center bg-transparent border-0">
                    <a href="detail_cems3.html" class="btn btn-primary" style="margin-top: -10px;">View Details</a>
                  </div>
                </div>
              </div>
              <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

              <script>
                function fetchData2() {
                  $.ajax({
                    url: 'fetch_data.php', // Ganti dengan nama skrip PHP yang sesuai
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                      // Mengambil dan menampilkan data dari aqi1
                      const aqi1Data = data.aqi1[0];
                      $('#dustaq1').text(aqi1Data.dust);
                      $('#tempaq1').text(aqi1Data.temp);
                      $('#humiaq1').text(aqi1Data.humi);
                      $('#nh3aq1').text(aqi1Data.nh3);
                      $('#co2aq1').text(aqi1Data.co2);
                      $('#noxaq1').text(aqi1Data.nox);

                      // Mengambil dan menampilkan data dari aqi2
                      const aqi2Data = data.aqi2[0];
                      $('#dustaq2').text(aqi2Data.dust);
                      $('#tempaq2').text(aqi2Data.temp);
                      $('#humiaq2').text(aqi2Data.humi);
                      $('#nh3aq2').text(aqi2Data.nh3);
                      $('#co2aq2').text(aqi2Data.co2);
                      $('#noxaq2').text(aqi2Data.nox);

                      // Mengambil dan menampilkan data dari aqi3
                      const aqi3Data = data.aqi3[0];
                      $('#dustaq3').text(aqi3Data.dust);
                      $('#tempaq3').text(aqi3Data.temp);
                      $('#humiaq3').text(aqi3Data.humi);
                      $('#nh3aq3').text(aqi3Data.nh3);
                      $('#co2aq3').text(aqi3Data.co2);
                      $('#noxaq3').text(aqi3Data.nox);

                      // Mengambil dan menampilkan data dari cems1
                      const cems1Data = data.cems1[0];
                      $('#dustcems1').text(cems1Data.dust);
                      $('#cocems1').text(cems1Data.co);
                      $('#no2cems1').text(cems1Data.no2);
                      $('#co2cems1').text(cems1Data.co2);
                      $('#nh3cems1').text(cems1Data.nh3);
                      $('#nocems1').text(cems1Data.no);

                      // Mengambil dan menampilkan data dari cems2
                      const cems2Data = data.cems2[0];
                      $('#dustcems2').text(cems2Data.dust);
                      $('#cocems2').text(cems2Data.co);
                      $('#no2cems2').text(cems2Data.no2);
                      $('#co2cems2').text(cems2Data.co2);
                      $('#nh3cems2').text(cems2Data.nh3);
                      $('#nocems2').text(cems2Data.no);

                      // Mengambil dan menampilkan data dari cems3
                      const cems3Data = data.cems3[0];
                      $('#dustcems3').text(cems3Data.dust);
                      $('#cocems3').text(cems3Data.co);
                      $('#no2cems3').text(cems3Data.no2);
                      $('#co2cems3').text(cems3Data.co2);
                      $('#nh3cems3').text(cems3Data.nh3);
                      $('#nocems3').text(cems3Data.no);

                      // Update gambar CO2 berdasarkan nilai CO2 dari cems1, cems2, dan cems3
                      updateImageBasedOnCO2(cems1Data.co2, 'cems1Image', 'bgcems1');
                      updateImageBasedOnCO2(cems2Data.co2, 'cems2Image', 'bgcems2');
                      updateImageBasedOnCO2(cems3Data.co2, 'cems3Image', 'bgcems3');
                      updateImageBasedOnCO2(aqi1Data.co2, 'aq1Image', 'bgaq1');
                      updateImageBasedOnCO2(aqi2Data.co2, 'aq2Image', 'bgaq2');
                      updateImageBasedOnCO2(aqi3Data.co2, 'aq3Image', 'bgaq3');

                      const kondisi = data.kondisi[0];
                      // console.log(kondisi);
                      updatePeta(kondisi.area1, kondisi.area2, kondisi.area3);

                      const kondisiangin = data.kondisicems[0];
                      // console.log(kondisiangin.peringatan);
                      updatePeringatan(kondisiangin.peringatan);



                    },
                    error: function(error) {
                      console.error('Error:', error);
                    }
                  });
                }

                // Update data setiap 2 detik
                setInterval(fetchData2, 2000);

                // Pengambilan data awal
                fetchData2();

                // Fungsi untuk update gambar CO2
                function updateImageBasedOnCO2(co2Value, imageId, bg) {
                  const imageElement = document.getElementById(imageId);
                  const cardElement = document.getElementById(bg);

                  // Debugging: Check if the elements are found
                  if (!imageElement) {
                    console.log('Image element not found with ID:', imageId);
                    return;
                  }
                  if (!cardElement) {
                    console.log('Card element not found with ID:', bg);
                    return;
                  }

                  // console.log('CO2 Value:', co2Value); // Debugging: cek nilai CO2

                  if (co2Value < 500) {
                    imageElement.src = 'img/co/normal.png';
                    imageElement.style.width = '80%'; // Mengatur width 80% jika CO2 < 500
                    cardElement.style.backgroundColor = '#9ADE7B'; // Update card background color
                    // console.log('Image set to normal.png and card color set to #EE4E4E');
                  } else if (co2Value >= 500 && co2Value <= 600) {
                    imageElement.src = 'img/co/sedang.png';
                    imageElement.style.width = '90%'; // Mengatur width 90% jika CO2 antara 500-600
                    cardElement.style.backgroundColor = '#FFDE4D'; // Update card background color
                    // console.log('Image set to sedang.png and card color set to #FFD700');
                  } else if (co2Value > 600) {
                    imageElement.src = 'img/co/tinggi.png';
                    imageElement.style.width = '80%'; // Mengatur width 80% jika CO2 > 600
                    cardElement.style.backgroundColor = '#FFAAAA'; // Update card background color
                    // console.log('Image set to tinggi.png and card color set to #FF4500');
                  }
                }

                function updatePeta(area1, area2, area3) {
                  const imageElement = document.getElementById("idpeta");
                  // console.log('area1', area1); // Debugging: cek nilai CO2

                  if (area1 === 'normal' && area2 === 'normal' && area3 === 'normal') {
                    imageElement.src = 'img/peta/semuanormal.png';
                    imageElement.style.width = '100%';
                  } else if (area1 === 'buruk' && area2 === 'normal' && area3 === 'normal') {
                    imageElement.src = 'img/peta/area1buruk.png';
                    imageElement.style.width = '100%';
                  } else if (area1 === 'sedang' && area2 === 'normal' && area3 === 'normal') {
                    imageElement.src = 'img/peta/area1sedang.png';
                    imageElement.style.width = '100%';
                  } else if (area1 === 'normal' && area2 === 'buruk' && area3 === 'normal') {
                    imageElement.src = 'img/peta/area2buruk.png';
                    imageElement.style.width = '100%';
                  } else if (area1 === 'normal' && area2 === 'sedang' && area3 === 'normal') {
                    imageElement.src = 'img/peta/area2sedang.png';
                    imageElement.style.width = '100%';
                  } else if (area1 === 'normal' && area2 === 'normal' && area3 === 'buruk') {
                    imageElement.src = 'img/peta/area3buruk.png';
                    imageElement.style.width = '100%';
                  } else if (area1 === 'normal' && area2 === 'normal' && area3 === 'sedang') {
                    imageElement.src = 'img/peta/area3sedang.png';
                    imageElement.style.width = '100%';
                  } else {
                    imageElement.src = 'img/peta/semuanormal.png';
                    imageElement.style.width = '100%';
                  }
                }

                function updatePeringatan(area1) {
                  const imageElement = document.getElementById("idperingatan");
                  // console.log('area1', area1); // Debugging: cek nilai CO2

                  if (area1 === 'normal') {
                    imageElement.src = 'img/peringatannormal.png';
                    imageElement.style.width = '100%';            
                  } else {
                    imageElement.src = 'img/peringatanbahaya.png';
                    imageElement.style.width = '100%';
                  }
                }
              </script>





            </div>
            <?php include_once "template/footer.php" ?>

  </main>
  <!--   Core JS Files   -->
  <script src="./assets/js/core/popper.min.js"></script>
  <script src="./assets/js/core/bootstrap.min.js"></script>
  <script src="./assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="./assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="./assets/js/plugins/chartjs.min.js"></script>
  <!-- <script>
    var ctx1 = document.getElementById("chart-line").getContext("2d");

    var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
    gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
    new Chart(ctx1, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Mobile apps",
          tension: 0.4,
          borderWidth: 0,
          pointRadius: 0,
          borderColor: "#5e72e4",
          backgroundColor: gradientStroke1,
          borderWidth: 3,
          fill: true,
          data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#fbfbfb',
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#ccc',
              padding: 20,
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  </script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script> -->
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="./assets/js/argon-dashboard.min.js?v=2.0.4"></script>
</body>

</html>