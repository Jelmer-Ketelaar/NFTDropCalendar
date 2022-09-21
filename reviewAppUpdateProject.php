<?php
require 'connection.php';

if(isset($_GET['id'])){
    $id = base64_decode($_GET['id']);
    $discordMemberNumber = $_GET['discordMemberNumber'];
    $twitterFollowerAmount = $_GET['twitterFollowerNumber'];

    $sql = "UPDATE projectsExist SET updateStatus='', twitterFollowerNumber=?, discordMemberNumber=? WHERE id=?";
	$conn->prepare($sql)->execute([$twitterFollowerAmount, $discordMemberNumber, $id]);
	

    header('Location:reviewApp.php?ww=Kingston02');
}