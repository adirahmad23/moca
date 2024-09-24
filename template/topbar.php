<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
                <li class="breadcrumb-item text-sm text-white active" aria-current="page">Dashboard</li>
            </ol>
            <h6 class="font-weight-bolder text-white mb-0"><a href="index.php" style="color: #FCFFE7; text-decoration: none;" onmouseover="this.style.color='#E1D7C6';" onmouseout="this.style.color='#FCFFE7';">
                    Dashboard
                </a></h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
        </div>
        <ul class="navbar-nav">
            <?php if ($_SESSION['role'] == 'sepervisi') { ?>
                <li class="nav-item d-flex align-items-center me-3"> <!-- Menambahkan margin-end (kanan) untuk jarak horizontal -->
                    <a href="javascript:;" class="nav-link text-white font-weight-bold px-0">
                        <span class="d-sm-inline d-none">
                            <a href="laporan.php" style="color: #FCFFE7; text-decoration: none;" onmouseover="this.style.color='#E1D7C6';" onmouseout="this.style.color='#FCFFE7';">
                                <h6 class="font-weight-bolder text-white mb-0">Laporan <i class="fa fa-file-text" aria-hidden="true"></i>
                                </h6>
                            </a>
                        </span>
                    </a>
                </li>
            <?php } ?>
            <li class="nav-item d-flex align-items-center me-3"> <!-- Menambahkan margin-end (kanan) untuk jarak horizontal -->
                <a href="javascript:;" class="nav-link text-white font-weight-bold px-0">
                    <span class="d-sm-inline d-none">
                        <a href="logout.php" style="color: #FCFFE7; text-decoration: none;" onmouseover="this.style.color='#E1D7C6';" onmouseout="this.style.color='#FCFFE7';">
                            <h6 class="font-weight-bolder text-white mb-0">Logout <i class="fa fa-sign-out" aria-hidden="true"></i></h6>
                        </a>
                    </span>
                </a>
            </li>
        </ul>

    </div>
</nav>