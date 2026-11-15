<?php
$mahasiswa = ["Alya", "Bima", "Citra", "Doni", "Nadya", "Rina", "Fajar"];

if (isset($_GET["cari"])) {
    $kataKunci = trim($_GET["cari"]);

    echo "<h3>Hasil Pencarian</h3>";

    $ditemukan = false;

    foreach ($mahasiswa as $nama) {
        if (stripos($nama, $kataKunci) !== false) {
            echo htmlspecialchars($nama) . "<br>";
            $ditemukan = true;
        }
    }

    if (!$ditemukan) {
        echo "Nama tidak ditemukan.";
    }
}
?>

<form method="GET">
    <label>Cari nama mahasiswa:</label>
    <input type="text" name="cari">
    <button type="submit">Cari</button>
</form>
