        <!-- Header -->
        <div class="header bg-gradient-default pb-8 pt-md-5">
            <div class="container-fluid">
                <div class="header-body"></div>
            </div>
        </div>
        <!-- Page content -->
        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col-xl-12 order-xl-1">
                    <!-- Card stats -->
                    <div class="row">
                        <div class="col-xl-4 col-lg-4">
                            <div class="card shadow card-stats mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-5">Jumlah <br> Santri</h5>
                                            <span class="h1 font-weight-bold mb-0"><?= $jum_santri ?> Santri</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                                <i class="fas fa-chart-bar"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4">
                            <div class="card shadow card-stats mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-5">Jumlah <br> Hafalan Baru/hal</h5>
                                            <span class="h1 font-weight-bold mb-0"><?= $jum_hafalanbaru ?><small> x</small></span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                                <i class="fas fa-chart-pie"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4">
                            <div class="card shadow card-stats mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-5">Jumlah <br> Murojaah/hal</h5>
                                            <span class="h1 font-weight-bold mb-0"><?= $jum_murojaah ?><small> x</small></span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                                <i class="fas fa-chart-bar"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>