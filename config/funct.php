<?php
include 'connection.php';
function insertdata($table, $column, $value)
{
	global $connect;
	$sql = "INSERT INTO " . $table . " (" . $column . ") VALUES (" . $value . ")";
	$query = mysqli_query($connect, $sql) or die(mysqli_error($connect));
	return $query;
}
function updatedata($table, $set, $where)
{
	global $connect;
	$sql = "UPDATE " . $table . " SET " . $set . " WHERE " . $where . "";
	$query = mysqli_query($connect, $sql);
	return $query;
}
function deletedata($table, $where)
{
	global $connect;
	$sql = "DELETE FROM " . $table . " WHERE " . $where . "";
	$query = mysqli_query($connect, $sql);
	return $query;
}
function hitungcount($table, $column, $where)
{
	global $connect;
	$sql = "SELECT " . $column . " FROM " . $table . " WHERE " . $where . "";
	$query = mysqli_query($connect, $sql);
	$num = mysqli_num_rows($query);
	return $num;
}
function countable($table)
{
	global $connect;
	$sql = "SELECT * FROM " . $table . "";
	$query = mysqli_query($connect, $sql);
	$num = mysqli_num_rows($query);
	return $num;
}
function penomoranOtomatis($table, $column, $urut)
{
	global $connect;
	$carikode = mysqli_query($connect, "SELECT MAX(" . $column . ") FROM " . $table . "");
	$datakode = mysqli_fetch_array($carikode);
	if ($datakode) {
		$nilaikode = substr($datakode[0], 4);
		$kode = (int)$nilaikode;
		$kode = $kode + 1;
		$hasilkode = $urut . str_pad($kode, 3, "0", STR_PAD_LEFT);
	}
	return $hasilkode;
}
function jk($data)
{
	$kelamin = "";

	if ($data == 'L') {
		$kelamin = "Laki-Laki";
	} else {
		$kelamin = "Perempuan";
	}
	return $kelamin;
}
function TanggalIndo($date)
{
	$BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
	$tahun = substr($date, 0, 4);
	$bulan = substr($date, 5, 2);
	$tgl   = substr($date, 8, 2);

	$result = $tgl . " " . $BulanIndo[(int)$bulan - 1] . " " . $tahun;
	return ($result);
}
