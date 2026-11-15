<?php
$errors = [];
$data = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nama = trim($_POST["nama"] ?? "");
    $nim = trim($_POST["nim"] ?? "");
    $prodi = trim($_POST["prodi"] ?? "");
    $semesterInput = $_POST["semester"] ?? "";
    $email = trim($_POST["email"] ?? "");

    if ($nama === "") {
        $errors[] = "Nama wajib diisi.";
    }

    if ($nim === "") {
        $errors[] = "NIM wajib diisi.";
    }

    if ($prodi === "") {
        $errors[] = "Program studi wajib diisi.";
    }

    if (
        !ctype_digit((string)$semesterInput) ||
        (int)$semesterInput < 1 ||
        (int)$semesterInput > 14
    ) {
        $errors[] = "Semester harus berupa angka 1 sampai 14.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Format email tidak valid.";
    }

    if (empty($errors)) {
        $data = [
            "nama" => $nama,
            "nim" => $nim,
            "prodi" => $prodi,
            "semester" => (int)$semesterInput,
            "email" => $email
        ];
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Data Mahasiswa</title>
</head>
<body>

<h2>Formulir Data Mahasiswa</h2>

<form method="POST">
    <label>Nama:
        <input type="text" name="nama" required>
    </label>
    <br><br>

    <label>NIM:
        <input type="text" name="nim" required>
    </label>
    <br><br>

    <label>Program Studi:
        <input type="text" name="prodi" required>
    </label>
    <br><br>

    <label>Semester:
        <input type="number" name="semester" min="1" max="14" required>
    </label>
    <br><br>

    <label>Email:
        <input type="email" name="email" required>
    </label>
    <br><br>

    <button type="submit">Kirim Data</button>
    <button type="reset">Reset</button>
</form>

<?php
if (!empty($errors)) {
    echo "<h3>Terjadi Kesalahan</h3><ul>";

    foreach ($errors as $error) {
        echo "<li>" . htmlspecialchars($error) . "</li>";
    }

    echo "</ul>";
} elseif (!empty($data)) {
    echo "<h3>Data Mahasiswa Diterima</h3>";
    echo "Nama: " . htmlspecialchars($data["nama"]) . "<br>";
    echo "NIM: " . htmlspecialchars($data["nim"]) . "<br>";
    echo "Program Studi: " . htmlspecialchars($data["prodi"]) . "<br>";
    echo "Semester: " . htmlspecialchars((string)$data["semester"]) . "<br>";
    echo "Email: " . htmlspecialchars($data["email"]) . "<br>";
}
?>

</body>
</html>
