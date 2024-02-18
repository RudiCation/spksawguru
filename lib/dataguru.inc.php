<?php
class Alternatif{

	private $conn;
	private $table_name = "tb_guru";

	public $nuptk;
	public $kt;
	public $tmptlhr;
	public $tgllahir;
	public $jk;
	public $tmtkerja;
	public $title;
	public $mapel;

	public function __construct($db){
		$this->conn = $db;
	}

	function insert(){

		$query = "insert into ".$this->table_name." values(?,?,?,?,?,?,?,?)";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->nuptk);
		$stmt->bindParam(2, $this->kt);
		$stmt->bindParam(3, $this->tmptlhr);
		$stmt->bindParam(4, $this->tgllahir);
		$stmt->bindParam(5, $this->tmtkerja);
		$stmt->bindParam(6, $this->jk);
		$stmt->bindParam(7, $this->title);
		$stmt->bindParam(8, $this->mapel);

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
		$this->kt = $row['nama'];
		$this->tmptlhr =$row['tmptlahir'];
		$this->tgllahir = $row['tgllahir'];
		$this->tmtkerja = $row['tmtkerja'];
		$this->jk = $row['jk'];
		$this->title = $row['title'];
		$this->mapel =  $row['mapel'];

	}

	// update the product
	function update(){

		$query = "UPDATE
					" . $this->table_name . "
				SET
					nama = :kt,
					tmptlahir = :tmptlahir,
					tgllahir = :tgllahir,
					tmtkerja = :tmtkerja,
					jk = :jk,
					title = :title,
					mapel = :mapel
					WHERE
					nuptk = :id";

		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(':kt', $this->kt);
		$stmt->bindParam(':tmptlahir', $this->tmptlhr);
		$stmt->bindParam(':tgllahir', $this->tgllahir);
		$stmt->bindParam(':tmtkerja', $this->tmtkerja);
		$stmt->bindParam(':jk', $this->jk);
		$stmt->bindParam(':title', $this->title);
		$stmt->bindParam(':mapel', $this->mapel);
		$stmt->bindParam(':id', $this->nuptk);

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
		$stmt->bindParam(1, $this->nuptk);

		if($result = $stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
}
?>