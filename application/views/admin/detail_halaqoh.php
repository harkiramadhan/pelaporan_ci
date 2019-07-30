<!-- Header -->
<div class="header bg-gradient-default pb-8 pt-3 pt-md-5">
</div>
<!-- Page content -->
<div class="container-fluid mt--7">
  <div class="row">
    <div class="col">
      <div class="card bg-secondary shadow">
          <div class="card-header bg-white border-0">
            <div class="row align-items-center">
              <div class="col-8">
                <h3 class="mb-0">Data Halaqoh</h3>
              </div>
            </div>
          </div>
          <div class="card-body mb-2">
            <div class="row">
              <div class="col-lg-6 text-center">
                <div class="form-group">
                  <label class="form-control-label" for="input-username">Nama Halaqoh &nbsp : &nbsp <strong><?= $halaqoh->nama_halaqoh ?></strong></label>
                </div>
              </div>
              <div class="col-lg-6 text-center">
                <label class="form-control-label" for="input-username">Nama Musyrif &nbsp : &nbsp <strong><?= $halaqoh->nama ?></strong></label>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="card bg-secondary">
                  <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                      <div class="col">
                        <h3 class="mb-0">Data Siswa</h3>
                      </div>
                      <div class="col text-right">
                        <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#tambah">Tambah Siswa</button>
                      </div>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <table class="table align-items-center table-flush table-sm">
                      <thead class="thead-light">
                        <tr>
                          <th scope="col" width="10">No</th>
                          <th scope="col">Nama</th>
                          <th scope="col" class="text-center">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        foreach($list_siswa as $row){
                        ?>
                        <tr>
                          <td scope="row"><?= $no++ ?></td>
                          <td scope="row">
                            <div class="media align-items-center">
                              <div class="media-body">
                                <span class="mb-0 text-sm"><?= $row->nama ?></span>
                              </div>
                            </div>
                          </td>
                          <td class="text-center">
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

    <div class="modal fade p-0" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header d-md-inline-block bg-transparent border-0">
            <div class="row align-items-center">
              <div class="col">
                <h3 class="mb-0">Tambah Siswa</h3>
              </div>
              <div class="col-sm-6 col-md-12 col-lg-4 pr-3 pr-lg-3 mt-3 mt-lg-0 text-right">
                <div class="form-group mb-0">
                  <input type="text" id="myInput" class="form-control form-control-alternative form-control-sm" placeholder="Cari siswa">
                </div>
              </div>
            </div>
          </div>
          <form action="<?= site_url('halaqoh/tambah_siswa') ?>" method="POST">
          <div class="table-responsive" style="height: 500px">
              <table class="table align-items-center table-flush table-sm table-hover">
                <thead class="thead-light">
                  <tr>
                    <th></th>
                    <th scope="col">No</th>         
                    <th scope="col">Checklist</th>
                    <th scope="col" class="text-center">Nama</th>
                  </tr>
                </thead>
                <tbody id="myTable">
                  <?php
                  $no = 1;
                  foreach($siswa as $row){ ?>
                  <tr>
                    <td></td>
                    <td scope="row" width="10"><?= $no++ ?></td>
                    <td width="10">
                      <div class="custom-control custom-control-alternative custom-checkbox mb-4 ml-3">
                        <input class="custom-control-input" id="customCheck<?= $row->id ?>" type="checkbox" name="id_siswa[]" value="<?= $row->id ?>">
                        <label class="custom-control-label" for="customCheck<?= $row->id ?>"></label>
                      </div>
                    </td>
                    <td scope="row">
                      <div class="media align-items-center">
                        <div class="media-body"><span class="mb-0 text-sm"><?= $row->nama ?></span></div>
                      </div>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
              <input type="hidden" name="id_halaqoh" value="<?= $halaqoh->id?>">
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-sm btn-outline-secondary" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-sm btn-outline-primary">Tambahkan</button>
          </div>
          </form>
        </div>
      </div>
    </div>

  <?php foreach($list_siswa as $row){ ?>
    <form action="<?= site_url('halaqoh/delete_siswa/'.$row->id) ?>" method="POST">
    <div class="col-md-4">
      <div class="modal fade" id="delete<?= $row->id ?>" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
        <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
          <div class="modal-content bg-gradient-danger">
            <div class="modal-header">
              <h6 class="modal-title" id="modal-title-notification">Hapus Siswa | <?= $row->nama ?></h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="py-3 text-center">
                  <i class="ni ni-bell-55 ni-3x"></i>
                  <p>Apakah Anda Yakin Untuk Menghapus Siswa .</p>
                  <strong><?= $row->nama ?></strong>
              </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-link text-white" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-sm btn-white ml-auto">Ya, Mengerti</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    </form>
  <?php } ?>
    
    