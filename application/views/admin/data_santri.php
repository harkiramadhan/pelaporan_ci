<!-- Header -->
<div class="header bg-gradient-default pb-8 pt-3 pt-md-5">
        </div>
        <!-- Page content -->
        <div class="container-fluid mt--8">
            <!-- Table -->
            <div class="row">
                <div class="col">
                    <div class="card shadow">
                        <div class="card-header bg-white border-0">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="mb-0">Data Siswa</h3>
                                </div>
                                <div class="col-3 text-right">
                                    <input type="text" id="myInput" placeholder="Cari Siswa ..." class="form-control form-control-alternative form-control-sm">
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Halaqoh</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="myTable">
                                    <?php 
                                    $no = 1;
                                    foreach($santri as $row){ ?>
                                    <tr>
                                        <td scope="row"><?= $no++ ?></td>
                                        <td scope="row">
                                            <div class="media align-items-center">
                                                <a href="#" class="avatar rounded-circle mr-3">
                                                    <img alt="Image placeholder" src="https://cdn.sribu.com/assets/media/contest_detail/2018/4/desain-logo-untuk-paud-5ae2c545faaa267c29cb280e/ec1b6936e8.jpg">
                                                </a>
                                                <div class="media-body">
                                                    <span class="mb-0 text-sm"><?= $row->nama ?></span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge badge-dot mr-4">Ust Afud</span>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-secondary">Edit</button>
                                            <button type="button" class="btn btn-sm btn-danger">Hapus</button>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>