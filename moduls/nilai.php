<?php
include_once 'lib/nilai.inc.php';
$pro = new Nilai($db);
$stmt = $pro->readAll();
?>
<div class="well">
	<div class="row">
		<div class="col-md-6 text-left">
			<h4>Data Nilai Preferensi</h4>
		</div>
		<div class="col-md-6 text-right">
			<button onclick="location.href='?page=addnilai'" class="btn btn-primary">Tambah Data</button>
		</div>
	</div>
	<br/>

	<table width="100%" class="table table-striped table-bordered" id="tabeldata">
        <thead>
            <tr>
                <th width="30px">No</th>
                <th>NUPTK</th>
                <th>Nama</th>
                <th>Absensi</th>
                <th>Kompetensi</th>
                <th>Pendidikan</th>
                <th>Kinerja</th>
                <th width="100px">Aksi</th>
            </tr>
        </thead>

        <tfoot>
            <tr>
            <th width="30px">No</th>
                <th>NUPTK</th>
                <th>Nama</th>
                <th>Absensi</th>
                <th>Kompetensi</th>
                <th>Pendidikan</th>
                <th>Kinerja</th>
                <th width="100px">Aksi</th>
            </tr>
        </tfoot>

        <tbody>
<?php
$no=1;
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $row['ket_nilai'] ?></td>
                <td><?php echo $row['jum_nilai'] ?></td>
                <td class="text-center">
					<a href="nilai-ubah.php?id=<?php echo $row['id_nilai'] ?>" class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
					<a href="nilai-hapus.php?id=<?php echo $row['id_nilai'] ?>" onclick="return confirm('Yakin ingin menghapus data')" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
			    </td>
            </tr>
<?php
}
?>
        </tbody>

    </table>
</div>