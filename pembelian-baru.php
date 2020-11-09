<?php
include_once 'header.php';

include "includes/server.php";
if($_POST){
	
	include_once 'includes/pembelian.inc.php';
	$eks = new Pembelian($db);
	
	$id_mekanik = $_POST['id_mekanik'];
	$id_sparepart = $_POST['id_sparepart'];
	$qty = $_POST['qty'];
	$harga_jasa = $_POST['harga_jasa'];
	$tgl_beli = $_POST['tgl_beli'];
	$nama_pelanggan = $_POST['nama_pelanggan'];
	


    $ceks = array();
	$sql = "SELECT * FROM sparepart WHERE id_sparepart = '$id_sparepart' ";
	// echo "$sql";
    $query = mysqli_query($sqlconn, $sql);
    $total = mysqli_num_rows($query);
    while ($cek = mysqli_fetch_array($query)) {
    	 // echo "<br>";
    	 $ceks[] = $cek['stock'];
    	 // echo "<br>";

	    if ($qty > $ceks[0]) {
	    	echo "Kuantitas Melebihi Kapasitas Lebih";
	    }else{
	    	$queryNa = "INSERT INTO `pembelian` (`id_mekanik`, `id_sparepart`, `qty`, `harga_jasa`, `tgl_beli`,`nama_pelanggan`) VALUES ('$id_mekanik', '$id_sparepart', '$qty', '$harga_jasa', '$tgl_beli', '$nama_pelanggan');";
	    	// echo $queryNa;
	    	$insert = mysqli_query($sqlconn, $queryNa);
	    	header('Location: pembelian.php');
	    }

    }

    // echo $ceks[0];

	
	// if($eks->insert()){
?>
<script type="text/javascript">
window.onload=function(){
	showStickySuccessToast();
};
</script>
<?php
	// }
	
	// else{
?>
<script type="text/javascript">
window.onload=function(){
	showStickyErrorToast();
};
</script>
<?php
	// }
}
?>
	
	

		<div class="row">
		  <div class="col-xs-12 col-sm-12 col-md-2">
		  <?php
			include_once 'sidebar.php';
			?>
		  </div>
		  <div class="col-xs-12 col-sm-12 col-md-10">
		  <ol class="breadcrumb">
			  <li><a href="index.php"><span class="fa fa-home"></span> Beranda</a></li>
			  <li><a href="nilai.php"><span class="fa fa-wrench"></span> Data Service</a></li>
			  <li class="active"><span class="fa fa-clone"></span> Tambah Data</li>
			</ol>
		  	<p style="margin-bottom:10px;">
		  		<strong style="font-size:18pt;"><span class="fa fa-wrench"></span> Tambah Data Service</strong>
		  	</p>
		  	<div class="panel panel-default">
		<div class="panel-body">
			
			    <form method="post">
				   <div class="form-group">
				    <label for="nama_mekanik">Nama Mekanik</label>
				    <select class="form-control" id="id_mekanik" name="id_mekanik">
					<?php
					$conn = mysql_connect("localhost","root","");
					mysql_select_db("berkahmandiri",$conn); 
					$result = mysql_query("SELECT * FROM mekanik");
					?>
					<?php
					$i=0;
					while($row = mysql_fetch_array($result)) {
					?>
					<option value="<?=$row["id_mekanik"];?>"><?=$row["nama_mekanik"];?></option>
					<?php
					$i++;
					}
					?>
					</select>
				  </div>
				
				  <div class="form-group">
				    <label for="id_sparepart">Sparepart</label>
				    <select class="form-control" id="id_sparepart" name="id_sparepart">
					<?php
					$conn = mysql_connect("localhost","root","");
					mysql_select_db("berkahmandiri",$conn); 
					$result = mysql_query("SELECT * FROM sparepart where stock > 0 ");
					?>
					<?php
					$i=0;
					while($row = mysql_fetch_array($result)) {
					?>
					<option value="<?=$row["id_sparepart"];?>"><?=$row["kode"];?> - <?=$row["sparepart"];?> - <?=$row["merk"];?> (<?=$row["stock"];?>)</option>
					<?php
					$i++;
					}
					?>
					</select>
				  </div>
				  <div class="form-group">
				    <label for="qty">Banyaknya (qty)</label>
				    <input type="text" class="form-control" id="qty" name="qty"  required >
				  </div>
				  <div class="form-group">
				    <label for="tgl_beli">Tanggal Service</label>
				    <input type="text" class="form-control" id="dtgl_beli" name="tgl_beli" value="<?php echo $date = date('Y-m-d'); ?>" required >
				  </div>
				 
				   <div class="form-group">
				    <label for="harga_jasa">Harga Jasa</label>
				    <input type="text" class="form-control" id="harga_jasa" name="harga_jasa" required>
				  </div>
				  
				   <div class="form-group">
				    <label for="nama_pelanggan">Nama Pelanggan</label>
				    <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" required>
				  </div>
				  
				  <button type="submit" class="btn btn-primary"><span class="fa fa-save"></span> Simpan</button>
				  <button type="button" onclick="location.href='pembelian.php'" class="btn btn-success"><span class="fa fa-history"></span> Kembali</button>
				</form>
				</div>
				</div>
			  
		  </div>
		</div>

		
		
		<?php
include_once 'footer.php';
?>