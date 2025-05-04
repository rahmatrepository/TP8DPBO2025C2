<?php
require_once "../config/connection.php";
$entity = $_GET['entity'] ?? 'students';
$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null;

if ($entity == 'students') {
    require_once "../app/controllers/StudentController.php";
    $controller = new StudentController($conn);
    if ($action == 'index') $controller->index();
    elseif ($action == 'create') $controller->create();
    elseif ($action == 'store' && $_SERVER['REQUEST_METHOD'] == 'POST') $controller->store($_POST);
    elseif ($action == 'edit' && $id) $controller->edit($id);
    elseif ($action == 'update' && $id && $_SERVER['REQUEST_METHOD'] == 'POST') $controller->update($id, $_POST);
    elseif ($action == 'delete' && $id) $controller->delete($id);
    else $controller->index();
} elseif ($entity == 'aspraks') {
    require_once "../app/controllers/AsprakController.php";
    $controller = new AsprakController($conn);
    if ($action == 'index') $controller->index();
    elseif ($action == 'create') $controller->create();
    elseif ($action == 'store' && $_SERVER['REQUEST_METHOD'] == 'POST') $controller->store($_POST);
    elseif ($action == 'edit' && $id) $controller->edit($id);
    elseif ($action == 'update' && $id && $_SERVER['REQUEST_METHOD'] == 'POST') $controller->update($id, $_POST);
    elseif ($action == 'delete' && $id) $controller->delete($id);
    else $controller->index();
} else {
    echo "404 Not Found";
}
?>