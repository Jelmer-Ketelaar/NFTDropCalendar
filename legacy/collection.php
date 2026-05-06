<?php
declare(strict_types=1);

$seoTitle = 'NFTDropCalendar: All Drops';
$seoDescription = 'Find all drops on NFTDropCalendar, see a quick preview of all .';
$page = 'quick';
$paginanaam = 'Collections';
require 'connection.php';
require 'include/header.php';

$blockchains = [
    'ethereum' => 'Ethereum',
    'binance' => 'Binance',
    'cardano' => 'Cardano',
];

$blockchain = request_string($_GET, 'blockchain');
if (!array_key_exists($blockchain, $blockchains)) {
    $blockchain = '';
}

$promotedCondition = "verified = 'true' AND promoted IN ('promote', 'promote1', 'promote2', 'promote3')";
$params = [];

if ($blockchain !== '') {
    $promotedCondition .= ' AND blockchain = :blockchain';
    $params[':blockchain'] = $blockchain;
}

$projectsStatement = $conn->prepare('SELECT * FROM projects WHERE ' . $promotedCondition);
$projectsStatement->execute($params);
$projects = $projectsStatement->fetchAll(PDO::FETCH_ASSOC);

$listedProjectsStatement = $conn->prepare('SELECT * FROM projectsExist WHERE ' . $promotedCondition);
$listedProjectsStatement->execute($params);
$projectsListed = $listedProjectsStatement->fetchAll(PDO::FETCH_ASSOC);

?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

<div class="collections section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="filter-tab">
                    <div class="mb-4">
                        <form method="GET">
                            <select name="blockchain" onchange="this.form.submit()">
                                <option value="">All Blockchains</option>
                                <?php foreach ($blockchains as $value => $label): ?>
                                    <option
                                        value="<?php echo e($value); ?>" <?php if ($value === $blockchain) echo 'selected'; ?>><?php echo e($label); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </form>
                    </div>
                    <div class="row">
                        <?php foreach ($projects as $project) { ?>
                            <div class="col-xxl-3 col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                <div class="card items">
                                    <div class="card-body">
                                        <div class="items-img position-relative">
                                            <a href="nft.php?id=<?php echo base64_encode($project['id']); ?>"
                                               target="_blank">
                                                <img class="avatar-lg" src="<?php echo $project["thumbnail"] ?>"
                                                     style="min-width:90px;height:90px;" alt="">
                                            </a>
                                        </div>
                                        <a href="nft.php?id=<?php echo base64_encode($project['id']); ?>"
                                           target="_blank">
                                            <h4 class="mt-0 mb-2"><?php echo $project['name']; ?></h4>
                                        </a>

                                        <div class="d-flex justify-content-between">
                                            <div class="text-start">
                                                <p class="mb-lg-n2"><?php echo mb_strimwidth($project['description'], 0, 80, "..."); ?></p>
                                                <h5 class="text-muted">3h 1m 50s</h5>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center mt-3">
                                            <a href="nft.php?id=<?php echo base64_encode($project['id']); ?>">
                                                <i class="fas fa-icon-name"></i> <?php echo ucfirst($project['blockchain']) ?>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="./js/scripts.js"></script>
