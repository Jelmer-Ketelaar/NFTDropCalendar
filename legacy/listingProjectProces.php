<?php
declare(strict_types=1);

require 'connection.php';

$allowedBlockchains = [
    'arbitrum',
    'avalanche',
    'binance',
    'cardano',
    'elrond',
    'ethereum',
    'polygon',
    'solana',
    'venom',
];
$allowedCategories = ['Artwork', 'Fun', 'Metaverse'];
$allowedPromotions = ['promote', 'promote1', 'promote2', 'promote3'];

$projectName = e(required_request_string($_POST, 'projectName'));
$projectDescription = e(required_request_string($_POST, 'projectDescription'));
$blockchain = ensure_allowed_value(request_string($_POST, 'blockchain'), $allowedBlockchains, 'blockchain');
$category = ensure_allowed_value(request_string($_POST, 'inlineRadioOptions'), $allowedCategories, 'category');
$traits = e(required_request_string($_POST, 'traits'));
$floorPrice = e(required_request_string($_POST, 'floorPrice'));
$roadmap = e(required_request_string($_POST, 'roadmap'));
$volume = e(required_request_string($_POST, 'volume'));
$royality = e(required_request_string($_POST, 'royality'));
$supply = e(required_request_string($_POST, 'supply'));
$teamAmount = e(required_request_string($_POST, 'teamAmount'));
$twitterName = normalize_twitter_username(required_request_string($_POST, 'twitterName'));
$discordLink = normalize_external_url(required_request_string($_POST, 'discordLink'));
$websiteLink = normalize_external_url(required_request_string($_POST, 'websiteLink'));
$marketplaceLink = normalize_external_url(required_request_string($_POST, 'marketplaceLink'));
$emailContact = filter_var(required_request_string($_POST, 'emailContact'), FILTER_VALIDATE_EMAIL);
$signature = e(request_string($_POST, 'signature'));
$promoted = ensure_allowed_value(
    request_string($_POST, 'promotionBox', 'promote2'),
    $allowedPromotions,
    'promotionBox',
);
$filepath = uploaded_image_path('thumbnail');

if ($twitterName === '') {
    respond_with_error('Invalid Twitter username.');
}

if ($discordLink === '' || $websiteLink === '' || $marketplaceLink === '') {
    respond_with_error('Invalid URL.');
}

if ($emailContact === false) {
    respond_with_error('Invalid email address.');
}

if ($filepath === null) {
    respond_with_error('Please upload a valid image file.');
}

$twitterFollowerCount = fetch_twitter_follower_count($twitterName);
$discordMemberCount = 0;

$sql = 'INSERT INTO projectsExist(
    name,
    description,
    blockchain,
    category,
    thumbnail,
    traits,
    floorPrice,
    roadmap,
    volume,
    royality,
    supply,
    teamAmount,
    twitterName,
    discordLink,
    websiteLink,
    emailContact,
    discordMemberNumber,
    twitterFollowerNumber,
    signature,
    promoted,
    marketplaceLink
) VALUES (
    :projectName,
    :projectDescription,
    :blockchain,
    :category,
    :thumbnail,
    :traits,
    :floorPrice,
    :roadmap,
    :volume,
    :royality,
    :supply,
    :teamAmount,
    :twitterName,
    :discordLink,
    :websiteLink,
    :emailContact,
    :discordMemberCount,
    :twitterFollowerCount,
    :signature,
    :promoted,
    :marketplaceLink
)';

$statement = $conn->prepare($sql);
$statement->execute([
    ':projectName' => $projectName,
    ':projectDescription' => $projectDescription,
    ':blockchain' => $blockchain,
    ':category' => $category,
    ':thumbnail' => $filepath,
    ':traits' => $traits,
    ':floorPrice' => $floorPrice,
    ':roadmap' => $roadmap,
    ':volume' => $volume,
    ':royality' => $royality,
    ':supply' => $supply,
    ':teamAmount' => $teamAmount,
    ':twitterName' => $twitterName,
    ':discordLink' => $discordLink,
    ':websiteLink' => $websiteLink,
    ':emailContact' => $emailContact,
    ':discordMemberCount' => $discordMemberCount,
    ':twitterFollowerCount' => $twitterFollowerCount,
    ':signature' => $signature,
    ':promoted' => $promoted,
    ':marketplaceLink' => $marketplaceLink,
]);

redirect_to('project.php?id=' . base64_encode((string)$conn->lastInsertId()));
