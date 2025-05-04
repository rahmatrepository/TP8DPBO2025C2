<!DOCTYPE html>
<html>
<head>
    <title>Add Asprak</title>
    <link rel="stylesheet" href="/tp_mvc/public/assets/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h2>Add Asprak</h2>
    <form method="post" action="index.php?entity=aspraks&action=store">
        <div class="mb-2">
            <label>Mahasiswa</label>
            <select name="student_id" class="form-control" required>
                <option value="">Pilih Mahasiswa</option>
                <?php while($row = $students->fetch_assoc()): ?>
                <option value="<?= $row['id'] ?>"><?= htmlspecialchars($row['name']) ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="mb-2">
            <label>Bidang</label>
            <input type="text" name="bidang" class="form-control" required>
        </div>
        <div class="mb-2">
            <label>Tahun</label>
            <input type="number" name="tahun" class="form-control" required>
        </div>
        <button class="btn btn-success" type="submit">Save</button>
        <a href="index.php?entity=aspraks" class="btn btn-secondary">Back</a>
    </form>
</div>
</body>
</html>