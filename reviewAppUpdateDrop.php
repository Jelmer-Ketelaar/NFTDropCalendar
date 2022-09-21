<?php
require 'connection.php';

if(isset($_GET['id'])){
    $id = base64_decode($_GET['id']);
    $discordMemberNumber = $_GET['discordMemberNumber'];
    $twitterFollowerAmount = $_GET['twitterFollowerAmount'];
    $hypedNumber = $_GET['hypedNumber'];

    $sql = "UPDATE projects SET updateStatus='', twitterFollowerNumber=?, discordMemberNumber=?, hypedNumber=? WHERE id=?";
	$conn->prepare($sql)->execute([$twitterFollowerAmount, $discordMemberNumber, $hypedNumber, $id]);
	

    header('Location:reviewApp.php?ww=Kingston02');
}