<?php
session_start();
if(!isset($_SESSION['nama_pengguna'])){
	echo "<script>location.href='login.php'</script>";
}
?>
<!--sekarang Tinggal Codeing seperti biasanya. HTML, CSS, PHP tidak masalah.-->
<!--CONTOH Code START-->
<?php
 //KONEKSI
$host="localhost"; //isi dengan host anda. contoh "localhost"
$user="pandu"; //isi dengan username mysql anda. contoh "root"
$password="root"; //isi dengan password mysql anda. jika tidak ada, biarkan kosong.
$database="berkahmandiri";//isi nama database dengan tepat.
mysql_connect($host,$user,$password);
mysql_select_db($database);
?>

<style type="text/css">
p{
	text-align:right;
	font-style:bold;
	font-size:12px
}
h4, h1, h5, h2{
	text-align:center;
	padding-top:inherit;
	
}
table {
   border-collapse:collapse;
   width:100%;
}
 
table, td, th {
   border:1px solid black;
}
 
tbody tr:nth-child(odd) {
   background-color: #ccc;
}
</style>
<body onclick="window.print()">
<h2>BERKAH MANDIRI</h2>
<h5>Jl, Cipeundeuy Bandung Barat  (0232)8880558</h5>
<hr>

</tr>
</table>
<h4>LAPORAN SERVICE</h4>
<p align="left">Nama Kasir: <?php echo $_SESSION['nama_pengguna'] ?></p>
<p align="left">Tanggal: <?php date_default_timezone_set("Asia/Jakarta"); echo $date = date('Y-m-d |  H:i:s'); ?> </p>

<table >
<thead>
<tr>
<th>id_pembelian</th>
<th>Nama Mekanik</td>
<th>Nama Pelanggan</td>
<th>Sparepart</td>
<th>Qty</td>
<!-- <th>Harga Sparepart</td> -->
<!-- <th>Harga Jasa</td> -->
<th>Jumlah</td>
<th>Tanggal</td>


</tr>
</thead>
<?php 
$sql=mysql_query("SELECT * FROM pembelian JOIN mekanik ON pembelian.id_mekanik=mekanik.id_mekanik JOIN sparepart ON pembelian.id_sparepart=sparepart.id_sparepart ORDER BY id_pembelian ASC");
while($data=mysql_fetch_assoc($sql)){
?>
<tbody><tr>
<td><?php echo $data['id_pembelian']?></td>
<td><?php echo $data['nama_mekanik']?></td>
<td><?php echo $data['nama_pelanggan']?></td>
<td><?php echo $data['sparepart']?></td>
<td><?php echo $data['qty']?></td>
<!-- <td><?php echo $data['harga']?></td> -->
<!-- <td><?php echo $data['harga_jasa']?></td> -->
<td>
<?php 
	$hs=  $data['harga'];
	$qt= $data['qty'];
	$hj= $data['harga_jasa'];
	$tot = ($hs * $qt) + $hj;
	echo"Rp. $tot";

			
			?>
</td>
<td><?php echo $data['tgl_beli']?></td>
</tr></tbody>
<?php
}
?>
</table>
</body>