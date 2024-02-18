<?php
class Kriteria{

	private $conn;
	private $table_name = "tb_bobot";

	public $id;
	public $kt;
	public $tp;
	public $jm;

	public function __construct($db){
		$this->conn = $db;
	}

	function insert(){

		$query = "insert into ".$this->table_name." values('',?,?,?)";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->kt);
		$stmt->bindParam(2, $this->tp);
		$stmt->bindParam(3, $this->jm);

		if($stmt->execute()){
			return true;
		}else{
			return false;
		}

	}

	function readAll(){

		$query = "SELECT * FROM ".$this->table_name." ORDER BY id_bobot ASC";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();

		return $stmt;
	}

	// used when filling up the update product form
	function readOne(){

		$query = "SELECT * FROM " . $this->table_name . " WHERE id_bobot=? LIMIT 0,1";

		$stmt = $this->conn->prepare( $query );
		$stmt->bindParam(1, $this->id);
		$stmt->execute();

		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		$this->id = $row['id_bobot'];
		$this->kt = $row['b_absensi'];
		$this->tp = $row['b_kompetensi'];
		$this->jm = $row['b_pendidikan'];
	}

	// update the product
	function update(){

		$query = "UPDATE
					" . $this->table_name . "
				SET
					b_absensi = :kt,
					b_kompetensi = :tp,
					b_pendidikan = :jm
				WHERE
					id_kriteria = :id";

		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(':kt', $this->kt);
		$stmt->bindParam(':tp', $this->tp);
		$stmt->bindParam(':jm', $this->jm);
		$stmt->bindParam(':id', $this->id);

		// execute the query
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}

	// delete the product
	function delete(){

		$query = "DELETE FROM " . $this->table_name . " WHERE id_bobot = ?";

		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->id);

		if($result = $stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
}
?>