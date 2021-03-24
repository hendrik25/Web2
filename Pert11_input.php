<?php
include("Pert11_koneksi.php");
?>
<!DOCTYPE html>
<html>
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
    <center>
        <h2>Tulis Buku Tamu!</h2>        
        <form method="post" action="Pert11_input.php">
        <table border="0" align="center"  >
            <tr>
                <td>ID</td>
                <td><input type="text" name="id" class="form-control" placeholder="" required></td>
            </tr>
            <tr>
                <td>NAMA</td>
                <td><input type="text" name="nama" class="form-control" placeholder="" required></td>
            </tr>
            <tr>
                <td>EMAIL</td>
                <td><input type="email" name="email" class="form-control" placeholder=""></td>
            </tr>
            <tr>
                <td>ALAMAT</td>
                <td><textarea name="alamat" class="form-control" placeholder="" required></textarea></td>
            </tr>
            <tr>
                <td>PESAN</td>
                <td><textarea name="pesan" class="form-control" placeholder="" required></textarea></td>
            </tr>
            <tr><td><input type="submit" name="submit" class="btn btn-primary" value="KIRIM PESAN"></td></tr>
        </table>
        </form>
    </center>
        
        <?php
        //definisikan variabel untuk tiap-tiap inputan
        if (isset($_POST['nama'])){ 
                //$nama=$_POST['nama'];                
        $id         = $_POST["id"];
        $nama       = $_POST["nama"];
        $email      = $_POST["email"];
        $alamat     = $_POST["alamat"];
        $pesan      = $_POST["pesan"];
        $tanggal    = date('Y-m-d');        
        //jika di klik tombol kirim pesan menjalankan script di bawah ini
        if($_POST['submit']){
            $input = $koneksi->query("INSERT INTO tamu(tanggal,id,nama,email,alamat,pesan) VALUES('$tanggal','$id','$nama',
                '$email','$alamat','$pesan')") or die($koneksi->error);
            if($input){
                echo '<div class="alert alert-success">Pesan anda berhasil di simpan!</div>';
            }else{
                echo '<div class="alert alert-warning">Gagal menyimpan pesan!</div>';
            }
        }
        }
        ?>
		
		<hr />
		<h2>5 Buku tamu terakhir</h2>
		
		<?php
		//menampilkan 5 buku tamu terbaru
		$res = $koneksi->query("SELECT * FROM tamu ORDER BY id DESC LIMIT 5") or die($koneksi->error);
		
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
		<p><a class="btn btn-primary btn-sm" href="Pert11_output.php">Lihat semua data</a></p>   
</body>
</html>