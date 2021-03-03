<html>
<head>
<title>contoh Penggunaan IF</title>
</head>
<body>
<form method="POST">
 Besar Pembelian :
<input type=text name=total_beli><br><br>
<input type=submit value="Tentukan Diskon">

<?php
  @$total_beli= $_POST['total_beli'];
  if (isset($total_beli))
  {
  $total_beli=intval($total_beli);
  $diskon=0; 
  if($total_beli>=200000)
  $diskon=0.1;
  else if ($total_beli>=100000)
  $diskon= 0.05;
  else
  $diskon=0.01;

  $diskon=$diskon * intval($total_beli);
  printf ("<br>Jumlah Bayar = Rp. $total_beli");
  printf ("<br>Diskon = Rp. $diskon");
  $jumlahbayar=$total_beli-$diskon;
  printf ("<br>Total Bayar = Rp. $jumlahbayar");
 }
?>
</form>
</body>
</html> 