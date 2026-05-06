<?php 
require "connection.php";

if (isset($_GET['id'])) {
    $idProject = base64_decode($_GET['id']);

    // sql to delete a record using prepared statements
    $sqlProjects = "DELETE FROM projectsExist WHERE id = ?";
    $stmt = $conn->prepare($sqlProjects);
    
    try {
        // Execute the prepared statement with the parameter
        $stmt->execute([$idProject]);
        // Redirect after successful deletion
        header('Location: reviewApp.php?status=deleted');
    } catch (PDOException $e) {
        // Handle SQL errors or failures
        error_log('Deletion failed: ' . $e->getMessage());
        header('Location: reviewApp.php?status=error');
    }
} else {
    // Handle the case where ID is not set
    header('Location: reviewApp.php?status=missing-id');
}
?>
