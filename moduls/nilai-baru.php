<?php
include_once 'lib/nilai.inc.php';
$eks = new Nilai($db);
?>
<?php
$get = $_GET['get'];
if (empty($get)) {
if($_POST){
	$eks->nuptk = $_POST['nuptk'];
	$eks->nama = $_POST['nama'];
	$eks->absen = $_POST['absen'];
	$eks->komptensi = $_POST['komptensi'];
	$eks->pendidikan = $_POST['pendidikan'];
	$eks->kinerja = $_POST['kinerja'];
	if($eks->insert()){
?>
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Berhasil Tambah Data!</strong> Tambah lagi atau <a style="color: #fff;" href="?page=nilai">lihat semua data</a>.
</div>
<?php
	}

	else{
?>
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Gagal Tambah Data!</strong> Terjadi kesalahan, coba sekali lagi.
</div>
<?php
	}
}
?>
<div class="container">
		<div class="row">
		  <div class="col-xs-12 col-sm-8 col-md-8">
		  <div class="well">
		  	<div class="page-header">
			  <h3>Tambah Nilai Preferensi</h3>
			</div>

			<form method="post">
                <div class="form-group">
				    <label for="kt">NUPTK</label>
					<small>nuptk diketik jangan di copy paste</small>
					<input type="number" class="form-control" name="nuptk" id="nuptk" onkeyup="isi_otomatis(this.value)" >

				  </div>
				  <div class="form-group">
				    <label for="kt">Nama Guru</label>
				    <input type="text" class="form-control" id="nama" name="nama" required>
				  </div>
                  <div class="form-group">
				    <label for="kt">Absensi</label>
				    <input type="text" class="form-control" id="absen" name="absen" required>
				  </div>
                  <div class="form-group">
				    <label for="kt">Kompetensi</label>
				    <input type="text" class="form-control" id="komptensi" name="komptensi" required>
				  </div>
                  <div class="form-group">
				    <label for="kt">Pendidikan</label>
				    <input type="text" class="form-control" id="pendidikan" name="pendidikan" required>
				  </div>
                  <div class="form-group">
				    <label for="kt">Kinerja</label>
				    <input type="text" class="form-control" id="kinerja" name="kinerja" required>
				  </div>
				  <button type="submit" class="btn btn-primary">Simpan</button>
				  <button type="button" onclick="location.href='?page=nilai'" class="btn btn-success">Kembali</button>
				</form>

		  </div>
		  </div>
		  <?php
}elseif ($get == "edit") {
	$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');
	$eks->nuptk = $id;
	$eks->readOne();
?>
<div class="container">
		<div class="row">
		  <div class="col-xs-12 col-sm-8 col-md-8">
		  <div class="well">
		  	<div class="page-header">
			  <h3>Edit Nilai Preferensi</h3>
			</div>
			<form method="post">
                <div class="form-group">
				    <label for="kt">NUPTK</label>
					<input type="number" class="form-control" readonly value="<?php echo $eks->nuptk; ?>" name="nuptk" id="nuptk"  >

				  </div>
				  <div class="form-group">
				    <label for="kt">Nama Guru</label>
				    <input type="text" class="form-control" value="<?php echo $eks->nama; ?>" id="nama" name="nama" required>
				  </div>
                  <div class="form-group">
				    <label for="kt">Absensi</label>
				    <input type="text" class="form-control" value="<?php echo $eks->absen; ?>" id="absen" name="absen" required>
				  </div>
                  <div class="form-group">
				    <label for="kt">Kompetensi</label>
				    <input type="text" class="form-control" value="<?php echo $eks->komptensi; ?>" id="komptensi" name="komptensi" required>
				  </div>
                  <div class="form-group">
				    <label for="kt">Pendidikan</label>
				    <input type="text" class="form-control" value="<?php echo $eks->pendidikan; ?>" id="pendidikan" name="pendidikan" required>
				  </div>
                  <div class="form-group">
				    <label for="kt">Kinerja</label>
				    <input type="text" class="form-control" id="kinerja" value="<?php echo $eks->kinerja; ?>" name="kinerja" required>
				  </div>
				  <button type="submit" class="btn btn-primary">Update</button>
				  <button type="button" onclick="location.href='?page=nilai'" class="btn btn-success">Kembali</button>
				</form>

		  </div>
		  </div>


<?php
if($_POST){

	$eks->nuptk = $_POST['nuptk'];
	$eks->nama = $_POST['nama'];
	$eks->absen = $_POST['absen'];
	$eks->komptensi = $_POST['komptensi'];
	$eks->pendidikan = $_POST['pendidikan'];
	$eks->kinerja = $_POST['kinerja'];

	if($eks->update()){
		echo "<script>location.href='?page=nilai'</script>";
	} else{
?>
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Gagal Ubah Data!</strong> Terjadi kesalahan, coba sekali lagi.
</div>
<?php
	}
}
}
		  ?>
		  <div class="col-xs-12 col-sm-3 col-md-3">
		  	<?php include_once 'sidebar.php'; ?>
		</div>
		</div>

		<script type="text/javascript">
            function isi_otomatis(){
                var nuptk = $("#nuptk").val();
                $.ajax({
                    url: './moduls/ajax.php',
                    data:"nuptk="+nuptk ,
                }).success(function (data) {
                    var json = data,
                    obj = JSON.parse(json);
                    $('#nama').val(obj.nama);
                });
            }
        </script>