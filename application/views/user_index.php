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
    <title> user</title>
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
                        <a href="<?=base_url('user/tambah')?>" class="btn btn-primary mb-2" >tambah user</a>
                        <div class="card">
                            <h5 class="card-header">tabel user</h5>
                            <div class="table-responsive text-nowrap">
                            <table class="table">
                                <thead>
                                <tr class="text-nowrap">
                                    <th>#</th>
                                    <th>Username</th>
                                    <th>nama</th>
                                    <th>level</th>
                                    <th>aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                  <?php $no=1; foreach($user as $ya){?>
                                <tr>
                                    <th scope="row"><?= $no; ?></th>
                                    <td><?= $ya['username']; ?></td>
                                    <td><?= $ya['nama']; ?></td>
                                    <td><?= $ya['level']; ?></td>
                                    <td>
                                    <a href="<?= site_url('user/edit/'.$ya['id_user']) ?>"> 
                                      <button class="btn btn-secondary m2">
                                      <i class='bx bxs-edit'></i> 
                                      </button>
                                    </a>
                                  
                                    <a onClick = "return confirm ('Apakah anda yakin?')"
                                       href="<?= base_url('user/delete_data/'.$ya['id_user'])?>">
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
