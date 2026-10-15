<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Mata Kuliah</title>
</head>
<body>
    <h2>Tambah Mata Kuliah</h2>

    <?php if ($flash): ?>
        <p style="color: <?= $flash['type'] === 'success' ? 'green' : 'red' ?>">
            <?= htmlspecialchars($flash['message']) ?>
        </p>
    <?php endif; ?>

    <form method="post" action="index.php?page=matakuliah&action=store">
        <label>Kode MK</label><br>
        <input type="text" name="kode_mk" required><br><br>

        <label>Nama Mata Kuliah</label><br>
        <input type="text" name="nama_mk" required><br><br>

        <label>SKS</label><br>
        <input type="number" name="sks" min="1" max="6" required><br><br>

        <label>Semester</label><br>
        <input type="number" name="semester" min="1" max="8" required><br><br>

        <label>Dosen Pengampu</label><br>
        <input type="text" name="dosen" required><br><br>

        <button type="submit">Simpan</button>
        <a href="index.php?page=matakuliah">Kembali</a>
    </form>
</body>
</html>