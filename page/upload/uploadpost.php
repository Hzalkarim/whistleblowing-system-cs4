<?php
$lokasi_file = $_FILE['fupload']['tmp_name'];
$nama_file = $_FILE['fupload']['name'];
$ukuran_file = $_FILE['fupload']['size'];
$folder = './upload/';
$isSuccessUpload = move_uploaded_file($lokasi_file, $folder.$nama_file);
if($isSuccessUpload)
{
	echo "Nama File : $nama_file Berhasil di upload<br>";
	echo "Ukuran File : $ukuran_file bytes";

}
?>