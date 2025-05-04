<!DOCTYPE html>
<html>
<head>
    <title>Asprak</title>
    <link rel="stylesheet" href="/tp_mvc/public/assets/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h2>Asisten Praktikum</h2>
    <a href="index.php?entity=aspraks&action=create" class="btn btn-primary mb-2">Add Asprak</a>
    <table class="table table-bordered">
        <tr>
            <th>ID</th><th>Nama Mahasiswa</th><th>Bidang</th><th>Tahun</th><th>Action</th>
        </tr>
        <?php while($row = $aspraks->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= htmlspecialchars($row['student_name']) ?></td>
            <td><?= htmlspecialchars($row['bidang']) ?></td>
            <td><?= htmlspecialchars($row['tahun']) ?></td>
            <td>
                <a href="index.php?entity=aspraks&action=edit&id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="index.php?entity=aspraks&action=delete&id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete?')">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
    <a href="index.php?entity=students" class="btn btn-info">Lihat Mahasiswa</a>
</div>
</body>
</html>