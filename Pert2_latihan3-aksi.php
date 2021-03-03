<?php
$satu=$_POST['satu'];
$dua=$_POST['dua'];
$operator=$_POST['operator'];
$tambah=$satu+$dua;
$kurang=$satu-$dua;
$kali=$satu*$dua;
$bagi=$satu/$dua;
if (empty($satu or $dua))
{
echo "Harap Masukan Angka..!";
}
else if ($operator=="+")
{
echo "Hasilnya Adalah $tambah";
}
else if ($operator=="-")
{
echo "Hasilnya Adalah $kurang";
}
else if ($operator=="*")
{
echo "Hasilnya Adalah $kali";
}
else if ($operator=="/")
{
echo "Hasilnya Adalah $bagi";
}
?>