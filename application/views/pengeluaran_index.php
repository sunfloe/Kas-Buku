<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path=".<?=base_url("assets/sneat")?>./assets/"
  data-template="vertical-menu-template-free">
 <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>
    <title>pengeluaran - KAs BuKu</title>
    <?php require_once('layout/_css.php');?>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">

        <?php require_once('layout/_menu.php');?>

        <!-- Layout container -->
        <div class="layout-page">

        <?php require_once('layout/_navbar.php');?>

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
                                    
                        <div class="card-body">
                        <div class="col-sm-12" id="hilang">
                        <?= $this->session->flashdata('alert',true);?>
                        </div>   
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                          Tambah Pengeluaran
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Pengeluaran</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                              <form action="<?= base_url('pengeluaran/simpan')?>" method="post">
                                    <div class="mb-3">
                                      <label class="form-label">keterangan</label>
                                      <input type="text" class="form-control" name="keterangan">
                                    </div>
                                    <div class="mb-3">
                                      <label class="form-label">nominal</label>
                                      <input type="number" class="form-control" name="nominal">
                                    </div>
                                    <div class="mb-3">
                                      <label class="form-label">tanggal</label>
                                      <input type="date" class="form-control" name="tanggal">
                                    </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">simpan</button>
                              </div>
                              </form>
                            </div>
                          </div>
                        </div>
                        <div class="card">
                            <h5 class="card-header">data pengeluaran</h5>
                            <div class="table-responsive text-nowrap">
                            <table class="table">
                                <thead>
                                <tr class="text-nowrap">
                                    <th>#</th>
                                    <th>Tanggal</th>
                                    <th>keterangan</th>
                                    <?php if($this->session->userdata('level')=='Admin'){?>
                                    <th>username</th>
                                    <?php } ?>
                                    <th>nominal</th>
                                    <th>aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                  <?php $no=1; foreach($pengeluaran as $ya){?>
                                <tr>
                                    <th scope="row"><?= $no; ?></th>
                                    <td><?= $ya['tanggal']; ?></td>
                                    <td><?= $ya['keterangan']; ?></td>
                                    <?php if($this->session->userdata('level')=='Admin'){?>
                                    <td><?= $ya['username']; ?></td>
                                    <?php } ?>
                                    <td >Rp. <?= number_format($ya['nominal']); ?></td>
                                    <td>
                                    <a onClick = "return confirm ('Apakah anda yakin?')"
                                       href="<?= base_url('pengeluaran/delete_data/'.$ya['transaksi_id'])?>">
                                       <button class="btn btn-dark">
                                      <i class="bx bxs-trash"></i>
                                      </button>
                                    </a>
                                  </td>
                                </tr>
                                  <?php $no++; }?>
                                </tbody>
                            </table>
                          </div>
                        
            </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <?php require_once('layout/_footer.php');?>
      
            <div class="content-backdrop fade"></div>
          </div>
        </div>
      </div>
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <?php require_once('layout/_js.php');?>
  </body>
</html>
