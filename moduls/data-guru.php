<?php
    include_once 'lib/dataguru.inc.php';
    $pro = new Alternatif($db);
    $stmt = $pro->readAll();
?>
<div class="well">
	<div class="row">
		<div class="col-md-6 text-left">
			<h4>Data Guru</h4>
		</div>
		<div class="col-md-6 text-right">
			<button onclick="location.href='?page=add-dataguru'" class="btn btn-primary">Tambah Data</button>
		</div>
	</div>
	<br/>

	<table width="100%" class="table table-striped table-bordered" id="tabeldata">
        <thead>
            <tr>
                <th width="30px">No</th>
                <th>NUPTK</th>
                <th>Nama</th>
                <th>tmpt/tgl Lahir</th>
                <th>Tempat Kejar</th>
                <th>JK</th>
                <th>Title</th>
                <th>Mapel</th>
                <th width="100px">Aksi</th>
            </tr>
        </thead>

        <tfoot>
            <tr>
                <th>No</th>
                <th>NUPTK</th>
                <th>Nama</th>
                <th>tmpt/tgl Lahir</th>
                <th>Tempat Kejar</th>
                <th>JK</th>
                <th>Title</th>
                <th>Mapel</th>
                <th>Aksi</th>
            </tr>
        </tfoot>

        <tbody>
<?php
$no=1;
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $row['nuptk'] ?></td>
                <td><?php echo $row['nama'] ?></td>
                <td><?php echo $row['tmptlahir'] ?>, <?php echo $row['tgllahir'] ?></td>
                <td><?php echo $row['tmtkerja'] ?></td>
                <td><?php echo $row['jk'] ?></td>
                <td><?php echo $row['title'] ?></td>
                <td><?php echo $row['mapel'] ?></td>
                <td class="text-center">
					<a href="?page=add-dataguru&get=edit&id=<?php echo $row['nuptk'] ?>" class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
					<a href="alternatif-hapus.php?id=<?php echo $row['nuptk'] ?>" onclick="return confirm('Yakin ingin menghapus data')" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
			    </td>
            </tr>
<?php
}
?>
        </tbody>

    </table>
</div>