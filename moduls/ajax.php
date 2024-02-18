<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// header('Content-Type: application/json');
$con = new mysqli('localhost','root','rpl12345','spk_guru');
$id = isset($_GET['nuptk']) ? $_GET['nuptk'] : die('ERROR: missing ID.');
//mengambil data
$query = $con->query("SELECT*FROM tb_guru WHERE nuptk = '$id'");
$result = $query->fetch_array();
$data = array(
            'nama' =>  $result['nama'],
        );

//tampil data
echo json_encode($data);