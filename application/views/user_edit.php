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
    <title>edit user - KAs BuKu</title>
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
          <?php $no=1; foreach($user as $ya){?>
          <div class="content-wrapper">
            <!-- Content -->
            <div class="card-body">
                <div class="col-xxl">
                <div class="col-xl">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">edit user</h5>
                    </div>
                    <div class="card-body">
                      <form action="<?= base_url('user/update_data')?>" method="post">
                      <input type="hidden" name="id" value="<?=$ya['id_user']?>">
                        <div class="mb-3">
                          <label class="form-label">username</label>
                          <input type="text" class="form-control" name="username" value="<?= $ya['username']?>" readonly>
                        </div>
                        <div class="mb-3">
                          <label class="form-label">nama</label>
                          <input type="text" class="form-control" name="nama" value="<?= $ya['nama']?>">
                        </div>
                        <div class="mb-3">
                        <label class="form-label">Level</label>
                        <select class="form-select" name="level">
                          <option value="User" <?php if($ya['level']=='user'){echo "selected";} ?>>User</option>
                          <option value="Admin"<?php if($ya['level']=='admin'){echo "selected";}?>>Admin</option>
                        </select>
                        </div>
                        <button type="submit" class="btn btn-primary" name="update">update</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                </div>
            <?php }?>
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
