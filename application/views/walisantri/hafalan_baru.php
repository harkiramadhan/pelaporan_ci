        <!-- Header -->
        <div class="header bg-gradient-default pb-8 pt-3 pt-md-3">
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
                                    <h3 class="mb-0">Data Hafalan Baru <?= $siswa->nama ?></h3>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive" style="max-height: 550px">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Surat</th>
                                        <th scope="col">Ayat</th>
                                        <th scope="col">Juz</th>
                                        <th scope="col">Jumlah Halaman</th>
                                        <th scope="col">Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody id="myTable">
                                    <?php 
                                    $no = 1;
                                    foreach($hafalan as $row){ ?>
                                    <tr>
                                        <td scope="row"><?= $no++ ?></td>
                                        <td scope="row"><?= $row->tanggal ?></td>
                                        <?php foreach($surat as $sur => $value){?>
                                            <?php if($row->surat == $value['nomor']): ?>
                                                <td scope="row"><?= $value['nama'] ?></td>
                                            <?php endif; ?>
                                        <?php } ?>
                                        <td scope="row"><?= $row->ayat ?></td>
                                        <td scope="row"><?= $row->juz ?></td>
                                        <td scope="row"><?= $row->jumlah ?> Halaman</td>
                                        <td scope="row"><p><?= $row->keterangan ?></p></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
