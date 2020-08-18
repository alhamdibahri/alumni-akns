<?php
include '../../config/funct.php';
if (isset($_POST['req']) == 'edit') {
	$kodealumni = $_POST['kodealumni'];
	$nama_lengkap = $_POST['nama'];
	$lahir = explode('/', $_POST['tgl_lahir']);
	$tgl_lahir = "$lahir[2]-$lahir[1]-$lahir[0]";
	$tmp_lahir = $_POST['tmp_lahir'];
	$jk = $_POST['jk'];
	$no_hp = $_POST['hp'];
	$alamat = $_POST['alamat'];
	$thn_angkatan = $_POST['thn_angkatan'];
	$lulus = explode('/', $_POST['tgl_lulus']);
	$thn_lulus = "$lulus[2]-$lulus[1]-$lulus[0]";
	$jurusan = $_POST['jurusan'];
	if ($nama_lengkap == '') {
		header("Location:page-form-alumni.php?req=edit&kode_alumni=$_POST[kodealumni]&nama=kosong");
	} elseif ($tmp_lahir == '') {
		header("Location:page-form-alumni.php?req=edit&kode_alumni=$_POST[kodealumni]&tmplahir=kosong");
	} elseif ($jk == '') {
		header("Location:page-form-alumni.php?req=edit&kode_alumni=$_POST[kodealumni]&jk=kosong");
	} elseif ($no_hp == '') {
		header("Location:page-form-alumni.php?req=edit&kode_alumni=$_POST[kodealumni]&hp=kosong");
	} elseif ($alamat == '') {
		header("Location:page-form-alumni.php?req=edit&kode_alumni=$_POST[kodealumni]&alamat=kosong");
	} elseif ($thn_angkatan == '') {
		header("Location:page-form-alumni.php?req=edit&kode_alumni=$_POST[kodealumni]&thn=kosong");
	} elseif ($jurusan == '') {
		header("Location:page-form-alumni.php?req=edit&kode_alumni=$_POST[kodealumni]&jurusan=kosong");
	} else {
		updatedata('data_alumni', 'nama_lengkap="' . $nama_lengkap . '",tanggal_lahir="' . $tgl_lahir . '",tempat_lahir="' . $tmp_lahir . '",jenis_kelamin="' . $jk . '",no_hp="' . $no_hp . '",alamat="' . $alamat . '",tahun_angkatan="' . $thn_angkatan . '",tahun_lulusan="' . $thn_lulus .  '",jurusan="' . $jurusan . '"', 'kode_alumni="' . $kodealumni . '"');
		header('Location:page-alumni.php?tahun=' . $thn_angkatan . '');
	}
}
if (isset($_GET['req']) == 'dell') {
	$kodealumni = $_GET['kode_alumni'];
	deletedata('data_alumni', 'kode_alumni="' . $kodealumni . '"');
	header('location:page-alumni.php?tahun=' . $_GET['tahun'] . '');
}
