<?php
$status = $this->session->userdata("status");
if (isset($status) != "login") {
	redirect('login');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>Sekpri | Tamuku</title>
	<meta name="description" content="Doodle is a Dashboard & Admin Site Responsive Template by hencework." />
	<meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Doodle Admin, Doodleadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
	<meta name="author" content="hencework" />

	<!-- Favicon -->
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="icon" href="favicon.ico" type="image/x-icon">

	<!-- Morris Charts CSS -->
	<link href="./assets/vendors/bower_components/morris.js/morris.css" rel="stylesheet" type="text/css" />

	<!-- Data table CSS -->
	<link href="./assets/vendors/bower_components/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />

	<!--alerts CSS -->
	<link href="./assets/vendors/bower_components/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css">

	<!-- Custom CSS -->
	<link href="./assets/dist/css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<!-- Preloader -->
	<!-- <div class="preloader-it">
		<div class="la-anim-1"></div>
	</div> -->
	<!-- /Preloader -->
	<div class="wrapper theme-1-active pimary-color-red">
		<!-- Top Menu Items -->
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="mobile-only-brand pull-left">
				<div class="nav-header pull-left">
					<div class="logo-wrap">
						<a href="index.html">
							<img class="brand-img" src="./assets/dist/img/logo_sibuk5.png" alt="brand" />
							<span class="brand-text">Tamuku</span>
						</a>
					</div>
				</div>
				<a id="toggle_mobile_nav" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-more"></i></a>
			</div>
			<div id="mobile_only_nav" class="mobile-only-nav pull-right">
				<ul class="nav navbar-right top-nav pull-right">
					<li class="dropdown auth-drp">
						<a href="#" class="dropdown-toggle pr-0" data-toggle="dropdown"><?php echo $this->session->userdata('nama'); ?> <img src="./assets/dist/img/user6.png" alt="user_auth" class="user-auth-img img-circle" /><span class="user-online-status"></span></a>
						<ul class="dropdown-menu user-auth-dropdown" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
							<li class="divider"></li>
							<li>
								<a href="login/logout"><i class="zmdi zmdi-power"></i><span>Log Out</span></a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</nav>
		<!-- /Top Menu Items -->

		<!-- Main Content -->
		<div class="page-wrapper" style="margin-left: 0px;">
			<div class="container pt-25">

				<!-- Row -->
				<div class="row">
					<div class="col-lg-9 col-md-9 col-sm-6 col-xs-12">
						<div class="panel panel-default card-view panel-refresh">
							<div class="refresh-container">
								<div class="la-anim-1"></div>
							</div>
							<div class="panel-heading">
								<div class="row">
									<span class="weight-500 font-20 txt-primary ml-25"><i class="fa fa-users"></i> Daftar Tamu</span>
									<form id="bidang" action="Pdfview" method="POST">
										<div class="form-group">
											<label class="control-label mb-10" for="tujuan">Data Rekap</label>
											<select class="form-control" name="tujuan" id="tujuan">
												<option></option>
												<option value="N1">N1</option>
												<option value="N2">N2</option>
												<option value="N3">N3</option>
											</select>
										<div class="form-group">
											<label class="control-label mb-10" for="bulan">Bulan Rekap</label>
											<select class="form-control" name="bulan" id="bulan">
												<option></option>
												<option value="1">Januari</option>
												<option value="2">Februari</option>
												<option value="3">Maret</option>
												<option value="4">April</option>
												<option value="5">Mei</option>
												<option value="6">Juni</option>
												<option value="7">Juli</option>
												<option value="8">Agustus</option>
												<option value="9">September</option>
												<option value="10">Oktober</option>
												<option value="11">November</option>
												<option value="12">Desember</option>
											</select>
										</div>
											<button type="submit" name="btn-submit">Submit</button>
										</div>
									</form>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="table-wrap">
										<div class="table-responsive">
											<table id="tabel_tamu" class="table table-hover display pb-30">
												<thead>
													<tr>
														<th>NIK</th>
														<th>Waktu</th>
														<th>Nama</th>
														<th>Tujuan</th>
														<th>Jumlah</th>
														<th>Status</th>
														<th>Keterangan</th>
														<th>Aksi</th>
													</tr>
												</thead>
												<tfoot>
													<tr>
														<th>NIK</th>
														<th>Waktu</th>
														<th>Nama</th>
														<th>Tujuan</th>
														<th>Jumlah</th>
														<th>Status</th>
														<th>Keterangan</th>
														<th>Aksi</th>
													</tr>
												</tfoot>
												<tbody id="tampil_data">
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<span class="weight-500 font-20 block text-center txt-primary">Jumlah Tamu</span>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div id="jum_tamu">
									</div>
									<div id="jum_keseluruhan">

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /Row -->
			</div>

			<!-- Footer -->
			<footer class="footer container-fluid pl-30 pr-30">
				<div class="row">
					<div class="col-sm-12">
						<p>2021 &copy; Pemerintah Kota Malang</p>
					</div>
				</div>
			</footer>
			<!-- /Footer -->

		</div>
		<!-- /Main Content -->

	</div>
	<!-- /#wrapper -->
	<div id="form-edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h5 class="modal-title">Edit Data Tamu</h5>
				</div>
				<div class="modal-body">
					<form>
						<input type="text" class="hidden" name="edit_idtamu" id="edit_idtamu">
						<div class="form-group">
							<label class="control-label mb-10" for="nik">NIK</label>
							<input type="text" class="form-control" name="edit_nik" id="edit_nik" placeholder="Masukkan NIK">
						</div>
						<div class="form-group">
							<label class="control-label mb-10" for="nama">Nama</label>
							<input type="text" class="form-control" name="edit_nama" id="edit_nama" placeholder="Masukkan Nama">
						</div>
						<div class="form-group">
							<label class="control-label mb-10" for="jenis_kelamin">Jenis Kelamin</label>
							<select class="form-control" name="edit_jeniskelamin" id="edit_jeniskelamin">
								<option value="Laki-laki">Laki-laki</option>
								<option value="Perempuan">Perempuan</option>
							</select>
						</div>
						<div class="form-group">
							<label class="control-label mb-10" for="alamat">Alamat</label>
							<input type="text" class="form-control" name="edit_alamat" id="edit_alamat" placeholder="Masukkan Alamat">
						</div>
						<div class="form-group">
							<label class="control-label mb-10" for="tujuan">Tujuan</label>
							<select class="form-control" name="edit_tujuan" id="edit_tujuan">
								<option value="N1">N1</option>
								<option value="N2">N2</option>
								<option value="N3">N3</option>
								<option value="Lainnya">Lainnya</option>
							</select>
						</div>
						<div class="form-group">
							<label class="control-label mb-10" for="keperluan">Keperluan</label>
							<input type="text" class="form-control" name="edit_keperluan" id="edit_keperluan" placeholder="Masukkan Keperluan">
						</div>
						<div class="form-group">
							<label class="control-label mb-10" for="jumlah">Jumlah Tamu</label>
							<input type="text" class="form-control" name="edit_jumlah" id="edit_jumlah" placeholder="Masukkan Jumlah Tamu">
						</div>
						<div class="form-group">
							<label class="control-label mb-10" for="status">Status</label>
							<select class="form-control" name="edit_status" id="edit_status">
								<option value="Reject">Reject</option>
								<option value="Accept">Accept</option>
								<option value="Finish">Finish</option>
							</select>
						</div>
						<div class="form-group">
							<label class="control-label mb-10" for="keterangan">Keterangan</label>
							<input type="text" class="form-control" name="edit_keterangan" id="edit_keterangan" placeholder="Masukkan Keterangan">
						</div>
						<div class="modal-footer">
							<button id="btn-ubah" type="button" class="btn btn-sm btn-primary">Ubah</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<div id="form-detail" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h5 class="modal-title">Detail Data Tamu</h5>
				</div>
				<div class="modal-body">
					<form>
						<input type="text" class="hidden" name="detail_idtamu" id="detail_idtamu" disabled>
						<div class="form-group">
							<label class="control-label mb-10" for="nik">Image</label>
							<div class="row text-center">
								<img id="imgg" src="" alt="" srcset="">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label mb-10" for="nik">NIK</label>
							<input type="text" class="form-control" name="detail_nik" id="detail_nik" placeholder="Masukkan NIK" disabled>
						</div>
						<div class="form-group">
							<label class="control-label mb-10" for="nama">Nama</label>
							<input type="text" class="form-control" name="detail_nama" id="detail_nama" placeholder="Masukkan Nama" disabled>
						</div>
						<div class="form-group">
							<label class="control-label mb-10" for="keperluan">Jenis Kelamin</label>
							<input type="text" class="form-control" name="detail_jeniskelamin" id="detail_jeniskelamin" disabled>
						</div>
						<div class="form-group">
							<label class="control-label mb-10" for="alamat">Alamat</label>
							<input type="text" class="form-control" name="detail_alamat" id="detail_alamat" placeholder="Masukkan Alamat" disabled>
						</div>
						<div class="form-group">
							<label class="control-label mb-10" for="keperluan">Tujuan</label>
							<input type="text" class="form-control" name="detail_tujuan" id="detail_tujuan" disabled>
						</div>
						<div class="form-group">
							<label class="control-label mb-10" for="keperluan">Keperluan</label>
							<input type="text" class="form-control" name="detail_keperluan" id="detail_keperluan" disabled>
						</div>
						<div class="form-group">
							<label class="control-label mb-10" for="jumlah">Jumlah Tamu</label>
							<input type="text" class="form-control" name="detail_jumlah" id="detail_jumlah" disabled>
						</div>
						<div class="form-group">
							<label class="control-label mb-10" for="status">Status</label>
							<input type="text" class="form-control" name="detail_status" id="detail_status" disabled>
						</div>
						<div class="form-group">
							<label class="control-label mb-10" for="keterangan">Keterangan</label>
							<input type="text" class="form-control" name="detail_keterangan" id="detail_keterangan" disabled>
						</div>
						<div class="modal-footer">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.js"></script>

	<!-- jQuery -->
	<script src="./assets/vendors/bower_components/jquery/dist/jquery.min.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="./assets/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="./assets/vendors/bower_components/bootstrap-validator/dist/validator.min.js"></script>

	<!-- Data table JavaScript -->
	<script src="./assets/vendors/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>

	<!-- Init JavaScript -->
	<script src="./assets/dist/js/init.js"></script>

	<!-- Slimscroll JavaScript -->
	<script src="./assets/dist/js/jquery.slimscroll.js"></script>

	<!-- Owl JavaScript -->
	<script src="./assets/vendors/bower_components/owl.carousel/dist/owl.carousel.min.js"></script>

	<!-- Switchery JavaScript -->
	<script src="./assets/vendors/bower_components/switchery/dist/switchery.min.js"></script>

	<!-- Sweet-Alert  -->
	<script src="./assets/vendors/bower_components/sweetalert/dist/sweetalert.min.js"></script>

	<!-- Fancy Dropdown JS -->
	<script src="./assets/dist/js/dropdown-bootstrap-extended.js"></script>

	<script type="text/javascript">
		$('#tambah').on('submit', function(event) {
			event.preventDefault();
			var image = '';
			var nik = $('#nik').val();
			var nama = $('#nama').val();
			var jenis_kelamin = $('#jenis_kelamin').find(":selected").text();
			var tujuan = $('#tujuan').find(":selected").text();

			console.log(tujuan);

			var tujuans = $('#tujuan').val();
			console.log(tujuans);

			var alamat = $('#alamat').val();
			var keperluan = $('#keperluan').val();
			var jumlah = $('#jumlah').val();
			var waktu = $('#waktu').val();
			var status = $('#status').val();
			var keterangan = $('#keterangan').val();
			Webcam.snap(function(data_uri) {
				image = data_uri;
			});

			if (nama != "", nik != "") {
				$.ajax({
					url: "<?php echo site_url("Sekpri/save"); ?>",
					type: "POST",
					data: {
						type: 1,
						nik: nik,
						nama: nama,
						alamat: alamat,
						tujuan: tujuan,
						jenis_kelamin: jenis_kelamin,
						keperluan: keperluan,
						jumlah: jumlah,
						waktu: waktu,
						status: status,
						keterangan: keterangan,
						image: image
					},
					cache: false,
					success: function(dataResult) {

						var dataResult = JSON.parse(dataResult);
						if (dataResult.statusCode == 200) {
							window.location.href = "<?php echo base_url(); ?>Beranda";
						} else if (dataResult.statusCode == 201) {
							alert("Error occured !");
						}

					}
				});
			} else {
				alert('Please fill all the field !');
			}
		});
	</script>
	<script>
		var id = 0;

		$(document).ready(function() {

			tampil_tamu()
			jumlah_tamu()
			date();

			$('#tabel_tamu').DataTable({
				"language": {
					"decimal": "",
					"emptyTable": "Data Tidak Tersedia",
					"info": "Tampilkan _START_ - _END_ dari _TOTAL_ Data",
					"infoEmpty": "Showing 0 to 0 of 0 entries",
					"infoFiltered": "(filter dari _MAX_ total data)",
					"infoPostFix": "",
					"thousands": ",",
					"lengthMenu": "Tampilkan _MENU_ Data",
					"loadingRecords": "Loading...",
					"processing": "Proses...",
					"search": "Cari:",
					"zeroRecords": "Data Tidak Tersedia",
					"paginate": {
						"first": "First",
						"last": "Last",
						"next": "Lanjut",
						"previous": "Kembali"
					},
					"aria": {
						"sortAscending": ": activate to sort column ascending",
						"sortDescending": ": activate to sort column descending"
					}
				}
			});

			function tampil_tamu() {
				$.ajax({
					type: 'ajax',
					url: 'sekpri/tampil_tamu',
					async: false,
					dataType: 'json',
					success: function(data) {
						var html = '';
						var no = 1;
						for (i = 0; i < data.length; i++) {
							html += '<tr id="' + data[i].id_tamu + '">' +
								'<td>' + data[i].nik + '</td>' +
								'<td>' + data[i].waktu + '</td>' +
								'<td>' + data[i].nama + '</td>' +
								'<td>' + data[i].tujuan + '</td>' +
								'<td>' + data[i].jumlah + '</td>' +
								'<td>' + data[i].status + '</td>' +
								'<td>' + data[i].keterangan + '</td>' +
								'<td>' +
								'<button class="btn btn-xs btn-success" style="padding-left: 10px;padding-right: 10px;" data-toggle="modal" data-target="#form-detail" id="btn-edit" data-id="' + data[i].id_tamu + '" data-waktu="' + data[i].waktu + '" data-nik="' + data[i].nik + '" data-nama="' + data[i].nama + '" data-jk="' + data[i].jenis_kelamin + '" data-alamat="' + data[i].alamat + '" data-tujuan="' + data[i].tujuan + '" data-keperluan="' + data[i].keperluan + '" data-jumlah="' + data[i].jumlah + '" data-image="' + data[i].foto + '" data-status="' + data[i].status + '" data-keterangan="' + data[i].keterangan + '" > Detail</button> ' +
								'<button class="btn btn-xs btn-primary" style="padding-left: 10px;padding-right: 10px;" data-toggle="modal" data-target="#form-edit" id="btn-edit" data-id="' + data[i].id_tamu + '" data-waktu="' + data[i].waktu + '" data-nik="' + data[i].nik + '" data-nama="' + data[i].nama + '" data-jk="' + data[i].jenis_kelamin + '" data-alamat="' + data[i].alamat + '" data-tujuan="' + data[i].tujuan + '" data-keperluan="' + data[i].keperluan + '" data-jumlah="' + data[i].jumlah + '" data-status="' + data[i].status + '" data-keterangan="' + data[i].keterangan + '"> <i class="fa fa-pencil"></i></button> ' +
								'</td>' +
								'</tr>'
							no++;
						}
						$('#tampil_data').html(html);
					}

				});
			}

			function jumlah_tamu() {
				$.ajax({
					type: 'ajax',
					url: 'sekpri/jumlah_tamu',
					// async: false,
					dataType: 'json',
					success: function(data) {
						var html1 = '';
						var html2 = '';
						var jum = 0;
						for (i = 0; i < data.length; i++) {
							html1 += '<span class="pull-left inline-block capitalize-font txt-dark"> ' + data[i].wkt + '</span>' +
								'<span class="label label-success pull-right" style="font-size:14px;">' + data[i].jumlah + '</span>' +
								'<div class="clearfix"></div>' +
								'<hr class="light-grey-hr row mt-10 mb-10" />';
						}
						$('#jum_tamu').html(html1);
						for (u = 0; u < data.length; u++) {
							jum += parseInt(data[u].jumlah);
						}
						html2 += '<span class="pull-left inline-block capitalize-font txt-dark">Jumlah</span>' +
							'<span class="label label-primary pull-right" style="font-size:14px;">' + jum + '</span>' +
							'<div class="clearfix"></div>';
						$('#jum_keseluruhan').html(html2);

					}

				});
			}

			function date() {
				$.ajax({
					type: 'ajax',
					url: 'sekpri/date',
					async: false,
					dataType: 'json',
					success: function(data) {
						$('#waktu').val(data);
						$('#edit_waktu').val(data);
					}
				});
			}

			// Semua data dibawah diambil dari line 457 dari data-
			$('#form-edit').on('show.bs.modal', function(event) {
				var button = $(event.relatedTarget);
				var id = button.data('id');
				var nik = button.data('nik');
				var nama = button.data('nama');
				var jk = button.data('jk');
				var tujuan = button.data('tujuan');
				var keperluan = button.data('keperluan');
				var alamat = button.data('alamat');
				var jumlah = button.data('jumlah');
				var status = button.data('status');
				var keterangan = button.data('keterangan');

				// mengisi semua form pada form edit dengan data diatas
				$('#edit_idtamu').val(id);
				$('#edit_nama').val(nama);
				$('#edit_nik').val(nik);
				$('#edit_jeniskelamin').val(jk);
				$('#edit_tujuan').val(tujuan);
				$('#edit_alamat').val(alamat);
				$('#edit_keperluan').val(keperluan);
				$('#edit_jumlah').val(jumlah);
				$('#edit_status').val(status);
				$('#edit_keterangan').val(keterangan);
			})

			// Semua data dibawah diambil dari line 457 dari data-
			$('#form-detail').on('show.bs.modal', function(event) {
				var button = $(event.relatedTarget);
				var id = button.data('id');
				var img = button.data('image');
				var nik = button.data('nik');
				var nama = button.data('nama');
				var jk = button.data('jk');
				var tujuan = button.data('tujuan');
				var keperluan = button.data('keperluan');
				var alamat = button.data('alamat');
				var jumlah = button.data('jumlah');
				var status = button.data('status');
				var keterangan = button.data('keterangan');

				console.log(img);
				// mengisi semua form pada form edit dengan data diatas
				$('#imgg').attr("src", "uploads/" + img);
				$('#detail_idtamu').val(id);
				$('#detail_nama').val(nama);
				$('#detail_nik').val(nik);
				$('#detail_jeniskelamin').val(jk);
				$('#detail_tujuan').val(tujuan);
				$('#detail_alamat').val(alamat);
				$('#detail_keperluan').val(keperluan);
				$('#detail_jumlah').val(jumlah);
				$('#detail_status').val(status);
				$('#detail_keterangan').val(keterangan);
			})

			$("#btn-ubah").click(function() {
				id = $('#edit_idtamu').val();

				$.ajax({
					url: 'sekpri/ubah/' + id, // URL tujuan
					type: 'POST', // Tentukan type nya POST atau GET
					data: $("#form-edit form").serialize(), // Ambil semua data yang ada didalam tag form
					dataType: 'json',
					beforeSend: function() {},
					success: function(response) { // Ketika proses pengiriman berhasil
						if (response.status == 'sukses') {
							// Tampilkan Tabel
							tampil_tamu()
							jumlah_tamu()
							// pesan sukses
							swal({
								title: "Sukses",
								type: "success",
								text: "Anda Telah Berhasil Mengedit Data",
								confirmButtonColor: "#469408"
							});

							$('#form-edit').modal('hide')
						} else {
							// Tampilkan Tabel
							tampil_tamu()
							jumlah_tamu()
							// pesan gagal
							swal({
								title: "Gagal",
								type: "error",
								text: "Data Yang Di Edit Harus Valid",
								showConfirmButton: false,
								timer: 1500
							});

							$('#form-edit').modal('hide')
						}
					}
				})
			});

			$('#form-tambah').on('hidden.bs.modal', function(e) { // Ketika Modal Dialog di Close / tertutup
				$('#form-tambah #nama, #form-tambah #alamat, #form-tambah #nominal').val('') // Clear inputan menjadi kosong
			})
		})
	</script>

</body>



</html>