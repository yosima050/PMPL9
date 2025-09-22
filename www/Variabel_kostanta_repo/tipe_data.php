<?php
// Integer
$a = 10;
$b = 5;
$c = $a + 5;
$d = $b + (10 * 5);
$e = $d - $c;

echo "Variabel a: {$a} <br>";
echo "Variabel b: {$b} <br>";
echo "Variabel c: {$c} <br>";
echo "Variabel d: {$d} <br>";
echo "Variabel e: {$e} <br>";
var_dump($e);
echo "<br><br>";

// Float
$nilaiMatematika = 5.1;
$nilaiIPA = 6.7;
$nilaiBahasaIndonesia = 9.3;

$rataRata = ($nilaiMatematika + $nilaiIPA + $nilaiBahasaIndonesia) / 3;

echo "Matematika: {$nilaiMatematika} <br>";
echo "IPA: {$nilaiIPA} <br>";
echo "Bahasa Indonesia: {$nilaiBahasaIndonesia} <br>";
echo "Rata-rata: {$rataRata} <br>";
var_dump($rataRata);
echo "<br><br>";

// Boolean
$apakahSiswaLulus = true;
$apakahSiswaSudahUjian = false;

echo "Apakah siswa lulus? ";
var_dump($apakahSiswaLulus);
echo "<br>";
echo "Apakah siswa sudah ujian? ";
var_dump($apakahSiswaSudahUjian);
echo "<br><br>";

// String
$namaDepan = "Ibnu";
$namaBelakang = 'Jakaria';

$namaLengkap = "{$namaDepan} {$namaBelakang}";
$namaLengkap2 = $namaDepan . ' ' . $namaBelakang;

echo "Nama Depan: {$namaDepan} <br>";
echo "Nama Belakang: {$namaBelakang} <br>";
echo "Nama Lengkap 1: {$namaLengkap} <br>";
echo "Nama Lengkap 2: {$namaLengkap2} <br><br>";

// Array
$listMahasiswa = ["Wahid Abdullah", "Elmo Bachtiar", "Lendis Fabri"];
echo "Daftar Mahasiswa: <br>";
foreach ($listMahasiswa as $mhs) {
    echo "- {$mhs} <br>";
}
?>
