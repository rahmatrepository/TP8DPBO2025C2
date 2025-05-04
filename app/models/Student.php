<?php
class Student {
    private $conn;
    public function __construct($conn) {
        $this->conn = $conn;
    }
    public function all() {
        return $this->conn->query("SELECT * FROM students");
    }
    public function find($id) {
        $stmt = $this->conn->prepare("SELECT * FROM students WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
    public function create($name, $nim, $phone, $join_date, $email) {
        $stmt = $this->conn->prepare("INSERT INTO students (name, nim, phone, join_date, email) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $name, $nim, $phone, $join_date, $email);
        return $stmt->execute();
    }
    public function update($id, $name, $nim, $phone, $join_date, $email) {
        $stmt = $this->conn->prepare("UPDATE students SET name=?, nim=?, phone=?, join_date=?, email=? WHERE id=?");
        $stmt->bind_param("sssssi", $name, $nim, $phone, $join_date, $email, $id);
        return $stmt->execute();
    }
    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM students WHERE id=?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>