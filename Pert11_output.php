<?php
include("Pert11_koneksi.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Buku Tamu</title>
</head>
<body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="Pert11_input.php">Beranda</a></li>
                    <li class="active"><a href="Pert11_output.php">Data Buku Tamu</a></li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="container" style="margin-top: 50px">
        <h1>Data Buku Tamu!</h1>
        <hr />
        <?php
		//menampilkan data buku tamu
		$res = $koneksi->query("SELECT * FROM tamu ORDER BY id DESC") or die($koneksi->error);
		
		if($res->num_rows){
			while($row = $res->fetch_assoc()){
				echo '
				<table class="table table-condensed table-striped">
                    <tr>
                        <th width="150">TANGGAL TULIS</th>
                        <th width="10">:</th>
                        <td>'.$row['tanggal'].'</td>
                    </tr>
                    <tr>
                        <th width="150">ID</th>
                        <th width="10">:</th>
                        <td>'.$row['id'].'</td>
                    </tr>
                    <tr>
                        <th width="150">NAMA LENGKAP</th>
                        <th width="10">:</th>
                        <td>'.$row['nama'].'</td>
                    </tr>
					<tr>
						<th>EMAIL</th>
						<th>:</th>
						<td>'.$row['email'].'</td>
					</tr>
                    <tr>
                        <th>ALAMAT</th>
                        <th>:</th>
                        <td>'.$row['alamat'].'</td>
                    </tr>
					<tr>
						<th>ISI PESAN</th>
						<th>:</th>
						<td>'.$row['pesan'].'</td>
					</tr>
				</table>
				';
			}
		}else{
			echo 'Belum ada data buku tamu';
		}
		
		?>
    </div>    
</body>
</html>