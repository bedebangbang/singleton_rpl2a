<?php
include_once "koneksi.php";



$barang1 = new Barang();
$barang1->tambahBarang('Laptop', 'Elektronik', 10, 'Ruang A');


$barang2 = new Barang();
$barang2->hapusBarang(1);


?>