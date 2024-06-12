<?php
require 'connection.php';

// Check if the necessary 'id' is set in the GET request.
if (isset($_GET['id'])) {
    // Decode the base64-encoded ID and sanitize incoming data.
    $id = base64_decode($_GET['id']);
    $discordMemberNumber = filter_input(INPUT_GET, 'discordMemberNumber', FILTER_SANITIZE_NUMBER_INT);
    $twitterFollowerAmount = filter_input(INPUT_GET, 'twitterFollowerNumber', FILTER_SANITIZE_NUMBER_INT);

    // Prepare the SQL statement to update the database.
    $sql = "UPDATE projectsExist SET updateStatus='', twitterFollowerNumber=?, discordMemberNumber=? WHERE id=?";

    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute([$twitterFollowerAmount, $discordMemberNumber, $id]);
        
        // Redirect to the review application page with a query parameter.
        header('Location: reviewApp.php?ww=Test');
        exit(); // Ensure no further script execution after redirect
    } catch (PDOException $e) {
        // Optionally log this error to a file or a database
        error_log($e->getMessage());

        // Provide a user-friendly message or redirect to an error page.
        die('An error occurred while updating the project. Please try again.');
    }
} else {
    // Redirect or handle the error if 'id' is not set
    die('Required parameters are not provided.');
}
?>
