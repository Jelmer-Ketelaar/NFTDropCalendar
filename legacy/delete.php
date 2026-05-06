<?php
require 'connection.php';

// Check if 'id' parameter is set in the GET request
if (isset($_GET['id'])) {
    $id = base64_decode($_GET['id']);

    try {
        // Start transaction
        $conn->beginTransaction();

        // Prepare and execute deletion from the first table
        $stmt1 = $conn->prepare("DELETE FROM projects WHERE id = ?");
        $stmt1->execute([$id]);

        // Prepare and execute deletion from the second table
        $stmt2 = $conn->prepare("DELETE FROM projectsExists WHERE id = ?");
        $stmt2->execute([$id]);

        // Commit the transaction
        $conn->commit();

        // Redirect after successful deletion
        header('Location: reviewApp.php?ww=Test');
    } catch (PDOException $e) {
        // Rollback transaction in case of error
        $conn->rollback();

        // Log error message
        error_log('Deletion failed: ' . $e->getMessage());

        // Redirect with an error status
        header('Location: reviewApp.php?status=error');
    }
} else {
    // Redirect with a status indicating missing ID parameter
    header('Location: reviewApp.php?status=missing-id');
}
?>
