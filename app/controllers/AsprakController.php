<?php
require_once __DIR__ . '/../models/Asprak.php';
require_once __DIR__ . '/../models/Student.php';
class AsprakController {
    private $model;
    private $studentModel;
    public function __construct($conn) {
        $this->model = new Asprak($conn);
        $this->studentModel = new Student($conn);
    }
    public function index() {
        $aspraks = $this->model->all();
        include __DIR__ . '/../views/aspraks/index.php';
    }
    public function create() {
        $students = $this->studentModel->all();
        include __DIR__ . '/../views/aspraks/create.php';
    }
    public function store($data) {
        $this->model->create($data['student_id'], $data['bidang'], $data['tahun']);
        header("Location: /public/index.php?entity=aspraks");
        exit;
    }
    public function edit($id) {
        $asprak = $this->model->find($id);
        $students = $this->studentModel->all();
        include __DIR__ . '/../views/aspraks/edit.php';
    }
    public function update($id, $data) {
        $this->model->update($id, $data['student_id'], $data['bidang'], $data['tahun']);
        header("Location: /public/index.php?entity=aspraks");
        exit;
    }
    public function delete($id) {
        $this->model->delete($id);
        header("Location: /public/index.php?entity=aspraks");
        exit;
    }
}
?>