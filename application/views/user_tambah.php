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
    <title>tambah user - KAs BuKu</title>
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
            <div class="card-body">
                <div class="col-xxl">
                <div class="col-xl">
                  <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center mb-2">
                      <h5 class="mb-2">Tambah user</h5>
                    </div>
                    <div class="card-body mb-2">
                      <form action="<?= base_url('user/simpan')?>" method="post">
                        <div class="mb-3">
                          <label class="form-label">username</label>
                          <input type="text" class="form-control" name="username">
                        </div>
                        <div class="mb-3">
                          <label class="form-label">password</label>
                          <input type="password" class="form-control" name="password">
                        </div>
                        <div class="mb-3">
                          <label class="form-label">nama</label>
                          <input type="text" class="form-control" name="nama">
                        </div>
                        <div class="mb-3">
                        <label class="form-label">Level</label>
                        <select class="form-select" name="level">
                          <option>Level</option>
                          <option value="User">User</option>
                          <option value="Admin">Admin</option>
                        </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                      </form>
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
