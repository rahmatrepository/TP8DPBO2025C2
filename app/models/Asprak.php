<?php
class Asprak {
    private $conn;
    public function __construct($conn) {
        $this->conn = $conn;
    }
    public function all() {
        return $this->conn->query("SELECT aspraks.*, students.name AS student_name FROM aspraks JOIN students ON aspraks.student_id = students.id");
    }
    public function find($id) {
        $stmt = $this->conn->prepare("SELECT * FROM aspraks WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
    public function create($student_id, $bidang, $tahun) {
        $stmt = $this->conn->prepare("INSERT INTO aspraks (student_id, bidang, tahun) VALUES (?, ?, ?)");
        $stmt->bind_param("isi", $student_id, $bidang, $tahun);
        return $stmt->execute();
    }
    public function update($id, $student_id, $bidang, $tahun) {
        $stmt = $this->conn->prepare("UPDATE aspraks SET student_id=?, bidang=?, tahun=? WHERE id=?");
        $stmt->bind_param("isii", $student_id, $bidang, $tahun, $id);
        return $stmt->execute();
    }
    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM aspraks WHERE id=?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}