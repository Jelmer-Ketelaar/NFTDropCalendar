<?php
require 'connection.php';

if(isset($_GET['id'])){
    $id = base64_decode($_GET['id']);

    // sql to delete a record
    $sql = "DELETE FROM projects WHERE id=".$id;

    // use exec() because no results are returned
    $conn->exec($sql);
    header('Location:reviewApp.php?ww=Test');
}
    if(isset($_GET['id'])){
        $idProject = base64_decode($_GET['id']);

        // sql to delete a record
        $sqlProjects = "DELETE FROM projectsExists WHERE id=".$idProject;
    
        // use exec() because no results are returned
        $conn->exec($sqlProjects);
        header('Location:reviewApp.php?ww=Test');
    }