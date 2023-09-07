<?php
require 'connection.php';

if (isset($_GET['id'])) {
    $id = base64_decode($_GET['id']);

    if (!is_numeric($id)) {
        header('Location: index.php');
        exit();
    }

    $getProject = $conn->prepare("SELECT * FROM projects WHERE id = :id");
    $getProject->bindParam(':id', $id, PDO::PARAM_INT);
    $getProject->execute();
    $project = $getProject->fetch(PDO::FETCH_ASSOC);

    if (!$project) {
        header('Location: index.php');
        exit();
    }
} else {
    header('Location: index.php');
    exit();
}

$getProjectsOther = $conn->query("SELECT * FROM projects WHERE verified = 'true' ORDER BY RAND() LIMIT 9");
$projectsOther = $getProjectsOther->fetchAll(PDO::FETCH_ASSOC);
?>
