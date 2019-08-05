<!-- Header -->
<div class="header bg-gradient-default pb-8 pt-5 pt-md-8">
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
                                    <h3 class="mb-0">Data Hafalan Baru</h3>
                                </div>
                                <div class="col-3 text-right">
                                    <input type="text" placeholder="Cari Siswa ..." class="form-control form-control-alternative form-control-sm">
                                </div>
                                <div class="col-2">
                                    <button type="button" data-toggle="modal" data-target="#tambah" class="btn btn-info">Tambah Hafalan</button>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Surat</th>
                                        <th scope="col">Ayat</th>
                                        <th scope="col">Juz</th>
                                        <th scope="col">Jumlah Halaman</th>
                                        <th scope="col">Keterangan</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $no = 1;
                                    foreach($hafalan as $row){ ?>
                                    <tr>
                                        <td scope="row"><?= $no++ ?></td>
                                        <td scope="row"><?= $row->tanggal ?></td>
                                        <td scope="row"><?= $row->nama ?></td>
                                        <?php foreach($surat as $sur => $value){?>
                                            <?php if($row->surat == $value['nomor']): ?>
                                                <td scope="row"><?= $value['nama'] ?></td>
                                            <?php endif; ?>
                                        <?php } ?>
                                        <td scope="row"><?= $row->ayat ?></td>
                                        <td scope="row"><?= $row->juz ?></td>
                                        <td scope="row"><?= $row->jumlah ?> Halaman</td>
                                        <td scope="row"><p><?= $row->keterangan ?></p></td>
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

    <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <div class="col"> <h3 class="mb-0">Tambah Setoran Hafalan Baru</h3> </div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                </div>
                <form action="<?= site_url('hafalan/tambah') ?>" method="POST">
                <div class="modal-body bg-secondary">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Tanggal</label>
                                    <input type="date" name="tanggal" class="form-control form-control-alternative form-control-sm" placeholder="tanggal" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Nama</label>
                                    <select name="id_siswa" id="" class="form-control form-control-alternative form-control-sm" required>
                                        <option value="" selected disabled>- Pilih Siswa -</option>
                                        <?php foreach($siswa as $s){ ?>
                                        <option value="<?= $s->id ?>"><?= $s->nama ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Surat</label>
                                    <select name="surat" id="" class="form-control form-control-alternative form-control-sm" required>
                                    <option value="" disabled selected>- Pilih Surat -</option>
                                        <?php foreach($surat as $sur => $value){?>
                                        <option value="<?= $value['nomor'] ?>"><?= $value['nama'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Ayat <small class="text-warning">*) Ayat Mulai - Ayat Selesai</small></label>
                                    <input type="text" name="ayat" class="form-control form-control-alternative form-control-sm" placeholder="Ayat" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Juz</label>
                                    <select name="juz" id="" class="form-control form-control-alternative form-control-sm" required>
                                    <option value="" selected disabled>- Pilih Juz -</option>
                                    <?php 
                                        foreach(range(1, 30)  as $n){
                                    ?>
                                    <option value="<?= $n ?>"><?= $n ?></option>
                                    <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Jumlah Halaman</label>
                                    <input type="number" name="jumlah" class="form-control form-control-alternative form-control-sm" placeholder="Jumlah Hafalan Yang Di Setorkan" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Keterangan</label>
                                    <textarea name="keterangan" id="" cols="30" rows="10" class="form-control form-control-alternative form-control-sm"></textarea>
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

    <?php foreach($hafalan as $row){ ?>
        <div class="modal fade" id="edit<?= $row->id ?>" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <div class="col"> <h3 class="mb-0">Edit Hafalan Baru <?= $row->nama ?></h3> </div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                </div>
                <form action="<?= site_url('hafalan/edit/'.$row->id) ?>" method="POST">
                <div class="modal-body bg-secondary">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Tanggal</label>
                                    <input type="date" name="tanggal" class="form-control form-control-alternative form-control-sm" placeholder="tanggal" value="<?= $row->tanggal ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Nama</label>
                                    <select name="id_siswa" id="" class="form-control form-control-alternative form-control-sm" required>
                                        <option value="<?= $row->id_siswa ?>" selected><?= $row->nama ?></option>
                                        <option value="" disabled></option>
                                        <?php foreach($siswa as $s){ ?>
                                        <option value="<?= $s->id ?>"><?= $s->nama ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Surat</label>
                                    <select name="surat" id="" class="form-control form-control-alternative form-control-sm" required>
                                        <?php foreach($surat as $sur => $value){?>
                                        <option value="<?= $value['nomor'] ?>" <?php if($row->surat == $value['nomor']){echo "selected";} ?>><?= $value['nama'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Ayat <small class="text-warning">*) Ayat Mulai - Ayat Selesai</small></label>
                                    <input type="text" name="ayat" class="form-control form-control-alternative form-control-sm" placeholder="Ayat" required value="<?= $row->ayat ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Juz</label>
                                    <select name="juz" id="" class="form-control form-control-alternative form-control-sm" required>
                                    <option value="<?= $row->juz ?>" selected>Juz - <?= $row->juz ?></option>
                                    <option value="" disabled></option>
                                    <?php 
                                        foreach(range(1, 30)  as $n){
                                    ?>
                                    <option value="<?= $n ?>">Juz - <?= $n ?></option>
                                    <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Jumlah Halaman</label>
                                    <input type="number" name="jumlah" class="form-control form-control-alternative form-control-sm" placeholder="Jumlah Hafalan Yang Di Setorkan" required value="<?= $row->jumlah ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Keterangan</label>
                                    <textarea name="keterangan" id="" cols="30" rows="10" class="form-control form-control-alternative form-control-sm"><?= $row->keterangan ?></textarea>
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

    <div class="modal fade" id="delete<?= $row->id ?>" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
        <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
            <div class="modal-content bg-gradient-danger">
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-title-notification">Hapus Hafalan | <?= $row->nama ?></h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                <div class="py-3 text-center">
                    <i class="ni ni-bell-55 ni-3x"></i>
                    <p>Apakah Anda Yakin Untuk Menghapus Setoran Hafalan Baru .</p>
                    <strong><?= $row->nama ?></strong>
                    <p>Pada Tanggal <?= $row->tanggal ?></p>
                </div>
                </div>
                <form action="<?= site_url('hafalan/delete/'.$row->id) ?>" method="POST">
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-link text-white" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-sm btn-white ml-auto">Ya, Mengerti</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <?php } ?>