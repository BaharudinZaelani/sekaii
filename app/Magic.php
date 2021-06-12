<?php 

class Magic {
	private $q = 'SELECT * FROM user WHERE username = ';
	private $host = 'localhost',
			$uname = 'root',
			$pw = '',
			$db = 'akulirik';
	public $conn;

	function __construct(){
		$this->conn = mysqli_connect($this->host, $this->uname, $this->pw, $this->db);
		if ($this->conn) {
			echo "";
		}else {
			echo "<script>
				alert('koneksi gagal!')
			</script>";
		}
	}

	public function login($username, $password = null){
		if ( $password == null ) {
			echo "
			<script>
				alert ('password is null')
			</script>
			";
			return;
		}


		$username = strtolower($username);
		
		$query = mysqli_query($this->conn, "$this->q '$username' ");
		if ( mysqli_num_rows($query) === 1 ) {
			$hasil = mysqli_fetch_assoc($query);

			if ( password_verify($password, $hasil['password']) ) {
				// session di sini
				// jangan anggap aku anak kecil paman!
				session_start();
				$_SESSION['username'] = $username;
				header("Location: ../dashboard");
			}else {
				echo "<script>
					alert('Password salah')
				</script>";
			}
		}else {
			echo "<script>
					alert('Username Tidak sesuai')
				</script>";
		}
	}

	public function addToDb($judulLagu, $postby, $link, $lirik, $dataAdd, $desc){
		$_SESSION['addToDb'] = false;
		$thumb_id = explode('=', $link);
		$lirik = str_replace(',', '<br>', $lirik);
		if ( $thumb_id[1] == null ) {
			$_SESSION['addToDb'] = true;
	        header("Location: ../login");
		}else {
			$cek = $this->get("posts", "thumb_id", $thumb_id[1]);
			
			if ( !isset($cek) ) {
				$query = "INSERT INTO `posts` (`id`, `judulLagu`, `upBy`, `lirik`, `date`, `description`, `thumb_id`) VALUES (NULL, '$judulLagu', '$postby', '$lirik', '$dataAdd', '$desc', '$thumb_id[1]');";
				$zaw = mysqli_query($this->conn, $query);
        		header("Location: ../login");
			}else {
				$_SESSION['duplicate_item'] = true;
        		header("Location: ../login");
			}
		}	
	}

	public function delete($id, $table) {
		$query = "DELETE FROM `posts` WHERE `$table`.`id` = $id";
		mysqli_query($this->conn, $query);
		return true;
	}

	public function get($nmTable, $field, $show){
		$query = mysqli_query($this->conn, "SELECT * FROM $nmTable WHERE $field = '$show' ORDER BY id DESC");
		while ( $data = mysqli_fetch_assoc($query) ) {
			$hasil[] = $data;
		}
		return $hasil;
	}

	public function getAll($nmTable){
		$query = mysqli_query($this->conn, "SELECT * FROM $nmTable");
		while ( $data = mysqli_fetch_assoc($query) ) {
			$hasil[] = $data;
		}
		return $hasil;
	}

	public function cek( $tabel, $field, $value ) {
		$query = mysqli_query($this->conn, "SELECT * FROM $tabel WHERE $field = '$value' ORDER BY id DESC");
		while ( $data = mysqli_fetch_assoc($query) ) {
			$hasil[] = $data;
		}
		return $hasil;
	}
}