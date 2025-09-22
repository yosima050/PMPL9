<?php
$a = 10;
$b = 5;

$hasilTambah = $a + $b;
$hasilKurang = $a - $b;
$hasilKali = $a * $b;
$hasilBagi = $a / $b;
$sisaBagi = $a % $b;
$pangkat = $a ** $b;

echo "a + b = " . ($a + $b) . "<br>";
echo "a - b = " . ($a - $b) . "<br>";
echo "a * b = " . ($a * $b) . "<br>";
echo "a / b = " . ($a / $b) . "<br>";
echo "a % b = " . ($a % $b) . "<br><br>";
?> 

<?php
$hasilSama = $a == $b;
$hasilTidakSama = $a != $b;
$hasilLebihKecil = $a < $b;
$hasilLebihBesar = $a > $b;
$hasilLebihKecilSama = $a <= $b;
$hasilLebihBesarSama = $a >= $b;


echo "a == b : "; var_dump($a == $b); echo "<br>";
echo "a != b : "; var_dump($a != $b); echo "<br>";
echo "a > b : "; var_dump($a > $b); echo "<br>";
echo "a < b : "; var_dump($a < $b); echo "<br><br>";
?>

<?php
$hasilAnd = $a && $b;
$hasilOr = $a || $b;
$hasilNotA = !$a;
$hasilNotB = !$b;

$x = true;
$y = false;

echo "x && y : "; var_dump($x && $y); echo "<br>";
echo "x || y : "; var_dump($x || $y); echo "<br>";
echo "!x : "; var_dump(!$x); echo "<br><br>";
?>

<?php
$a += $b;
$a -= $b;
$a *= $b;
$a /= $b;
$a %= $b;

$nilai = 10;
echo "nilai awal = $nilai <br>";
$nilai += 5;
echo "nilai += 5 : $nilai <br>";
$nilai -= 3;
echo "nilai -= 3 : $nilai <br>";
$nilai *= 2;
echo "nilai *= 2 : $nilai <br>";
$nilai /= 4;
echo "nilai /= 4 : $nilai <br><br>";
?>

<?php
$hasilIdentik = $a === $b;
$hasilTidakIdentik = $a !== $b;

$num = 7;
echo "num = $num <br>";
$num++;
echo "num++ : $num <br>";
$num--;
echo "num-- : $num <br><br>";
?>

<?php
$total = 45;
$isi = 28;
$kosong = $total - $isi;
$persen = ($kosong / $total) * 100;

echo "=== Soal Kursi Restoran === <br>";
echo "Jumlah kursi kosong: $kosong <br>";
echo "Persentase kursi kosong: $persen % <br>";
?>
