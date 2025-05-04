<?php
require_once __DIR__ . '/../models/Student.php';
class StudentController {
    private $model;
    public function __construct($conn) {
        $this->model = new Student($conn);
    }
    public function index() {
        $students = $this->model->all();
        include __DIR__ . '/../views/students/index.php';
    }
    public function create() {
        include __DIR__ . '/../views/students/create.php';
    }
    public function store($data) {
        $this->model->create($data['name'], $data['nim'], $data['phone'], $data['join_date'], $data['email']);
        header("Location: /public/index.php?entity=students");
        exit;
    }
    public function edit($id) {
        $student = $this->model->find($id);
        include __DIR__ . '/../views/students/edit.php';
    }
    public function update($id, $data) {
        $this->model->update($id, $data['name'], $data['nim'], $data['phone'], $data['join_date'], $data['email']);
        header("Location: /public/index.php?entity=students");
        exit;
    }
    public function delete($id) {
        $this->model->delete($id);
        header("Location: /public/index.php?entity=students");
        exit;
    }
}
?>