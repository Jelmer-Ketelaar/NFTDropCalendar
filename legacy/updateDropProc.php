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
$dropDate = e(request_string($_POST, 'dropDate'));
$mintPrice = e(request_string($_POST, 'mintPrice'));
$royality = e(required_request_string($_POST, 'royality'));
$supply = e(required_request_string($_POST, 'supply'));
$teamAmount = e(required_request_string($_POST, 'teamAmount'));
$twitterName = normalize_twitter_username(required_request_string($_POST, 'twitterName'));
$discordLink = normalize_external_url(required_request_string($_POST, 'discordLink'));
$websiteLink = normalize_external_url(required_request_string($_POST, 'websiteLink'));
$category = ensure_allowed_value(
    request_string($_POST, 'inlineRadioOptions'),
    ['Artwork', 'Fun', 'Metaverse'],
    'category',
);

if ($twitterName === '') {
    respond_with_error('Invalid Twitter username.');
}

if ($discordLink === '' || $websiteLink === '') {
    respond_with_error('Invalid URL.');
}

$sql = "UPDATE projects
    SET name = ?,
        description = ?,
        roadmap = ?,
        blockchain = ?,
        dropDate = ?,
        category = ?,
        mintPrice = ?,
        royality = ?,
        supply = ?,
        teamAmount = ?,
        twitterName = ?,
        discordLink = ?,
        websiteLink = ?,
        updateStatus = 'true'
    WHERE id = ?";

$conn->prepare($sql)->execute([
    $name,
    $description,
    $roadmap,
    $blockchain,
    $dropDate,
    $category,
    $mintPrice,
    $royality,
    $supply,
    $teamAmount,
    $twitterName,
    $discordLink,
    $websiteLink,
    (int)$id,
]);

redirect_to('nft.php?nft=' . urlencode($name) . '&id=' . $idEnc);
