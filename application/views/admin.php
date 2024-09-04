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
	<title>Admin | Sibuk</title>
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
							<span class="brand-text">Sibuk</span>
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
									<span class="weight-500 font-20 txt-primary ml-25"><i class="fa fa-users"></i> Daftar Admin</span>
									<button data-toggle="modal" data-target="#form-tambah" class="btn btn-primary btn-sm pull-right" id="btn-tambah" style="padding-right: 8px;padding-left: 8px; margin-right: 10px;">Tambah Admin</button>
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
														<th>No.</th>
														<th>Nama</th>
														<th>Username</th>
														<th>Password</th>
														<th>No. Handphone</th>
														<th>Bidang</th>
														<th>Level</th>												
														<th>Aksi</th>
													</tr>
												</thead>
												<tfoot>
													<tr>
														<th>No.</th>
														<th>Nama</th>
														<th>Username</th>
														<th>Password</th>
														<th>No. Handphone</th>
														<th>Bidang</th>
														<th>Level</th>													
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
	<div id="form-tambah" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h5 class="modal-title">Masukkan Data Admin</h5>
				</div>
				<div class="modal-body">

					<div id="result_admin">

					</div>
					<form id="tambah">
						<div class="form-group">
							<label class="control-label mb-10" for="nama">Nama</label>
							<input type="text" class="form-control" name="input_nama" id="nama" placeholder="Masukkan Nama">
						</div>
						<div class="form-group">
							<label class="control-label mb-10" for="username">Username</label>
							<input type="text" class="form-control" name="input_username" id="username" placeholder="Masukkan Username">
						</div>
						<div class="form-group">
							<label class="control-label mb-10" for="password">Password</label>
							<input type="text" class="form-control" name="input_password" id="password" placeholder="Masukkan Password">
						</div>
						<div class="form-group">
							<label class="control-label mb-10" for="nohp">No. Handphone</label>
							<input type="text" class="form-control" name="input_nohp" id="nohp" placeholder="Masukkan Nomer Handphone">
						</div>
						<div class="form-group">
							<label class="control-label mb-10" for="bidang">Bidang</label>
							<select class="form-control" name="input_bidang" id="bidang">
								<option value="Super Admin">Super Admin</option>
								<option value="Resepsionis">Resepsionis</option>
								<option value="N1">N1</option>
								<option value="N2">N2</option>
								<option value="N3">N3</option>
								<option value="SatpolPP">Satpol PP</option>
							</select>
						</div>
						<div class="form-group">
							<label class="control-label mb-10" for="level">Level</label>
							<select class="form-control" name="input_level" id="level">
								<option value="0">0</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
							</select>
						</div>
						<div class="modal-footer">
							<button id="btn-simpan" type="submit" class="btn btn-sm btn-primary ">Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<div id="form-edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h5 class="modal-title">Edit Data Admin</h5>
				</div>
				<div class="modal-body">
					<form>
						<input type="text" class="hidden" name="edit_users" id="edit_users">
						<div class="form-group">
							<label class="control-label mb-10" for="nama">Nama</label>
							<input type="text" class="form-control" name="edit_nama" id="edit_nama" placeholder="Masukkan Nama">
						</div>
						<div class="form-group">
							<label class="control-label mb-10" for="username">Username</label>
							<input type="text" class="form-control" name="edit_username" id="edit_username" placeholder="Masukkan Username">
						</div>
						<div class="form-group">
							<label class="control-label mb-10" for="password">Password</label>
							<input type="text" class="form-control" name="edit_password" id="edit_password" placeholder="Masukkan Password">
						</div>
						<div class="form-group">
							<label class="control-label mb-10" for="nohp">No. Handphone</label>
							<input type="text" class="form-control" name="edit_nohp" id="edit_nohp" placeholder="Masukkan Nomer Handphone">
						</div>
						<div class="form-group">
							<label class="control-label mb-10" for="bidang">Bidang</label>
							<select class="form-control" name="edit_bidang" id="edit_bidang">
								<option value="Super Admin">Super Admin</option>
								<option value="Resepsionis">Resepsionis</option>
								<option value="N1">N1</option>
								<option value="N2">N2</option>
								<option value="N3">N3</option>
								<option value="SatpolPP">Satpol PP</option>
							</select>
						</div>
						<div class="form-group">
							<label class="control-label mb-10" for="level">Level</label>
							<select class="form-control" name="edit_level" id="edit_level">
								<option value="0">0</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
							</select>
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
					<h5 class="modal-title">Detail Data Admin</h5>
				</div>
				<div class="modal-body">
					<form>
						<input type="text" class="hidden" name="detail_users" id="detail_users" disabled>
						<div class="form-group">
							<label class="control-label mb-10" for="nama">Nama</label>
							<input type="text" class="form-control" name="detail_nama" id="detail_nama" placeholder="Masukkan Nama" disabled>
						</div>
						<div class="form-group">
							<label class="control-label mb-10" for="username">Username</label>
							<input type="text" class="form-control" name="detail_username" id="detail_username" placeholder="Masukkan Username" disabled>
						</div>
						<div class="form-group">
							<label class="control-label mb-10" for="password">Password</label>
							<input type="text" class="form-control" name="detail_password" id="detail_password" disabled>
						</div>
						<div class="form-group">
							<label class="control-label mb-10" for="nohp">No Handphone</label>
							<input type="text" class="form-control" name="detail_nohp" id="detail_nohp" placeholder="Masukkan Nomer Handphone" disabled>
						</div>
						<div class="form-group">
							<label class="control-label mb-10" for="bidang">Bidang</label>
							<input type="text" class="form-control" name="detail_bidang" id="detail_bidang" disabled>
						</div>
						<div class="form-group">
							<label class="control-label mb-10" for="level">Level</label>
							<input type="text" class="form-control" name="detail_level" id="detail_level" disabled>
						</div>
						<div class="modal-footer">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>


	<div id="form-hapus" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h5 class="modal-title">Hapus Data</h5>
				</div>
				<div class="modal-body">
					<p class="text-center">Apakah Anda Yakin Ingin Menghapus Data Ini?</p>
					<form>
						<input type="text" class="hidden" name="hapus_users" id="hapus_users">
					</form>
				</div>
				<div class="modal-footer">
					<button id="btn-hapus" type="button" class="btn btn-sm btn-danger">Hapus</button>
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
			var nama = $('#nama').val();
			var username = $('#username').val();
			var password = $('#password').val();
			var nohp = $('#nohp').val();
			var bidang = $('#bidang').find(":selected").text();
			var level = $('#level').find(":selected").text();

			console.log(level);
		
			var levels = $('#level').val();
			console.log(levels);

			if (nama != "", username != "") {
				$.ajax({
					url: "<?php echo site_url("Admin/save"); ?>",
					type: "POST",
					data: {
						type: 1, 
						nama: nama,
						username: username,
						password: password,
						nohp: nohp,
						bidang: bidang,
						level: level
					},
					cache: false,
					success: function(dataResult) {

						var dataResult = JSON.parse(dataResult);
						if (dataResult.statusCode == 200) {
							window.location.href = "<?php echo base_url(); ?>Admin";
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

			tampil_admin()
			jumlah_admin()
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

			function tampil_admin() {
				$.ajax({
					type: 'ajax',
					url: 'admin/tampil_admin',
					async: false,
					dataType: 'json',
					success: function(data) {
						var html = '';
						var no = 1;
						for (i = 0; i < data.length; i++) {
							html += '<tr users="' + data[i].users + '">' +
								'<td>' + no + '</td>' +
								'<td>' + data[i].nama + '</td>' +
								'<td>' + data[i].username + '</td>' +
								'<td>' + data[i].password + '</td>' +
								'<td>' + data[i].nohp + '</td>' +
								'<td>' + data[i].bidang + '</td>' +
								'<td>' + data[i].level + '</td>' +
								'<td>' +
								'<button class="btn btn-xs btn-success" style="padding-left: 10px;padding-right: 10px;" data-toggle="modal" data-target="#form-detail" id="btn-edit" data-id="' + data[i].users + '" data-nama="' + data[i].nama + '" data-username="' + data[i].username + '" data-password="' + data[i].password + '" data-nohp="' + data[i].nohp + '" data-bidang="' + data[i].bidang + '" data-level="' + data[i].level + '" > Detail</button> ' +
								'<button class="btn btn-xs btn-primary" style="padding-left: 10px;padding-right: 10px;" data-toggle="modal" data-target="#form-edit" id="btn-edit" data-users="' + data[i].users + '" data-nama="' + data[i].nama + '" data-username="' + data[i].username + '" data-password="' + data[i].password + '" data-nohp="' + data[i].nohp + '" data-bidang="' + data[i].bidang + '" data-level="' + data[i].level + '"> <i class="fa fa-pencil"></i></button> ' +
								'<button class="btn btn-xs btn-danger" style="padding-left: 10px;padding-right: 10px;" data-toggle="modal" data-target="#form-hapus" data-users="' + data[i].users + '"> <i class="fa fa-trash"></i> </button>' +
								'</td>' +
								'</tr>'
							no++;
						}
						$('#tampil_data').html(html);
					}

				});
			}

			function jumlah_admin() {
				$.ajax({
					type: 'ajax',
					url: 'admin/jumlah_admin',
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
						$('#jum_admin').html(html1);
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
					url: 'admin/date',
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
				var users = button.data('users');
				var nama = button.data('nama');
				var username = button.data('username');
				var password = button.data('password');
				var nohp = button.data('nohp');
				var bidang = button.data('bidang');
				var level = button.data('level');

				// mengisi semua form pada form edit dengan data diatas
				$('#edit_users').val(users);
				$('#edit_nama').val(nama);
				$('#edit_username').val(username);
				$('#edit_password').val(password);
				$('#edit_nohp').val(nohp);
				$('#edit_bidang').val(bidang);
				$('#edit_level').val(level);
			})

			// Semua data dibawah diambil dari line 457 dari data-
			$('#form-detail').on('show.bs.modal', function(event) {
				var button = $(event.relatedTarget);
				var users = button.data('users');
				var nama = button.data('nama');
				var username = button.data('username');
				var password = button.data('password');
				var nohp = button.data('nohp');
				var bidang = button.data('bidang');
				var level = button.data('level');

				console.log(nama);
				// mengisi semua form pada form edit dengan data diatas
				$('#detail_users').val(users);
				$('#detail_nama').val(nama);
				$('#detail_username').val(username);
				$('#detail_password').val(password);
				$('#detail_nohp').val(nohp);
				$('#detail_bidang').val(bidang);
				$('#detail_level').val(level);
			})

			$('#form-hapus').on('show.bs.modal', function(event) {
				var button = $(event.relatedTarget);
				var users = button.data('users');
				$('#hapus_users').val(users);
			})

			$('#btn-tambah').click(function() {
				var arg = {
					resultFunction: function(result) {
						var array_admin = result.code;
						console.log(array_admin);
						$('#input_nama').val("asdads");
						// document.getElementById("input_nama").innerHTML = array_tamu[0];
						// document.getElementById("input_jeniskelamin").innerHTML = array_tamu[1];
						// document.getElementById("input_alamat").innerHTML = array_tamu[2];
						// document.getElementById("input_nominal").innerHTML = array_tamu[3];
						// document.getElementById("result_tamu").innerHTML = array_tamu;
					}
				};
			})

			$('#btn-hapus').click(function() {
				users = $('#hapus_users').val();
				console.log(users);
				$.ajax({
					url: 'admin/hapus/' + users, // URL tujuan
					dataType: 'json',
					beforeSend: function() {},
					success: function(response) { // Ketika proses pengiriman berhasil
						if (response.status == 'sukses') {
							// Tampilkan Tabel
							tampil_admin()
							jumlah_admin()
							// pesan sukses
							swal({
								title: "Sukses",
								type: "success",
								text: "Anda Telah Berhasil Menghapus Data Ini",
								confirmButtonColor: "#469408"
							});

							$('#form-hapus').modal('hide')
						} else {
							// Tampilkan Tabel
							tampil_admin()
							jumlah_admin()
							// pesan gagal
							swal({
								title: "Gagal",
								type: "error",
								text: "Data Ini Gagal Di Hapus",
								showConfirmButton: false,
								timer: 1500
							});

							$('#form-hapus').modal('hide')
						}
					}
				})
			})

			$("#btn-ubah").click(function() {
				id = $('#edit_users').val();

				$.ajax({
					url: 'admin/ubah/' + id, // URL tujuan
					type: 'POST', // Tentukan type nya POST atau GET
					data: $("#form-edit form").serialize(), // Ambil semua data yang ada didalam tag form
					dataType: 'json',
					beforeSend: function() {},
					success: function(response) { // Ketika proses pengiriman berhasil
						if (response.status == 'sukses') {
							// Tampilkan Tabel
							tampil_admin()
							jumlah_admin()
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
							tampil_admin()
							jumlah_admin()
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