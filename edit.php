<?php
require 'koneksi.php';
$input = file_get_contents('php://input');
$data = json_decode($input,true);
//terima data dari mobile
$id=trim($data['id']);
$barang=trim($data['barang']);
$status=trim($data['status']);
http_response_code(201);
if($barang!='' and $status!=''){
 $query = mysqli_query($koneksi,"update peminjaman set barang='$barang',status='$status' where
id='$id'");
 $pesan = true;
}else{
 $pesan = false;
}
echo json_encode($pesan);
echo mysqli_error($koneksi);