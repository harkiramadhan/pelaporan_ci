    <!-- Header -->
    <div class="header bg-gradient-default pb-8 pt-3 pt-md-5">
    <div class="container-fluid">
        <div class="nav-wrapper">
          <ul class="nav nav-pills flex-row flex-md-row" id="tabs-icons-text" role="tablist">
            <li class="nav-item">
                <a class="nav-link mb-sm-3 mb-md-2 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#musyrif" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true">Admin / Musyrif</a>
            </li>
            <li class="nav-item">
                <a class="nav-link mb-sm-3 mb-md-2 ml-3 ml-sm-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#walisantri" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false">Walisantri</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--8">
    <!-- Table -->
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="musyrif" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                        <div class="card-header bg-white border-0">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="mb-0">Data User Musyrif / Admin</h3>
                                </div>
                                <div class="col-3 text-right">
                                    <input type="text" id="myInput" placeholder="Cari User ..." class="form-control form-control-alternative form-control-sm">
                                </div>
                                <div class="col-2">
                                    <button type="button" data-toggle="modal" data-target="#tambah" class="btn btn-info">Tambah User</button>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col" width="10">No</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $no = 1;
                                    foreach($user as $row){
                                    ?>
                                    <tr>
                                        <td scope="row">1</td>
                                        <td scope="row">
                                            <div class="media align-items-center">
                                                <div class="media-body">
                                                    <span class="mb-0 text-sm"><strong><?= $row->username ?></strong></span>
                                                </div>
                                            </div>
                                        </td>
                                        <td scope="row"><strong><?= $row->nama ?></strong></td>
                                        <td>
                                            <span class="badge badge-dot mr-4">
                                                <?php if($row->status == 'aktif' || $row->status == 'Aktif'): ?>
                                                    <i class="bg-success"></i>Aktif</span>
                                                <?php else: ?>
                                                    <i class="bg-warning"></i>Non Aktif</span>
                                                <?php endif; ?></td>
                                            </span>
                                        </td>
                                        <td>
                                            <?php if($row->role == '1'): ?>
                                                Admin
                                            <?php else: ?>
                                                Musyrif
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <button type="button" data-toggle="modal" data-target="#edit<?= $row->id ?>" class="btn btn-sm btn-secondary">Edit</button>
                                            <button type="button" data-toggle="modal" data-target="#delete<?= $row->id ?>" class="btn btn-sm btn-danger">Hapus</button>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="walisantri" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                        <div class="card-header bg-white border-0">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="mb-0">Data User Musyrif / Admin</h3>
                                </div>
                                <div class="col-3 text-right">
                                    <input type="text" id="myInput" placeholder="Cari User ..." class="form-control form-control-alternative form-control-sm">
                                </div>
                                <div class="col-2">
                                    <button type="button" data-toggle="modal" data-target="#tambah" class="btn btn-info">Tambah User</button>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col" width="10">No</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $no = 1;
                                    foreach($user as $row){
                                    ?>
                                    <tr>
                                        <td scope="row">1</td>
                                        <td scope="row">
                                            <div class="media align-items-center">
                                                <div class="media-body">
                                                    <span class="mb-0 text-sm"><strong><?= $row->username ?></strong></span>
                                                </div>
                                            </div>
                                        </td>
                                        <td scope="row"><strong><?= $row->nama ?></strong></td>
                                        <td>
                                            <span class="badge badge-dot mr-4">
                                                <?php if($row->status == 'aktif' || $row->status == 'Aktif'): ?>
                                                    <i class="bg-success"></i>Aktif</span>
                                                <?php else: ?>
                                                    <i class="bg-warning"></i>Non Aktif</span>
                                                <?php endif; ?></td>
                                            </span>
                                        </td>
                                        <td>
                                            <?php if($row->role == '1'): ?>
                                                Admin
                                            <?php else: ?>
                                                Musyrif
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <button type="button" data-toggle="modal" data-target="#edit<?= $row->id ?>" class="btn btn-sm btn-secondary">Edit</button>
                                            <button type="button" data-toggle="modal" data-target="#delete<?= $row->id ?>" class="btn btn-sm btn-danger">Hapus</button>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <div class="col"> <h3 class="mb-0">Tambah User</h3> </div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                </div>
                <form action="<?= site_url('user/tambah') ?>" method="POST">
                <div class="modal-body bg-secondary">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Username</label>
                                    <input type="text" name="username" class="form-control form-control-alternative form-control-sm" placeholder="Username" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="password" name="password" class="form-control form-control-alternative form-control-sm" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Nama Guru</label>
                                    <select name="id_guru" class="form-control form-control-alternative form-control-sm">
                                        <option selected disabled>- Pilih Guru -</option>
                                        <?php foreach($list_guru as $row){ ?>
                                        <option value="<?= $row->id ?>"><?= $row->nama ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Status</label>
                                    <select name="status" class="form-control form-control-alternative form-control-sm">
                                        <option selected disabled>- Pilih Status -</option>
                                        <option value="aktif">Aktif</option>
                                        <option value="">Non Aktif</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Role</label>
                                    <select name="role" class="form-control form-control-alternative form-control-sm">
                                        <option selected disabled>- Pilih Role -</option>
                                        <option value="1">Admin</option>
                                        <option value="2">Musyrif</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-link" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <?php foreach($user as $edit){ ?>
        <div class="modal fade" id="edit<?= $edit->id ?>" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <div class="col"> <h3 class="mb-0">Edit User <?= $edit->username ?></h3> </div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                </div>
                <form action="<?= site_url('user/edit/'.$edit->id) ?>" method="POST">
                <div class="modal-body bg-secondary">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Username</label>
                                    <input type="text" name="username" value="<?= $edit->username ?>" class="form-control form-control-alternative form-control-sm" placeholder="Username" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="password" name="password" class="form-control form-control-alternative form-control-sm">
                                </div>
                                <div class="form-group">
                                    <label for="">Nama Guru</label>
                                    <select name="id_guru" class="form-control form-control-alternative form-control-sm">
                                        <option selected value="<?= $edit->id_guru ?>"><?= $edit->nama ?></option>
                                        <option disabled></option>
                                        <?php foreach($list_guru as $row){ ?>
                                        <option value="<?= $row->id ?>"><?= $row->nama ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Status</label>
                                    <select name="status" class="form-control form-control-alternative form-control-sm">
                                        <option value="<?= $edit->status ?>" selected><?= $edit->status ?></option>
                                        <option disabled></option>
                                        <option value="aktif">Aktif</option>
                                        <option value="">Non Aktif</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Role</label>
                                    <select name="role" class="form-control form-control-alternative form-control-sm">
                                        <option selected value="<?= $edit->role ?>"><?php if($edit->role == 1){echo "Admin";}elseif($edit->role == 2){echo "Musyrif";} ?></option>
                                        <option disabled></option>
                                        <option value="1">Admin</option>
                                        <option value="2">Musyrif</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-link" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <?php } ?>

    <?php foreach($user as $delete){ ?>
    <div class="col-md-4">
        <div class="modal fade" id="delete<?= $delete->id ?>" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
            <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                <div class="modal-content bg-gradient-danger">
                    <div class="modal-header">
                        <h6 class="modal-title" id="modal-title-notification">Hapus User | <?= $delete->username ?></h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <div class="py-3 text-center">
                        <i class="ni ni-bell-55 ni-3x"></i>
                        <p>Apakah Anda Yakin Untuk Menghapus User .</p>
                        <strong><?= $delete->username ?></strong>
                    </div>
                    </div>
                    <form action="<?= site_url('user/delete/'.$delete->id) ?>" method="POST">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-link text-white" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-sm btn-white ml-auto">Ya, Mengerti</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>