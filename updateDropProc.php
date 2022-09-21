<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require 'connection.php';

if(isset($_POST['id'])){
    $id = $_POST['id'];
    $idEnc = base64_encode($_POST['id']);
    $name = $_POST['projectName'];
    $blockchain = $_POST['blockchain'];
    $description = $_POST['projectDescription'];
    $roadmap = $_POST['roadmap'];
    $dropDate = $_POST['dropDate'];
    $mintPrice = $_POST['mintPrice'];
    $royality = $_POST['royality'];
    $supply = $_POST['supply'];
    $teamAmount = $_POST['teamAmount'];
	$twitterName = $_POST['twitterName'];
	$discordLink = $_POST['discordLink'];
	$websiteLink = $_POST['websiteLink'];
	$category = $_POST['inlineRadioOptions'];

    $sql = "UPDATE projects SET name=?, description=?, roadmap=?, blockchain=?, dropDate=?,category=?, mintPrice=?, royality=?, supply=?, teamAmount=?, twitterName=?, discordLink=?, websiteLink=?, updateStatus='true' WHERE id=?";
	$conn->prepare($sql)->execute([$name, $description, $roadmap, $blockchain, $dropDate, $category, $mintPrice, $royality, $supply, $teamAmount, $twitterName, $discordLink, $websiteLink, $id]);
	

    header('Location:nft.php?nft='.$name.'&id='.$idEnc);
}