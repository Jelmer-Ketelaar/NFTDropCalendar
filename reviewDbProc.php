<?php
require 'connection.php';



if(isset($_POST['id'])){
$id = $_POST['id'];
$verified = $_POST['verified'];
$name = $_POST['name'];
$blockchain = $_POST['blockchain'];
$dropDate = $_POST['dropDate'];
$mintPrice = $_POST['mintPrice'];
$royality = $_POST['royality'];
$supply = $_POST['supply'];
$teamAmount = $_POST['teamAmount'];
$twitterFollowerAmount = $_POST['twitterFollowerNumber'];
$discordMemberNumber = $_POST['discordMemberNumber'];
$promoted = $_POST['promoted'];
$twitterName = $_POST['twitterName'];
$discordLink = $_POST['discordLink'];
$websiteLink = $_POST['websiteLink'];



$sql = "UPDATE projects SET verified=?, name=?, blockchain=?, dropDate=?, mintPrice=?, royality=?, supply=?, teamAmount=?, twitterFollowerNumber=?, discordMemberNumber=?, promoted=?, twitterName=?, discordLink=?, websiteLink=? WHERE id=?";
$conn->prepare($sql)->execute([$verified, $name, $blockchain, $dropDate, $mintPrice, $royality, $supply, $teamAmount, $twitterFollowerAmount, $discordMemberNumber, $promoted, $twitterName, $discordLink, $websiteLink, $id]);



header('Location:reviewDb.php?ww=Jelmer01');
}