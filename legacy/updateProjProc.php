<?php
declare(strict_types=1);

require 'connection.php';

$id = request_string($_POST, 'id');

if ($id === '' || !ctype_digit($id)) {
    redirect_to('update.php');
}

$idEnc = base64_encode($id);
$name = e(required_request_string($_POST, 'projectName'));
$blockchain = ensure_allowed_value(
    request_string($_POST, 'blockchain'),
    ['avalanche', 'cardano', 'ethereum', 'polygon', 'solana'],
    'blockchain',
);
$description = e(required_request_string($_POST, 'projectDescription'));
$roadmap = e(request_string($_POST, 'roadmap'));
$traits = e(request_string($_POST, 'traits'));
$floorPrice = e(request_string($_POST, 'floorPrice'));
$volume = e(request_string($_POST, 'volume'));
$royality = e(required_request_string($_POST, 'royality'));
$supply = e(required_request_string($_POST, 'supply'));
$teamAmount = e(required_request_string($_POST, 'teamAmount'));
$twitterName = normalize_twitter_username(required_request_string($_POST, 'twitterName'));
$discordLink = normalize_external_url(required_request_string($_POST, 'discordLink'));
$websiteLink = normalize_external_url(required_request_string($_POST, 'websiteLink'));
$marketplaceLink = normalize_external_url(required_request_string($_POST, 'marketplaceLink'));
$emailContact = filter_var(required_request_string($_POST, 'emailContact'), FILTER_VALIDATE_EMAIL);
$category = ensure_allowed_value(
    request_string($_POST, 'inlineRadioOptions'),
    ['Artwork', 'Fun', 'Metaverse'],
    'category',
);

if ($twitterName === '') {
    respond_with_error('Invalid Twitter username.');
}

if ($discordLink === '' || $websiteLink === '' || $marketplaceLink === '') {
    respond_with_error('Invalid URL.');
}

if ($emailContact === false) {
    respond_with_error('Invalid email address.');
}

$sql = "UPDATE projectsExist
    SET name = ?,
        description = ?,
        roadmap = ?,
        blockchain = ?,
        traits = ?,
        volume = ?,
        category = ?,
        floorPrice = ?,
        royality = ?,
        supply = ?,
        teamAmount = ?,
        twitterName = ?,
        discordLink = ?,
        websiteLink = ?,
        marketplaceLink = ?,
        emailContact = ?,
        updateStatus = 'true'
    WHERE id = ?";

$conn->prepare($sql)->execute([
    $name,
    $description,
    $roadmap,
    $blockchain,
    $traits,
    $volume,
    $category,
    $floorPrice,
    $royality,
    $supply,
    $teamAmount,
    $twitterName,
    $discordLink,
    $websiteLink,
    $marketplaceLink,
    $emailContact,
    (int) $id,
]);

redirect_to('project.php?nft=' . urlencode($name) . '&id=' . $idEnc);
