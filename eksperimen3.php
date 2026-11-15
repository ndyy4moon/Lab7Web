<?php
function formatRupiah($angka) {
    return "Rp" . number_format($angka, 0, ",", ".");
}

$harga = 150000;

echo "Harga barang: " . formatRupiah($harga);
?>
