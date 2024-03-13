<?php
    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "peminjamanbarang";
    $connect = mysqli_connect($db_host, $db_user, $db_pass, $db_name) or die("Gagal terhubung dengan Database: " . mysqli_error($dbconnect));


    function checkLogin($username, $password){
		global $connect; 
		$uname = $username;
		$upass = md5($password);		
		$hasil = mysqli_query($connect,"select * from user where username='$uname' and password='$upass'");
		$cek = mysqli_num_rows($hasil);
		if($cek > 0 ){
            $query = mysqli_fetch_array($hasil);
            $_SESSION['id_user'] = $query['id_user'];
            $_SESSION['username'] = $query['username'];
            $_SESSION['role'] = $query['role'];
            $_SESSION['no_identitas'] = $query['no_identitas'];
			return true;		
        }
		else {
			return false;
		}	
	}

    
    function showdataUser()
    {
        global $connect;    
        $hasil=mysqli_query($connect,"SELECT user.id, user.no_identitas, user.nama, user.status, user.username, user.role from user;");
        $rows=[];
        while($row = mysqli_fetch_assoc($hasil))
        {
            $rows[] = $row;
        }
        return $rows;
    }

    function tambahBarang($kode_barang, $nama_barang, $kategori, $merk, $jumlah)
    {
        global $connect;
        $sql = "INSERT INTO barang (kode_barang, nama_barang, kategori, merk, jumlah)
        VALUES ('$kode_barang', '$nama_barang', '$kategori', '$merk', $jumlah)";
        return $connect->query($sql);
    }
    function editDataBarang($id,$kode_barang,$nama_barang,$kategori,$merk,$jumlah)  
    {
        global $connect;
        $sql = "UPDATE barang SET kode_barang = $kode_barang, nama_barang = $nama_barang, kategori = $kategori, merk = $merk, jumlah = $jumlah WHERE id = $id";
        return $connect->query($sql);
    }

    function showdataBarang()
    {
        global $connect;    
        $sql = "SELECT * FROM barang";
        $result = $connect->query($sql);
        return $result;
    }
    

    function editData($tablename, $id)
    {
        global $connect;
        $hasil=mysqli_query($connect,"select * from $tablename where id='$id'");
        return $hasil;
    }

    function delete($tablename,$id)
    {
        global $connect;
        $hasil=mysqli_query($connect,"delete from $tablename where id='$id'");
        return $hasil;
    }

    
?>