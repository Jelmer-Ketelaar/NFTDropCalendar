<?php
declare(strict_types=1);

require 'connection.php';

$id = decoded_id($_GET['id'] ?? null);

if ($id === null) {
    redirect_to('index.php');
}

$getProject = $conn->prepare('SELECT * FROM projects WHERE id = :id');
$getProject->execute([':id' => $id]);
$project = $getProject->fetch(PDO::FETCH_ASSOC);

if (!$project) {
    redirect_to('index.php');
}

$getProjectsOther = $conn->query("SELECT * FROM projects WHERE verified = 'true' ORDER BY RAND() LIMIT 9");
$projectsOther = $getProjectsOther->fetchAll(PDO::FETCH_ASSOC);
