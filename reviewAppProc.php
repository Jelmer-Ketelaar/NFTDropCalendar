<?php
require 'connection.php';

if(isset($_GET['id'])){
    $id = base64_decode($_GET['id']);
    $twitterFollowerAmount = $_GET['twitterFollowerAmount'];
    $discordMemberNumber = $_GET['discordMemberNumber'];
    $email = $_GET['email'];
	$thumbnail = $_GET['thumbnail'];
	$projectName = $_GET['projectName'];
	$projectDes = $_GET['projectDes'];
	$twitterName = $_GET['twitterName'];
	$discordLink = $_GET['discordLink'];

    $sql = "UPDATE projects SET verified='true', discordMemberNumber=?, twitterFollowerNumber=? WHERE id=?";
	$conn->prepare($sql)->execute([$discordMemberNumber, $twitterFollowerAmount, $id]);
	
// 	$getEmails = $conn->prepare("SELECT * FROM notify");
// 	$getEmails->execute();
// 	$getEmails = $getEmails->fetchAll(\PDO::FETCH_ASSOC);

//     $to = $email;
//     $subject = 'We verified your project | NFTDropCalendar';


    header('Location:reviewApp.php?ww=Test');
}