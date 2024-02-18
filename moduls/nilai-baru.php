<?php
include_once 'lib/nilai.inc.php';
$eks = new Nilai($db);
?>

<?php
if($_POST){


	$eks->kt = $_POST['kt'];
	$eks->jm = $_POST['jm'];

	if($eks->insert()){
?>
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Berhasil Tambah Data!</strong> Tambah lagi atau <a href="nilai.php">lihat semua data</a>.
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
				    <select name="nuptk" class= "form-control" id="nuptk" onchange="isi_otomatis(this.value)">
					<option value="" selected disabled hidden>Pilih NUPTK</option>
						<?php
							$sttmguru = $pro2->readAll();
							while ($rgtm = $sttmguru->fetch(PDO::FETCH_ASSOC)) {

							echo "<option value='".$rgtm["nuptk"]."'>".$rgtm["nuptk"]." </option>";
							}
						?>

					</select>
				  </div>
				  <div class="form-group">
				    <label for="kt">Nama Guru</label>
				    <input type="text" class="form-control" id="nama" name="nama" required>
				  </div>
                  <div class="form-group">
				    <label for="kt">Absensi</label>
				    <input type="text" class="form-control" id="tmptlhr" name="tmptlhr" required>
				  </div>
                  <div class="form-group">
				    <label for="kt">Kompetensi</label>
				    <input type="text" class="form-control" id="tgllahir" name="tgllahir" required>
				  </div>
                  <div class="form-group">
				    <label for="kt">Pendidikan</label>
				    <input type="text" class="form-control" id="tmtkerja" name="tmtkerja" required>
				  </div>
                  <div class="form-group">
				    <label for="kt">Kinerja</label>
				    <input type="text" class="form-control" id="title" name="title" required>
				  </div>
				  <button type="submit" class="btn btn-primary">Simpan</button>
				  <button type="button" onclick="location.href='?page=nilai'" class="btn btn-success">Kembali</button>
				</form>

		  </div>
		  </div>
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