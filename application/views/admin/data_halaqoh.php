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
                            <h3 class="mb-0">Data Halaqoh</h3>
                        </div>
                        <div class="col-3 text-right">
                            <input type="text" id="myInput" placeholder="Cari Halaqoh ..." class="form-control form-control-alternative form-control-sm">
                        </div>
                        <div class="col-2">
                            <button type="button" data-toggle="modal" data-target="#tambah" class="btn btn-info">Tambah Halaqoh</button>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" width="10">No</th>
                                <th scope="col">Nama Musyrif</th>
                                <th scope="col">Nama Halaqoh</th>
                                <th scope="col">Jumlah Santri</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="myTable">
                            <?php 
                            $no = 1;
                            foreach($halaqoh as $row){
                            ?>
                            <tr>
                                <td scope="row"><?= $no++ ?></td>
                                <td scope="row">
                                    <div class="media align-items-center">
                                        <div class="avatar rounded-circle mr-3">
                                            <img alt="Image placeholder" src="https://cdn.sribu.com/assets/media/contest_detail/2018/4/desain-logo-untuk-paud-5ae2c545faaa267c29cb280e/ec1b6936e8.jpg">
                                        </div>
                                        <div class="media-body">
                                            <span class="mb-0 text-sm"><?= $row->nama ?></span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge badge-dot mr-4"><?= $row->nama_halaqoh ?></span>
                                </td>
                                <td>
                                    <span class="badge badge-dot mr-4">10 Orang</span>
                                </td>
                                <td>
                                    <button type="button" data-toggle="modal" data-target="#edit<?= $row->id ?>" class="btn btn-sm btn-secondary">Edit</button>
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

    <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <div class="col"> <h3 class="mb-0">Tambah Halaqoh</h3> </div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                </div>
                <form action="<?= site_url('admin/tambah_halaqoh') ?>" method="POST">
                <div class="modal-body bg-secondary">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Nama Halaqoh</label>
                                        <input type="text" name="nama_halaqoh" class="form-control form-control-alternative form-control-sm" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Nama Guru</label>
                                        <select name="id_guru" class="form-control form-control-alternative form-control-sm">
                                            <option selected disabled>Pilih Guru</option>
                                            <?php foreach($list_guru as $g){ ?>
                                            <option value="<?= $g->id ?>"><?= $g->nama ?></option>
                                            <?php } ?>
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

    <?php foreach($halaqoh as $edit){ ?>
    <div class="modal fade" id="edit<?= $edit->id ?>" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <div class="col"> <h3 class="mb-0">Edit Halaqoh <?= $edit->nama_halaqoh ?></h3> </div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                </div>
                <form action="<?= site_url('admin/edit_halaqoh/'.$edit->id) ?>" method="POST">
                <div class="modal-body bg-secondary">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Nama Halaqoh</label>
                                        <input type="text" name="nama_halaqoh" value="<?= $edit->nama_halaqoh ?>" class="form-control form-control-alternative form-control-sm" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Nama Guru</label>
                                        <select name="id_guru" class="form-control form-control-alternative form-control-sm">
                                            <option selected value="<?= $edit->id_guru ?>"><?= $edit->nama ?></option>
                                            <option disabled ></option>
                                            <?php foreach($list_guru as $g){ ?>
                                                <option value="<?= $g->id ?>"><?= $g->nama ?></option>
                                            <?php } ?>
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