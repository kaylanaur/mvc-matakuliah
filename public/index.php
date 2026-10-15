<?php
session_start();

require '../config/database.php';
require '../app/models/MataKuliah.php';
require '../app/controllers/MataKuliahController.php';

$db = (new Database())->connect();
$model = new MataKuliah($db);
$controller = new MataKuliahController($model);

$page = $_GET['page'] ?? 'matakuliah';
$action = $_GET['action'] ?? 'index';

if ($page !== 'matakuliah') {
    http_response_code(404);
    exit('Halaman tidak ditemukan.');
}

match ($action) {
    'index'  => $controller->index(),
    'create' => $controller->create(),
    'store'  => $controller->store(),
    'edit'   => $controller->edit(),
    'update' => $controller->update(),
    'delete' => $controller->delete(),
    default  => (function () {
        http_response_code(404);
        exit('Action tidak ditemukan.');
    })()
};
?>