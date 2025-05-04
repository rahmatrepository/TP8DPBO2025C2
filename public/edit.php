<?php
include "connection.php";
$id = "";
$name = "";
$nim = "";
$phone = "";
$join_date = "";

$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == 'GET') {
    if (!isset($_GET['id'])) {
        header("location: index.php");
        exit;
    }
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM students WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if (!$row) {
        header("location: index.php");
        exit;
    }
    $name = $row["name"];
    $nim = $row["nim"];
    $phone = $row["phone"];
    $join_date = $row["join_date"];
} else if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $id = intval($_POST["id"]);
    $name = trim($_POST["name"]);
    $nim = trim($_POST["nim"]);
    $phone = trim($_POST["phone"]);
    $join_date = $_POST["join_date"];

    if ($name == "" || $nim == "" || $phone == "" || $join_date == "") {
        $error = "All fields are required!";
    } else {
        $sql = "UPDATE students SET name=?, nim=?, phone=?, join_date=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssi", $name, $nim, $phone, $join_date, $id);
        if ($stmt->execute()) {
            $success = "Data updated successfully!";
            header("location: index.php");
            exit;
        } else {
            $error = "Update failed!";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Ubah</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap.min.css">
  <script src="jquery.min.js"></script>
  <script src="popper.min.js"></script>
  <script src="bootstrap.min.js"></script>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">Students</a>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="col-lg-6 m-auto">
    <form method="post">
      <br><br>
      <div class="card">
        <div class="card-header bg-warning">
          <h1 class="text-white text-center"> Update Student </h1>
        </div><br>
        <?php if ($error): ?>
          <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>" class="form-control"> <br>
        <label> NAME: </label>
        <input type="text" name="name" value="<?php echo htmlspecialchars($name); ?>" class="form-control"> <br>
        <label> NIM: </label>
        <input type="text" name="nim" value="<?php echo htmlspecialchars($nim); ?>" class="form-control"> <br>
        <label> PHONE: </label>
        <input type="text" name="phone" value="<?php echo htmlspecialchars($phone); ?>" class="form-control"> <br>
        <label> JOIN DATE: </label>
        <input type="date" name="join_date" value="<?php echo htmlspecialchars($join_date); ?>" class="form-control"> <br>
        <button class="btn btn-success" type="submit" name="submit"> Submit </button><br>
        <a class="btn btn-info" href="index.php"> Cancel </a><br>
      </div>
    </form>
  </div>
</body>
</html>