<?php
session_start();
if (!isset($_SESSION["id"])) {
  header("Location: login.php");
  exit;
}
include_once "proses/koneksi.php";
$kon = new Koneksi();

$abc = $kon->kueri("SELECT * FROM tb_cems1 ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">

<?php include_once "template/header.php" ?>

<body class="g-sidenav-show   bg-gray-100">
  <div class="min-height-300 bg-primary position-absolute w-100"></div>
  <?php //include_once "template/sidebar.php" 
  ?>
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->

    <?php include_once "template/topbar.php" ?>


    <!-- End Navbar -->'
    <div class="row mt-4">
      <!-- Card 1 -->
      <div class="container">
        <div class="row justify-content-center">
          <!-- Card 1 -->
          <div class="col-lg-11 mb-lg-4 mb-4">
            <div class="card z-index-2 h-100 mx-auto p-4" style="box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
              <div class="card-header pb-0 bg-transparent">
                <h6 class="text-center text-capitalize">Peta Pesebaran CEMS 1</h6>
              </div>
              <div class="card-body p-3">
                <div class="row text-center">
                  <!-- AQI Data Section -->
                  <div class="col-lg-12 mb-lg-4 mb-4">
                    <img id="idpeta" src="img/peta/utara.png" class="w-100" style="object-fit: cover; height: 100%;" alt="Responsive image of peta">

                  </div>
                  <!-- Image Section -->

                </div>
              </div>
            </div>
          </div>


          <div class="col-lg-11 mb-lg-4 mb-4">
            <div class="card z-index-2 h-100 mx-auto p-4" style="box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
              <div class="card-header pb-0 bg-transparent">
                <h6 class="text-center text-capitalize">Data Terbaru CEMS 1</h6>
              </div>
              <div class="card-body p-3">
                <div class="row text-center">
                  <!-- AQI Data Section -->
                  <div class="col-lg-12 mb-lg-4 mb-4">
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
                </div>
                <!-- Image Section -->
                <!-- <div class="col-lg-4 d-flex align-items-center">
                    <img id="aq1Image" src="img/co/normal.png" alt="aq Image" class="img-fluid" style="width: 55%; height: auto;">
                  </div> -->
              </div>
            </div>
          </div>

          <div class="col-lg-11 mb-lg-4 mb-4">
            <div class="card z-index-2 h-100 mx-auto p-4" style="box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
              <div class="card-header pb-0 bg-transparent">
                <h6 class="text-center text-capitalize">Data CEMS 1</h6>
              </div>
              <div class="card-body p-3">
                <div class="row text-center">
                  <!-- AQI Data Table Section -->
                  <div class="col-lg-12 mb-lg-4 mb-4">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Tgl Waktu</th>
                          <th>Dust</th>
                          <th>CO2</th>
                          <th>NH3</th>
                          <th>CO</th>
                          <th>NO2</th>
                          <th>NO</th>

                        </tr>
                      </thead>
                      <tbody>

                        <?php
                        $no = 1;
                        foreach ($abc as $data) { ?>
                          <tr>
                            <td><?= $no ?></td>
                            <td><?= $data['datetime']; ?></td>
                            <td><?= $data['dust']; ?></td>
                            <td><?= $data['co2']; ?></td>
                            <td><?= $data['nh3']; ?></td>
                            <td><?= $data['co']; ?></td>
                            <td><?= $data['no2']; ?></td>
                            <td><?= $data['no']; ?></td>
                          </tr>
                        <?php $no++;
                        } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <style>
            /* Ganti warna strip tabel */
            .table-striped tbody tr:nth-of-type(odd) {
              background-color: #E0FBE2;
              /* Warna strip */
            }
          </style>


          <!-- DataTables CSS -->
          <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">

          <!-- jQuery dan Bootstrap 4 JS -->
          <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
          <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

          <!-- DataTables Bootstrap 4 JS -->
          <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
          <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

          <!-- Inisialisasi DataTables -->
          <script>
            $(document).ready(function() {
              $('#example').DataTable(); // Inisialisasi DataTables
            });
          </script>

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


                  const kondisi = data.kondisicems[0];
                  // console.log(kondisi);\
                  updatePeta(kondisi.arahangin);

                  // Update gambar CO2 berdasarkan nilai CO2 dari cems1, cems2, dan cems3




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
            function updateImageBasedOnCO2(co2Value, imageId) {
              const imageElement = document.getElementById(imageId);
              // console.log('CO2 Value:', co2Value); // Debugging: cek nilai CO2

              if (co2Value < 500) {
                imageElement.src = 'img/co/normal.png';
                imageElement.style.width = '80%'; // Mengatur height 55% jika CO2 < 500
                // console.log('Image set to normal.png with height 55%'); // Debugging
              } else if (co2Value >= 500 && co2Value <= 600) {
                imageElement.src = 'img/co/sedang.png';
                imageElement.style.width = '90%'; // Mengatur height 53% jika CO2 antara 500-600
                // console.log('Image set to sedang.png with height 53%'); // Debugging
              } else if (co2Value > 600) {
                imageElement.src = 'img/co/tinggi.png';
                imageElement.style.width = '80%'; // Mengatur height 100% jika CO2 > 600
                // console.log('Image set to tinggi.png with height 100%'); // Debugging
              }
            }


            function updatePeta(arahangin) {
              const imageElement = document.getElementById("idpeta");
              // console.log('arahangin', arahangin); // Debugging: cek nilai CO2

              if (arahangin === 'barat') {
                imageElement.src = 'img/peta/barat.png';
                imageElement.style.width = '100%';
              } else if (arahangin === 'baratdaya') {
                imageElement.src = 'img/peta/baratdaya.png';
                imageElement.style.width = '100%';
              } else if (arahangin === 'baratlaut') {
                imageElement.src = 'img/peta/baratlaut.png';
                imageElement.style.width = '100%';
              } else if (arahangin === 'selatan') {
                imageElement.src = 'img/peta/selatan.png';
                imageElement.style.width = '100%';
              } else if (arahangin === 'tenggara') {
                imageElement.src = 'img/peta/tenggara.png';
                imageElement.style.width = '100%';
              } else if (arahangin === 'timur') {
                imageElement.src = 'img/peta/timur.png';
                imageElement.style.width = '100%';
              } else if (arahangin === 'timurlaut') {
                imageElement.src = 'img/peta/timurlaut.png';
                imageElement.style.width = '100%';
              } else if(arahangin === 'utara') {
                imageElement.src = 'img/peta/utara.png';
                imageElement.style.width = '100%';
              }

              // if (co2Value < 500) {
              //   imageElement.src = 'img/co/normal.png';
              //   imageElement.style.width = '80%'; // Mengatur height 55% jika CO2 < 500
              //   // console.log('Image set to normal.png with height 55%'); // Debugging
              // } else if (co2Value >= 500 && co2Value <= 600) {
              //   imageElement.src = 'img/co/sedang.png';
              //   imageElement.style.width = '90%'; // Mengatur height 53% jika CO2 antara 500-600
              //   // console.log('Image set to sedang.png with height 53%'); // Debugging
              // } else if (co2Value > 600) {
              //   imageElement.src = 'img/co/tinggi.png';
              //   imageElement.style.width = '80%'; // Mengatur height 100% jika CO2 > 600
              //   // console.log('Image set to tinggi.png with height 100%'); // Debugging
              // }
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