<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <link rel="stylesheet" href="/tp_mvc/public/assets/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h2>Edit Student</h2>
    <form method="post" action="index.php?entity=students&action=update&id=<?= $student['id'] ?>">
        <div class="mb-2">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($student['name']) ?>" required>
        </div>
        <div class="mb-2">
            <label>NIM</label>
            <input type="text" name="nim" class="form-control" value="<?= htmlspecialchars($student['nim']) ?>" required>
        </div>
        <div class="mb-2">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" value="<?= htmlspecialchars($student['phone']) ?>" required>
        </div>
        <div class="mb-2">
            <label>Join Date</label>
            <input type="date" name="join_date" class="form-control" value="<?= htmlspecialchars($student['join_date']) ?>" required>
        </div>
        <div class="mb-2">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($student['email']) ?>">
        </div>
        <button class="btn btn-success" type="submit">Update</button>
        <a href="index.php?entity=students" class="btn btn-secondary">Back</a>
    </form>
</div>
</body>
</html>