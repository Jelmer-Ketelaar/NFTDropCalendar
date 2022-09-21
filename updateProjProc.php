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
    $traits = $_POST['traits'];
    $floorPrice = $_POST['floorPrice'];
    $volume = $_POST['volume'];
    $royality = $_POST['royality'];
    $supply = $_POST['supply'];
    $teamAmount = $_POST['teamAmount'];
	$twitterName = $_POST['twitterName'];
	$discordLink = $_POST['discordLink'];
	$websiteLink = $_POST['websiteLink'];
	$marketplaceLink = $_POST['marketplaceLink'];
	$emailContact = $_POST['emailContact'];
	$category = $_POST['inlineRadioOptions'];

    $sql = "UPDATE projectsExist SET name=?, description=?, roadmap=?, blockchain=?, traits=?, volume=?, category=?, floorPrice=?, royality=?, supply=?, teamAmount=?, twitterName=?, discordLink=?, websiteLink=?, marketplaceLink=?, emailContact=?, updateStatus='true' WHERE id=?";
	$conn->prepare($sql)->execute([$name, $description, $roadmap, $blockchain, $traits, $volume, $category, $floorPrice, $royality, $supply, $teamAmount, $twitterName, $discordLink, $websiteLink, $marketplaceLink, $emailContact, $id]);
	

    header('Location:project.php?nft='.$name.'&id='.$idEnc);
}