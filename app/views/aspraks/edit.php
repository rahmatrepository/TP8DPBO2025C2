<!DOCTYPE html>
<html>
<head>
    <title>Edit Asprak</title>
    <link rel="stylesheet" href="/tp_mvc/public/assets/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h2>Edit Asprak</h2>
    <form method="post" action="index.php?entity=aspraks&action=update&id=<?= $asprak['id'] ?>">
        <div class="mb-2">
            <label>Mahasiswa</label>
            <select name="student_id" class="form-control" required>
                <?php while($row = $students->fetch_assoc()): ?>
                <option value="<?= $row['id'] ?>" <?= $row['id'] == $asprak['student_id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($row['name']) ?>
                </option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="mb-2">
            <label>Bidang</label>
            <input type="text" name="bidang" class="form-control" value="<?= htmlspecialchars($asprak['bidang']) ?>" required>
        </div>
        <div class="mb-2">
            <label>Tahun</label>
            <input type="number" name="tahun" class="form-control" value="<?= htmlspecialchars($asprak['tahun']) ?>" required>
        </div>
        <button class="btn btn-success" type="submit">Update</button>
        <a href="index.php?entity=aspraks" class="btn btn-secondary">Back</a>
    </form>
</div>
</body>
</html>