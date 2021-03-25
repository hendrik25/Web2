<?php
include ("Pert13_koneksi.php");
$con = mysqli_connect("localhost", "root", "", "artikel_db");
$perintah="SELECT * FROM articles ORDER BY id DESC";
$hasil=mysqli_query($con,$perintah);
echo("<h2>List Artikel</h2><br><UL>");

while ($row=mysqli_fetch_array($hasil))
{
	echo("<LI>$row[0] &nbsp <br>
		$row[1] &nbsp <br>
		$row[2] &nbsp <br>
		$row[waktu] &nbsp <br>
		<a href=\"Pert13_edit.php?id=$row[0]\">Edit</a>&nbsp;
		<a href=\"Pert13_delete.php?id=$row[0]\">Hapus</a></LI><br>");
}
echo("</table>");
echo "<br><a href=\"add_article.php\">Tambah</a>";
echo "<br><a href=\"adminpanel.php\">Admin Panel</a>";
?>