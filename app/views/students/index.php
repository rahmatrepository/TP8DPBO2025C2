<!DOCTYPE html>
<html>
<head>
    <title>Students</title>
    <link rel="stylesheet" href="/tp_mvc/public/assets/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h2>Students</h2>
    <a href="index.php?entity=students&action=create" class="btn btn-primary mb-2">Add Student</a>
    <table class="table table-bordered">
        <tr>
            <th>ID</th><th>Name</th><th>NIM</th><th>Phone</th><th>Join Date</th><th>Email</th><th>Action</th>
        </tr>
        <?php while($row = $students->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= htmlspecialchars($row['name']) ?></td>
            <td><?= htmlspecialchars($row['nim']) ?></td>
            <td><?= htmlspecialchars($row['phone']) ?></td>
            <td><?= htmlspecialchars($row['join_date']) ?></td>
            <td><?= htmlspecialchars($row['email']) ?></td>
            <td>
                <a href="index.php?entity=students&action=edit&id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="index.php?entity=students&action=delete&id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete?')">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
    <a href="index.php?entity=aspraks" class="btn btn-info">Lihat Asprak</a>
</div>
</body>
</html>