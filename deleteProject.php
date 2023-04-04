<?php 
require "connection.php";

if(isset($_GET['id'])){
        $idProject = base64_decode($_GET['id']);

        // sql to delete a record
        $sqlProjects = "DELETE FROM projectsExist WHERE id=".$idProject;
    
        // use exec() because no results are returned
        $conn->exec($sqlProjects);
        header('Location:reviewApp.php?ww=Test');
}
?>