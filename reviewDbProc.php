<?php
require 'connection.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

if (isset($_POST['id']) && is_array($_POST['id'])) {
    $ids = $_POST['id'];
    $verifieds = $_POST['verified'];
    $names = $_POST['name'];
    $blockchains = $_POST['blockchain'];
    $dropDates = $_POST['dropDate'];
    $mintPrices = $_POST['mintPrice'];
    $royalties = $_POST['royality'] ?? array_fill(0, count($ids), 0); // Default to 0 if missing
    $supplies = $_POST['supply'];
    $teamAmounts = $_POST['teamAmount'];
    $twitterFollowerAmounts = $_POST['twitterFollowerNumber'];
    $discordMemberNumbers = $_POST['discordMemberNumber'];
    $promoteds = $_POST['promoted'];
    $twitterNames = $_POST['twitterName'];
    $discordLinks = $_POST['discordLink'];
    $websiteLinks = $_POST['websiteLink'];

    $sql = "UPDATE projects SET verified=?, name=?, blockchain=?, dropDate=?, mintPrice=?, royality=?, supply=?, teamAmount=?, twitterFollowerNumber=?, discordMemberNumber=?, promoted=?, twitterName=?, discordLink=?, websiteLink=? WHERE id=?";

    $stmt = $conn->prepare($sql);
    foreach ($ids as $index => $id) {
        $stmt->execute([
            $verifieds[$index], 
            $names[$index], 
            $blockchains[$index], 
            $dropDates[$index], 
            $mintPrices[$index], 
            $royalties[$index] ?: 0,  // Use default value 0 if null or empty
            $supplies[$index], 
            $teamAmounts[$index], 
            $twitterFollowerAmounts[$index], 
            $discordMemberNumbers[$index], 
            $promoteds[$index], 
            $twitterNames[$index], 
            $discordLinks[$index], 
            $websiteLinks[$index], 
            $id
        ]);
    }

    header('Location: reviewDb.php?ww=Jelmer01');
} else {
    echo "No data received or incorrect data format.";
}
