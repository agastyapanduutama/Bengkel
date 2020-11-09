<?php
include_once 'header.php';

include "includes/server.php";
if($_POST){
	// ini_set('memory_limit', '-1');
	include_once 'includes/sparepart.inc.php';
	$eks = new Sparepart($db);

	$sparepart = $_POST['sparepart'];
	$merk = $_POST['merk'];
	$kode = $_POST['kode'];
	$stock = $_POST['stock'];
	$harga = $_POST['harga'];

    $ceks = array();
	$sql = "SELECT * FROM sparepart WHERE kode = '$kode' ";
	// echo $sql;
    $query = mysqli_query($sqlconn, $sql);
    $total = mysqli_num_rows($query);
    // echo $total;
    while ($cek = mysqli_fetch_array($query)) {
    	$ceks[] = $cek;
    }

    	// print_r($ceks);

	    if ($total > 0) {
	    	echo "Data Sudah ada";
	    }else{
		    $queryNa = "INSERT INTO sparepart (`sparepart`, `stock`, `harga`, `merk`, `kode`) VALUES ('$sparepart', '$stock', '$harga', '$merk', '$kode')";
	    	// echo $queryNa;
	    	$insert = mysqli_query($sqlconn, $queryNa);
	    	header('Location: sparepart.php');
	    	
	    }

	}
	
	else{
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
			  <li><a href="nilai.php"><span class="fa fa-cogs"></span> Sparepart</a></li>
			  <li class="active"><span class="fa fa-clone"></span> Tambah Data</li>
			</ol>
		  	<p style="margin-bottom:10px;">
		  		<strong style="font-size:18pt;"><span class="fa fa-cogs"></span> Tambah Data Sparepart</strong>
		  	</p>
		  	<div class="panel panel-default">
		<div class="panel-body">
			
			    <form method="post">
				  <div class="form-group">
				    <label for="sparepart">Kode Sparepart</label>
				    <input type="text" class="form-control" id="kode" name="kode" required>
				  </div>
				  <div class="form-group">
				    <label for="sparepart">Nama Sparepart</label>
				    <input type="text" class="form-control" id="sparepart" name="sparepart" required>
				  </div>
				<div class="form-group">
				    <label for="stock">Stok</label>
				    <input type="text" class="form-control" id="stock" name="stock" required>
				  </div>
				  <div class="form-group">
				    <label for="sparepart">Merk</label>
				    <input type="text" class="form-control" id="merk" name="merk" required>
				  </div>
				<div class="form-group">
				    <label for="harga">Harga</label>
				    <input type="text" class="form-control" id="harga" name="harga" required>
				  </div>
				  </div>
				  <button type="submit" class="btn btn-primary"><span class="fa fa-save"></span> Simpan</button>
				</form>
				</div>
				</div>
			  
		  </div>
		</div>
		<?php
include_once 'footer.php';
?>