<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Mata Kuliah</title>
</head>
<body>
    <h2>Daftar Mata Kuliah</h2>

    <?php if ($flash): ?>
        <p style="color: <?= $flash['type'] === 'success' ? 'green' : 'red' ?>">
            <?= htmlspecialchars($flash['message']) ?>
        </p>
    <?php endif; ?>

    <a href="index.php?page=matakuliah&action=create">Tambah Mata Kuliah</a>
    <br><br>

    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>Kode MK</th>
            <th>Nama Mata Kuliah</th>
            <th>SKS</th>
            <th>Semester</th>
            <th>Dosen</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($daftar as $m): ?>
        <tr>
            <td><?= htmlspecialchars($m['kode_mk']) ?></td>
            <td><?= htmlspecialchars($m['nama_mk']) ?></td>
            <td><?= (int) $m['sks'] ?></td>
            <td><?= (int) $m['semester'] ?></td>
            <td><?= htmlspecialchars($m['dosen']) ?></td>
            <td>
                <a href="index.php?page=matakuliah&action=edit&id=<?= (int) $m['id'] ?>">Edit</a>
                <form method="post"
                      action="index.php?page=matakuliah&action=delete"
                      style="display:inline"
                      onsubmit="return confirm('Hapus data ini?')">
                    <input type="hidden" name="id" value="<?= (int) $m['id'] ?>">
                    <button type="submit">Hapus</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <p>Total mata kuliah: <?= count($daftar) ?></p>
</body>
</html>