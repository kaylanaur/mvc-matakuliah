<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Mata Kuliah</title>
</head>
<body>
    <h2>Edit Mata Kuliah</h2>

    <?php if ($flash): ?>
        <p style="color: <?= $flash['type'] === 'success' ? 'green' : 'red' ?>">
            <?= htmlspecialchars($flash['message']) ?>
        </p>
    <?php endif; ?>

    <form method="post" action="index.php?page=matakuliah&action=update">
        <input type="hidden" name="id" value="<?= (int) $matkul['id'] ?>">

        <label>Kode MK</label><br>
        <input type="text" name="kode_mk"
               value="<?= htmlspecialchars($matkul['kode_mk']) ?>" required><br><br>

        <label>Nama Mata Kuliah</label><br>
        <input type="text" name="nama_mk"
               value="<?= htmlspecialchars($matkul['nama_mk']) ?>" required><br><br>

        <label>SKS</label><br>
        <input type="number" name="sks" min="1" max="6"
               value="<?= (int) $matkul['sks'] ?>" required><br><br>

        <label>Semester</label><br>
        <input type="number" name="semester" min="1" max="8"
               value="<?= (int) $matkul['semester'] ?>" required><br><br>

        <label>Dosen Pengampu</label><br>
        <input type="text" name="dosen"
               value="<?= htmlspecialchars($matkul['dosen']) ?>" required><br><br>

        <button type="submit">Update</button>
        <a href="index.php?page=matakuliah">Kembali</a>
    </form>
</body>
</html>