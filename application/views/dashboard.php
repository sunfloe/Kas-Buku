<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
	data-assets-path=".<?=base_url("assets/sneat")?>./assets/" data-template="vertical-menu-template-free">

<head>
	<meta charset="utf-8" />
	<meta name="viewport"
		content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
	<title>Dashboard - KAs BuKu</title>
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
				<?php 
          $pemasukan = $this->Transaksi_model->pemasukan_total();
          $pengeluaran = $this->Transaksi_model->pengeluaran_total();
          $saldo_akhir = $pemasukan - $pengeluaran;
          ?>

				<div class="content-wrapper">
					<!-- Content -->
					<div class="container-xxl flex-grow-1 container-p-y">
						<div class="row">
							<div class="col-lg-12 mb-0 order-0">
								<div class="card">
									<div class="d-flex align-items-end row">
										<div class="col-sm-12">
											<div class="card-body">
												<h2 class="">Haloo <?= $this->session->userdata('nama')?></h2>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>


					<!-- Content -->
					<div class="container-xxl flex-grow-1 container-p-y">
						<div class="row">
							<div class="col-lg-12 mb-2 order-0">
								<!-- Button trigger modal -->
								<button type="button" class="btn btn-danger mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
									<i class="bx bxs-printer">Detail Laporan</i>
								</button>

								<div class="card">
									<div class="d-flex align-items-end row">
										<div class="col-sm-12">
											<div class="card-body">
												<div class="col-xs-12">
													<div class="box box-solid">
														<div class="box-body">
															<div class="col-xs-12">
																<table class="table">
																	<tbody>
																		<tr>
																			<td colspan="3" style="text-align: center; font-size: 18px;">TOTAL SEMUA PEMASUKAN
																			</td>
																		</tr>
																		<tr>
																			<td style="text-align: center;">HARI INI</td>
																			<td style="text-align: center;">BULAN INI</td>
																			<td style="text-align: center;">TOTAL PEMASUKAN</td>
																		</tr>
																		<tr>
																			<td style="text-align: center;">
																				Rp.<?= number_format($this->Transaksi_model->pemasukan_total_hari_ini());?></td>
																			<td style="text-align: center;">
																				Rp.<?= number_format($this->Transaksi_model->pemasukan_total_hari_ini());?></td>
																			<td style="text-align: center;">
																				Rp.<?= number_format($this->Transaksi_model->pemasukan_total());?></td>
																		</tr>
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

							<div class="col-lg-12 mb-4 order-0">
								<div class="card">
									<div class="d-flex align-items-end row">
										<div class="col-sm-12">
											<div class="card-body">
												<div class="col-xs-12">
													<div class="box box-solid">
														<div class="box-body">
															<div class="col-xs-12">
																<table class="table table-striped">
																	<tbody>
																		<tr>
																			<td colspan="4" style="text-align: center; font-size: 18px;">TOTAL SEMUA
																				PENGELUARAN
																			</td>
																		</tr>
																		<tr>
																			<td style="text-align: center;">HARI INI</td>
																			<td style="text-align: center;">BULAN INI</td>
																			<td style="text-align: center;">TOTAL PENGELUARAN</td>
																			<td style="text-align: center;">SALDO AKHIR</td>
																		</tr>
																		<tr>
																			<td style="text-align: center;">
																				Rp.<?= number_format($this->Transaksi_model->pengeluaran_total_hari_ini());?>
																			</td>
																			<td style="text-align: center;">
																				Rp.<?= number_format($this->Transaksi_model->pengeluaran_total_bulan_ini());?>
																			</td>
																			<td style="text-align: center;">
																				Rp.<?= number_format($this->Transaksi_model->pengeluaran_total());?></td>
																			<td style="text-align: center;">Rp.<?= number_format($saldo_akhir);?></td>
																		</tr>
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
						</div>
					</div>

					<!-- Modal -->
					<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
						aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">laporan</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body">
									<form action="<?= base_url('beranda/laporan')?>" method="get" target="_blank">
										<div class="mb-3">
											<label class="form-label">tanggal awal</label>
											<input type="date" class="form-control" name="tanggal1">
										</div>
										<div class="mb-3">
											<label class="form-label">tanggal akhir</label>
											<input type="date" class="form-control" name="tanggal2">
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
											<button type="submit" class="btn btn-primary">simpan</button>
										</div>
									</form>
								</div>
							</div>
						</div>
						<div class="content-backdrop fade"></div>
					</div>
				</div>
			</div>
			<div class="layout-overlay layout-menu-toggle"></div>
		</div>
		<?php require_once('layout/_js.php');?>
</body>

</html>
