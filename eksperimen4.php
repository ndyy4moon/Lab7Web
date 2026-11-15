<?php
$nim = "312510191";

if (ctype_digit($nim) && strlen($nim) == 9) {
    echo "NIM valid: " . htmlspecialchars($nim);
} else {
    echo "NIM tidak valid. NIM harus terdiri dari 9 angka.";
}
?>
