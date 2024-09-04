<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$db_host = '127.0.0.1:8080'; // Nama Server
$db_user = 'root'; // User Server
$db_pass = ''; // Password Server
$db_name = 'db_tamu'; // Nama Database

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
	die ('Gagal terhubung dengan MySQL: ' . mysqli_connect_error());	
}
if (isset($_POST['btn-submit'])) {
    $month = $_POST['bulan'];
}
if ($month != null) {
	$sql = "SELECT * FROM `tb_tamu` WHERE month(waktu) = '$month' order by month(waktu) desc";
}

$query = mysqli_query($conn, $sql);

if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $title_pdf;?></title>
        <style>
            #table {
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            #table td, #table th {
                border: 1px solid #ddd;
                padding: 3px;
            }

            #table tr:nth-child(even){background-color: #f2f2f2;}

            #table tr:hover {background-color: #ddd;}

            #table th {
                padding-top: 10px;
                padding-bottom: 10px;
                text-align: left;
                background-color: #426699;
                color: white;
            }
        </style>
    </head>
    <body>
        <div style="text-align:center">
            <h3>Data Rekap Tamu Sekpri</h3>
        </div>
        <table id="table">
            <thead>
                <tr>
                    <th>Waktu</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Tujuan</th>
                    <th>Keperluan</th>
                    <th>Jumlah</th>
                    <th>Status</th>
                    <th>Keterangan</th>
                    <th>Tamu</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while ($row = mysqli_fetch_array($query))
                    {
                        echo 
                        '<tr>
                                <td>'.$row['waktu'].'</td>
                                <td>'.$row['nik'].'</td>
                                <td>'.$row['nama'].'</td>
                                <td>'.$row['alamat'].'</td>
                                <td>'.$row['tujuan'].'</td>
                                <td>'.$row['keperluan'].'</td>
                                <td>'.$row['jumlah'].'</td>
                                <td>'.$row['status'].'</td>
                                <td>'.$row['keterangan'].'</td>
                                <td>'.$row['tamu'].'</td>
                        </tr>';
                    }?>
            </tbody>
        </table>
    </body>
</html>