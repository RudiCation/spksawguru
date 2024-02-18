<?php
include"moduls/header.php";
include_once 'lib/user.inc.php';
$eks = new User($db);
$eks->id = $_SESSION['id_login'];
$eks->readOne();
include_once 'lib/nilai.inc.php';
$pro3 = new Nilai($db);
$stmt3 = $pro3->readAll();
include_once 'lib/kriteria.inc.php';
$pro2 = new Kriteria($db);
$stmt2 = $pro2->readAll();
include_once 'lib/dataguru.inc.php';
$pro2 = new Alternatif($db);

$page = $_GET['page'];
if(isset($page)){
    if($page=='profile'){
        include"moduls/profil.php";
    }
    if($page=='dataguru'){
        include"moduls/data-guru.php";
    }
    if($page=='add-dataguru'){
        include"moduls/add-data-guru.php";
    }
    if($page=='nilai'){
        include"moduls/nilai.php";
    }
    if($page=='addnilai'){
        include"moduls/nilai-baru.php";
    }
    if($page=='bobot'){
        include"moduls/bobotnilai.php";
    }

}else{
    include"moduls/default.php";
}
?>


<?php
include"moduls/footer.php";
?>