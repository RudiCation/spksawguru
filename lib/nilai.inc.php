<?php
class Nilai{

	private $conn;
	private $table_name = "tb_nilai";

	public $nuptk;
	public $nama;
	public $absen;
	public $komptensi;
	public $pendidikan;
	public $kinerja;

	public function __construct($db){
		$this->conn = $db;
	}

	function insert(){

		$query = "insert into ".$this->table_name." values(?,?,?,?,?,?)";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->nuptk);
		$stmt->bindParam(2, $this->nama);
		$stmt->bindParam(3, $this->absen);
		$stmt->bindParam(4, $this->komptensi);
		$stmt->bindParam(5, $this->pendidikan);
		$stmt->bindParam(6, $this->kinerja);

		if($stmt->execute()){
			return true;
		}else{
			return false;
		}

	}

	function readAll(){

		$query = "SELECT * FROM ".$this->table_name." ORDER BY nuptk ASC";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();

		return $stmt;
	}

	// used when filling up the update product form
	function readOne(){

		$query = "SELECT * FROM " . $this->table_name . " WHERE nuptk=? LIMIT 0,1";

		$stmt = $this->conn->prepare( $query );
		$stmt->bindParam(1, $this->nuptk);
		$stmt->execute();

		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		$this->nuptk = $row['nuptk'];
		$this->nama = $row['nama'];
		$this->absen = $row['absensi'];
		$this->komptensi = $row['kompetensi'];
		$this->pendidikan=$row['pendidikan'];
		$this->kinerja=$row['kinerja'];

	}

	// update the product
	function update(){

		$query = "UPDATE
					" . $this->table_name . "
				SET
					ket_nilai = :kt,
					jum_nilai = :jm
				WHERE
					id_nilai = :id";

		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(':kt', $this->kt);
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

		$query = "DELETE FROM " . $this->table_name . " WHERE nuptk = ?";

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