<?php
class Bobot{

	private $conn;
	private $table_name = "tb_bobot";
	public $b_absen;
	public $b_kompeten;
	public $b_pendidikan;
	public $b_kinerja;
	public $idbobot;
	public function __construct($db){
		$this->conn = $db;
	}

	function insert(){

		$query = "insert into ".$this->table_name." values('',?,?,?,?)";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->b_absen);
		$stmt->bindParam(2, $this->b_kompeten);
		$stmt->bindParam(3, $this->b_pendidikan);
		$stmt->bindParam(4, $this->b_kinerja);

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
		$stmt->bindParam(1, $this->idbobot);
		$stmt->execute();

		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		$this->b_absen = $row['b_absensi'];
		$this->b_kompeten = $row['b_kompetensi'];
		$this->b_pendidikan = $row['b_pendidikan'];
		$this->b_kinerja = $row['b_kinerja'];

	}

	// update the product
	function update(){

		$query = "UPDATE
					" . $this->table_name . "
				SET
					b_absensi = :babsen,
					b_kompetensi = :bkompeten,
					b_pendidikan = :bpendidik,
					b_kinerja = :bkinerja
				WHERE
					id_bobot = :id";

		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(':babsen', $this->b_absen);
		$stmt->bindParam(':bkompeten', $this->b_kompeten);
		$stmt->bindParam(':bpendidik', $this->b_pendidikan);
		$stmt->bindParam(':bkinerja', $this->b_kinerja);
		$stmt->bindParam(':id', $this->idbobot);

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
		$stmt->bindParam(1, $this->idbobot);

		if($result = $stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
}
?>