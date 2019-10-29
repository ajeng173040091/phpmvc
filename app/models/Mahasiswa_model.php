<?php 

 class Mahasiswa_model {
 	private $table = 'mahasiswa';
 	private $db;

 	public function __construct()
 	{
 		$this->db = new Database;
 	}
 

	public function getAllMahasiswa()
	{
		$this->db->query('SELECT * FROM ' . $this->table);
		return $this->db->resultSet();
	 }

	 public function getMahasiswaById($id)
	 {
	 	$this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
	 	$this->db->bind('id', $id);
	 	return $this->db->single();
	 }

	 public function tambahDataMahasiswa($data)
	 {

		$query = "INSERT INTO mahasiswa
					VALUES
					('', :nama, :nrp, :emai, :jurusan)";

					$this->db->query($query);
					$this->db->bind('nama', $data['nama']);
					$this->db->bind('nrp', $data['nrp']);
					$this->db->bind('emai', $data['emai']);
					$this->db->bind('jurusan', $data['jurusan']);


					$this->db->execute();

					return $this->db->rowCount();



	 }

	 public function hapusDataMahasiswa($id)
	 {
		 $query = "DELETE FROM mahasiswa where id =:id";
		 $this->db->query($query);
		 $this->db->bind('id', $id);
		 
		 $this->db->execute();

		 return $this->db->rowCount();

	 }

	 public function ubahDataMahasiswa($data){
		$query = "UPDATE mahasiswa SET nama = :nama, nrp = :nrp, emai = :email, jurusan = :jurusan WHERE id = :id ";
	
			$this->db->query($query);
			$this->db->bind('nama', $data['nama']);
			$this->db->bind('nrp', $data['nrp']);
			$this->db->bind('emai', $data['emai']);
			$this->db->bind('jurusan', $data['jurusan']);
			$this->db->bind('id', $data['id']);

			$this->db->execute();

			return $this->db->rowCount();
	}


	public function cariDataMahasiswa(){	
		$keyword = $_POST['keyword'];

		$query = "SELECT * FROM mahasiswa WHERE nama LIKE :keyword";

		$this->db->query($query);
			$this->db->bind('keyword', "%$keyword%");
			return $this->db->resultSet();

	}
}

 	// private $dbh; // database handler
 	// private $stmt;

// private $mhs = [

 	//[
 	//	"nama" => "Ajeng Tri Gustina",
 	//	"nrp" => "173040091",
 	//	"email" => "ajengtrg@gmail.com",
 	//	"jurusan" => "Teknik Informatika"

 	//],
 	////[
 	//	"nama" => "Naysila Qiana Assyifa",
 	//	"nrp" => "173040012",
 	//	"email" => "nayaqasyifa@gmail.com",
 	//	"jurusan" => "Kedokteran"

 	//],
 	//[
 	//	"nama" => "Mekaila Ayu Bestari",
 	//	"nrp" => "173040026",
 	//	"email" => "mekaa@gmail.com",
 	//	"jurusan" => "Teknologi Pangan"
 //	]
// ]; //