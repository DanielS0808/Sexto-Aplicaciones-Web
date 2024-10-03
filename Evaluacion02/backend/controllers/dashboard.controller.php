<?php
require_once('../config/config.php');
header('Content-Type: application/json');

$op = $_GET['op'];

if ($op === 'total_asistentes') {
    $sql = "SELECT COUNT(*) as total FROM asistentes";
    $result = mysqli_query($con, $sql);
    $data = mysqli_fetch_assoc($result);
    echo json_encode($data['total']);
}

if ($op === 'total_conferencias') {
    $sql = "SELECT COUNT(*) as total FROM conferencias";
    $result = mysqli_query($con, $sql);
    $data = mysqli_fetch_assoc($result);
    echo json_encode($data['total']);
}