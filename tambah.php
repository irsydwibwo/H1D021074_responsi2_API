<?php
require 'koneksi.php';
$input = file_get_contents('php://input');
$data = json_decode($input,true);
//terima data dari mobile
$barang=trim($data['barang']);
$status=trim($data['status']);
http_response_code(201);
if($barang!='' and $status!=''){
 $query = mysqli_query($koneksi,"insert into peminjaman(barang,status) values('$barang','$status')");
 $pesan = true;
}else{
 $pesan = false;
}
echo json_encode($pesan);
echo mysqli_error($koneksi);