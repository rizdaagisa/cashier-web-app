<?php 

$conn = mysqli_connect("localhost","root","","percetakan");


function query($query){
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ( $row = mysqli_fetch_assoc($result) ) {
	    $rows[]= $row;
	}

	if (!$result) {
    	die('Could not query:' . mysql_error());
	}
	// var_dump($rows);
	return $rows;

}

function pelanggan($data){
	global $conn;
 	$nama = $data['nama_pelanggan'];
	$alamat = $data['alamat'];
	$nomor = $data['nomor'];
	$email = $data['email'];
	$date = date("d-m-Y");
	$query = "INSERT INTO pelanggan VALUES
		('','$nama','$alamat', '$email','$nomor', '$date')";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

function tambah($data){
	global $conn;

	
	$nama = $data['nama']; //htmlspecialchars($data['nama'])
	$harga = $data['harga'];
	$stock = $data['stock'];

	// $profile = $data['profile']; //htmlspecialchars($data['profile'])

	$query = "INSERT INTO barang VALUES
		('','$nama','$stock','$harga')";

	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

function tambah_cetak($data){
	global $conn;

	$nama = $data['nama'];
	$alamat = $data['alamat'];
	$nomor = $data['nomor'];
	$email = $data['email'];
	$description = $data['description'];

	$kategori = $data['kategori'];
	$jumlah = $data['jumlah'];
	$harga = $data['harga'];
	$buat = $data['buat'];
	$ambil = $data['ambil'];


	// $profile = $data['profile']; //htmlspecialchars($data['profile'])

	$query = "INSERT INTO cetak VALUES
		('','$nama','$alamat','$nomor','$email','$description','$kategori','$jumlah','$harga','$buat','$ambil')";

	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}


function hapus($id,$katalog){
	global $conn;
	if ($katalog == "nota") {
		$query = "DELETE FROM pelanggan WHERE id_pelanggan = $id";
		mysqli_query($conn, $query);

		$query = "DELETE FROM nota WHERE id_pelanggan = $id";
		mysqli_query($conn, $query);
		return mysqli_affected_rows($conn);
	} else {
		$query = "DELETE FROM cetak WHERE id_cetak = $id";
		mysqli_query($conn, $query);
		return mysqli_affected_rows($conn);
	}
}

function hapus_pelanggan($id){
	global $conn;
	$query = "DELETE FROM pelanggan WHERE id_pelanggan = $id";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

function transaksi($id){
	global $conn;
	$pelanggan = query("SELECT * FROM pelanggan WHERE id_pelanggan = $id")[0];
	$id_pelanggan = $pelanggan['id_pelanggan'];
	$nama = $pelanggan['nama'];
	$alamat = $pelanggan['alamat'];
	$nomor = $pelanggan['nomor'];
	$email = $pelanggan['email'];
	$kelurahan = $pelanggan['kelurahan'];
	$kecamatan = $pelanggan['kecamatan'];
	$kota = $pelanggan['kota'];
	$kodepos = $pelanggan['kodepos'];
	$ongkir = $pelanggan['ongkir'];
	$waktu = $pelanggan['waktu'];
	
	$query = "INSERT INTO transaksi_selesai VALUES('','$id_pelanggan','$nama','$alamat','$nomor','$email','$kecamatan','$kelurahan','$kota','$kodepos','$ongkir','$waktu')";
	mysqli_query($conn, $query);
	$query = "DELETE FROM pelanggan WHERE id_pelanggan = $id";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

function ubah($data){
	global $conn;
	$id_product = $data['id_barang'];
	$nama_barang = $data['nama'];
	$harga = $data['harga'];
	$stock = $data['stock'];

	//cek apakah user ganti gambar baru atau tidak
	$query = "UPDATE barang SET 
				nama_barang = '$nama_barang',
				stock = '$stock',
				harga = '$harga'
			  WHERE id_barang = $id_product
			";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

function cari($keyword){
	global $conn;

	$query = "SELECT * FROM barang WHERE
				nama_barang LIKE '%$keyword%' OR 
				harga LIKE '%$keyword%' ";
	return query($query);
}

function registrasi($data){
	global $conn;

	$username = strtolower(stripcslashes($data["username"])); //menghilangkan back slash dan mmmebuat huruf menjadi kecil
	$password = mysqli_real_escape_string($conn,$data["password"]);
	$confirm = mysqli_real_escape_string($conn,$data["confirm"]);
	$nama = stripcslashes($data["nama"]);
	$email = stripcslashes($data["email"]);

	//cek username sudah ada atau belum
	$result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username' ");
	if (mysqli_fetch_assoc($result) ) {
		echo "<script> 
					alert('Username sudah terdaftar');
			  </script>";
		return false;
	}

	//cek jika password tidak sama
	if ($password !== $confirm) {
		echo "<script> 
					alert('konfirmasi password tidak sesuai');
			  </script>";
		return false;
	}

	//mengubah password menjadi enkripsi 
	$password = password_hash($password, PASSWORD_DEFAULT);
	$confirm = password_hash($confirm, PASSWORD_DEFAULT);
	$query = "INSERT INTO users VALUES('','$nama','$username','$password','$confirm','$email')";

	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

function order($data,$id_rental,$id_mobil,$nama_mobil){
	global $conn;
	$nama = $data['nama']; //htmlspecialchars($data['nama'])
	$alamat = $data['alamat']; //htmlspecialchars($data['kelas'])
	$nomor = $data['nomor'];
	$gender = $data['gender'];
	$email = $data['email'];
	$awal = $data['awal'];
	$akhir = $data['akhir'];
	$query = "INSERT INTO booking VALUES
		('','$id_rental','$id_mobil', '$nama','$nama_mobil', '$alamat', '$nomor', '$gender', '$email', '$awal', '$akhir')";

	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

function update_product($id_pelanggan){
	global $conn;
	$datas = query("SELECT id_barang,banyak_barang from nota where id_pelanggan = $id_pelanggan");
	$i=0;
	foreach ($datas as $data) {
		$id_barang = $data['id_barang'];
		$product = query("SELECT stock from barang where id_barang = $id_barang")[0];
		$update_stock = $product['stock'] - $data['banyak_barang'];
		$query = "UPDATE barang SET 
				stock = '$update_stock'
			  WHERE id_barang = $id_barang
			";
		mysqli_query($conn, $query);
	}
}

?>