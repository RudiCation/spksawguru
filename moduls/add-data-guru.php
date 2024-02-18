
<!-- Content Header (Page header) -->
<?php
include_once 'lib/dataguru.inc.php';
$get = $_GET['get'];
$eks = new Alternatif($db);
     if (empty($get)){
?>
<?php
if($_POST){
    $eks->nuptk = $_POST['nuptk'];
	$eks->kt = $_POST['kt'];
    $eks->tmptlhr = $_POST['tmptlhr'];
    $eks->tgllahir = $_POST['tgllahir'];
    $eks->tmtkerja = $_POST['tmtkerja'];
    $eks->jk = $_POST['jk'];
    $eks->title = $_POST['title'];
    $eks->mapel = $_POST['mapel'];

	if($eks->insert()){
?>
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Berhasil Tambah Data!</strong> Tambah lagi atau <a style="color:#FFF" href="?page=dataguru">lihat semua data</a>.
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

		<div class="row">
		  <div class="col-xs-12 col-sm-6 col-md-6">
		  <div class="well">
		  	<div class="page-header">
			  <h3>Tambah Data Guru</h3>
			</div>

			    <form method="post">
                <div class="form-group">
				    <label for="kt">NUPTK</label>
				    <input type="text" class="form-control" id="nuptk" name="nuptk" required>
				  </div>
				  <div class="form-group">
				    <label for="kt">Nama Guru</label>
				    <input type="text" class="form-control" id="kt" name="kt" required>
				  </div>
                  <div class="form-group">
				    <label for="kt">Tempat Lahir</label>
				    <input type="text" class="form-control" id="tmptlhr" name="tmptlhr" required>
				  </div>
                  <div class="form-group">
				    <label for="kt">Tanggal Lahir</label>
				    <input type="date" class="form-control" id="tgllahir" name="tgllahir" required>
				  </div>
                  <div class="form-group">
				    <label for="kt">Jenis Kelamin</label>
				    <select name="jk" class="form-control" required>
				    	<option value="" selected disabled hidden>Pilih Jenis</option>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>

                    </select>
				  </div>
                  <div class="form-group">
				    <label for="kt">TMT Kerja</label>
				    <input type="date" class="form-control" id="tmtkerja" name="tmtkerja" required>
				  </div>
                  <div class="form-group">
				    <label for="kt">Pendidikan Terakhir</label>
				    <input type="text" class="form-control" id="title" name="title" required>
				  </div>
                  <div class="form-group">
				    <label for="kt">Mata Pelajaran Yang diampu</label>
				    <input type="text" class="form-control" id="mapel" name="mapel" required>
				  </div>
				  <button type="submit" class="btn btn-primary">Simpan</button>
				  <button type="button" onclick="location.href='?page=dataguru'" class="btn btn-success">Kembali</button>
				</form>

		  </div>
		  </div>

<?php
     }else if($get == 'edit'){
        $id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');
        $eks->nuptk = $id;
        $eks->readOne();
        ?>

        	<div class="row">
		  <div class="col-xs-12 col-sm-6 col-md-6">
		  <div class="well">
		  	<div class="page-header">
			  <h3>Edit Data Guru</h3>
			</div>

			    <form method="post">
                <div class="form-group">
				    <label for="kt">NUPTK</label>
				    <input type="text" class="form-control" id="nuptk" value="<?php echo $eks->nuptk; ?>" name="nuptk" readonly>
				  </div>
				  <div class="form-group">
				    <label for="kt">Nama Guru</label>
				    <input type="text" class="form-control" id="kt" name="kt" value="<?php echo $eks->kt; ?>" required>
				  </div>
                  <div class="form-group">
				    <label for="kt">Tempat Lahir</label>
				    <input type="text" class="form-control" id="tmptlhr" name="tmptlhr" value="<?php echo $eks->tmptlhr; ?>" required>
				  </div>
                  <div class="form-group">
				    <label for="kt">Tanggal Lahir</label>
				    <input type="date" class="form-control" id="tgllahir" name="tgllahir" value="<?php echo $eks->tgllahir; ?>" required>
				  </div>
                  <div class="form-group">
				    <label for="kt">Jenis Kelamin</label>
				    <select name="jk" class="form-control" required>
				    	<option value="" selected disabled hidden>Pilih Jenis</option>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>

                    </select>
				  </div>
                  <div class="form-group">
				    <label for="kt">TMT Kerja</label>
				    <input type="date" class="form-control" id="tmtkerja" name="tmtkerja" value="<?php echo $eks->tmtkerja; ?>" required>
				  </div>
                  <div class="form-group">
				    <label for="kt">Pendidikan Terakhir</label>
				    <input type="text" class="form-control" id="title" name="title" value="<?php echo $eks->title; ?>" required>
				  </div>
                  <div class="form-group">
				    <label for="kt">Mata Pelajaran Yang diampu</label>
				    <input type="text" class="form-control" id="mapel" name="mapel" value="<?php echo $eks->mapel; ?>" required>
				  </div>
				  <button type="submit" class="btn btn-primary">Update</button>
				  <button type="button" onclick="location.href='?page=dataguru'" class="btn btn-success">Kembali</button>
				</form>

		  </div>
		  </div>
        <?php
        if($_POST){

            $eks->nuptk = $_POST['nuptk'];
            $eks->kt = $_POST['kt'];
            $eks->tmptlhr = $_POST['tmptlhr'];
            $eks->tgllahir = $_POST['tgllahir'];
            $eks->tmtkerja = $_POST['tmtkerja'];
            $eks->jk = $_POST['jk'];
            $eks->title = $_POST['title'];
            $eks->mapel = $_POST['mapel'];

            if($eks->update()){
                echo "<script>location.href='?page=dataguru'</script>";
            } else{
        ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Gagal Ubah Data!</strong> Terjadi kesalahan, coba sekali lagi.
        </div>
        <?php
            }
        }
    }elseif($get=='hapus'){
		$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');
		$eks->nuptk = $id;
		if($eks->delete()){
			echo "<script>location.href='?page=dataguru';</script>";
		} else{
			echo "<script>alert('Gagal Hapus Data');location.href='?page=dataguru';</script>";

		}

	}
?>


		  <div class="col-xs-12 col-sm-3 col-md-3">
		  	<?php include_once 'sidebar.php'; ?>
		</div>