<?php
session_start();
include "koneksi.php";

// Cek apakah user sudah login
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />

  <title>Dashboard - Sistem Informasi Inventory Produk (SIIP)</title>
  <meta content="" name="description" />
  <meta content="" name="keywords" />

  <!-- Favicons -->
  <link href="assets/img/logo-sistem.png" rel="icon" />
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon" />

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect" />
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet" />

  <!-- Vendor CSS Files -->
  <link
    href="assets/vendor/bootstrap/css/bootstrap.min.css"
    rel="stylesheet" />
  <link
    href="assets/vendor/bootstrap-icons/bootstrap-icons.css"
    rel="stylesheet" />
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet" />
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet" />
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet" />
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet" />

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet" />
</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center">
        <img
          src="assets/img/logo-sistem.png"
          alt="Sistem Informasi Inventory Produk (SIIP)" />
        <span class="d-none d-lg-block">SIIP</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>
    <!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item dropdown pe-3">
          <a
            class="nav-link nav-profile d-flex align-items-center pe-0"
            href="#"
            data-bs-toggle="dropdown">
            <img
              src="assets/img/profile-img.jpg"
              alt="Profile"
              class="rounded-circle" /> </a><!-- End Profile Iamge Icon -->

          <ul
            class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo isset($_SESSION['name']) ? $_SESSION['name'] : 'User'; ?></h6>
              <span><?php echo isset($_SESSION['role']) ? $_SESSION['role'] : 'Role'; ?></span>
            </li>
            <li>
              <hr class="dropdown-divider" />
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>
          </ul>
          <!-- End Profile Dropdown Items -->
        </li>
        <!-- End Profile Nav -->
      </ul>
    </nav>
    <!-- End Icons Navigation -->
  </header>
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php">
          <i class="bi bi-speedometer2"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="kategori_produk.php">
          <i class="bi bi-tags"></i>
          <span>Kategori Produk</span>
        </a>
      </li>
      <!-- End Kategori Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="produk.php">
          <i class="bi bi-box-seam"></i>
          <span>Data Produk</span>
        </a>
      </li>
      <!-- End Produk Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="laporan.html">
          <i class="bi bi-bar-chart-line"></i>
          <span>Laporan</span>
        </a>
      </li>
      <!-- End Laporan Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="users.html">
          <i class="bi bi-people"></i>
          <span>Manajemen User</span>
        </a>
      </li>
      <!-- End User Nav -->
    </ul>
  </aside>
  <!-- End Sidebar-->

  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div>
    <!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- LEFT SIDE -->
        <div class="col-lg-8">
          <div class="row">

            <!-- TOTAL PRODUK -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card">

                <div class="card-body">
                  <h5 class="card-title">Produk <span>| Total</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-box"></i>
                    </div>
                    <div class="ps-3">
                      <h6>120</h6>
                      <span class="text-muted small pt-2 ps-1">Total Produk</span>
                    </div>
                  </div>

                </div>
              </div>
            </div>

            <!-- TOTAL STOK -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card">

                <div class="card-body">
                  <h5 class="card-title">Stok <span>| Total</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-archive"></i>
                    </div>
                    <div class="ps-3">
                      <h6>540</h6>
                      <span class="text-muted small pt-2 ps-1">Jumlah Semua Stok</span>
                    </div>
                  </div>

                </div>
              </div>
            </div>

            <!-- KATEGORI -->
            <div class="col-xxl-4 col-md-12">
              <div class="card info-card">

                <div class="card-body">
                  <h5 class="card-title">Kategori <span>| Total</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-tags"></i>
                    </div>
                    <div class="ps-3">
                      <h6>12</h6>
                      <span class="text-muted small pt-2 ps-1">Total Kategori</span>
                    </div>
                  </div>

                </div>
              </div>
            </div>

            <!-- REPORT / GRAFIK -->
            <div class="col-12">
              <div class="card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown">
                    <i class="bi bi-three-dots"></i>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>
                    <li><a class="dropdown-item" href="#">Hari Ini</a></li>
                    <li><a class="dropdown-item" href="#">Bulan Ini</a></li>
                    <li><a class="dropdown-item" href="#">Tahun Ini</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Laporan Barang <span>| Bulan Ini</span></h5>

                  <div id="reportsChart"></div>

                  <script>
                    document.addEventListener("DOMContentLoaded", () => {
                      new ApexCharts(document.querySelector("#reportsChart"), {
                        series: [{
                            name: 'Barang Masuk',
                            data: [10, 15, 8, 12, 20, 18, 25]
                          },
                          {
                            name: 'Barang Keluar',
                            data: [5, 7, 6, 9, 10, 14, 16]
                          }
                        ],
                        chart: {
                          height: 350,
                          type: 'area',
                          toolbar: {
                            show: false
                          }
                        },
                        markers: {
                          size: 4
                        },
                        colors: ['#4154f1', '#ff771d'],
                        fill: {
                          type: "gradient",
                          gradient: {
                            shadeIntensity: 1,
                            opacityFrom: 0.3,
                            opacityTo: 0.4,
                            stops: [0, 90, 100]
                          }
                        },
                        dataLabels: {
                          enabled: false
                        },
                        stroke: {
                          curve: 'smooth',
                          width: 2
                        },
                        xaxis: {
                          categories: ["Sen", "Sel", "Rab", "Kam", "Jum", "Sab", "Min"]
                        },
                        tooltip: {
                          x: {
                            format: 'dd/MM/yy'
                          },
                        }
                      }).render();
                    });
                  </script>

                </div>
              </div>
            </div>

            <!-- PRODUK TERBARU -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">

                <div class="card-body">
                  <h5 class="card-title">Produk Terbaru <span>| Latest</span></h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Produk</th>
                        <th>Kategori</th>
                        <th>Stok</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th>1</th>
                        <td>Mouse Logitech</td>
                        <td>Aksesoris</td>
                        <td>25</td>
                      </tr>
                      <tr>
                        <th>2</th>
                        <td>Keyboard Mechanical</td>
                        <td>Aksesoris</td>
                        <td>10</td>
                      </tr>
                      <tr>
                        <th>3</th>
                        <td>Monitor 24 Inch</td>
                        <td>Elektronik</td>
                        <td>8</td>
                      </tr>
                    </tbody>
                  </table>

                </div>

              </div>
            </div>

          </div>
        </div>

        <!-- RIGHT SIDE -->
        <div class="col-lg-4">

          <!-- STOK MENIPIS -->
          <div class="card top-selling overflow-auto">

            <div class="card-body pb-0">
              <h5 class="card-title">Stok Menipis <span>| Warning</span></h5>

              <table class="table table-borderless">
                <thead>
                  <tr>
                    <th>Produk</th>
                    <th>Stok</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Printer Epson</td>
                    <td>3</td>
                    <td><span class="badge bg-danger">Hampir Habis</span></td>
                  </tr>
                  <tr>
                    <td>Flashdisk 32GB</td>
                    <td>5</td>
                    <td><span class="badge bg-warning">Menipis</span></td>
                  </tr>
                </tbody>
              </table>

            </div>

          </div>

          <!-- AKTIVITAS -->
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Aktivitas Barang</h5>

              <div class="activity">

                <div class="activity-item d-flex">
                  <div class="activite-label">10 menit lalu</div>
                  <i class="bi bi-circle-fill activity-badge text-success"></i>
                  <div class="activity-content">
                    Penambahan stok "Mouse Logitech"
                  </div>
                </div>

                <div class="activity-item d-flex">
                  <div class="activite-label">30 menit lalu</div>
                  <i class="bi bi-circle-fill activity-badge text-danger"></i>
                  <div class="activity-content">
                    Pengeluaran barang "Keyboard Mechanical"
                  </div>
                </div>

              </div>

            </div>
          </div>

        </div>

      </div>
    </section>
  </main>
  <!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer>
  <!-- End Footer -->

  <a
    href="#"
    class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
</body>

</html>