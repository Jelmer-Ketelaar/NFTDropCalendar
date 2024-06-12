<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'projectGetInfo.php';

$seoTitle = $project['name'] . ' - NFTDropCalender.info';
$seoDescription = $project['description'];
$page = 'explore';
$titleOg = $project['name'];
$beschrijving = $project['description'];
$img = 'http://localhost/NFT-Calander/package/documents/' . $project['thumbnail'];
?> <title><?php echo $project['name'] ?> | NFTDropCalendar</title> <?php
$paginanaam = 'Project';
require 'include/header.php';?>

<style>
   .img-fluid {
    min-height: 350px;
    max-height: 400px;
    width: auto;
}

.alert {
  padding: 20px;
  background-color: #f44336;
  color: white;
  opacity: 1;
  transition: opacity 0.6s;
  margin-bottom: 15px;
}

.alert.warning {
    background-color: #ff9800;
    width: 50%;
}
</style>
<div class="item-single section-padding">
    <?php if($project['verified'] == 'false') { ?>
<center>
<div class="alert warning">
  <strong>Alert!</strong><br> Your project is private for now. We still need investigate everything and manually fill in some data before your project is public. We will do the investigation as soon as possible! (This will not take long)
</div>
</center>
<?php } ?>
    <div class="container">
        <div class="row">
            <div class="col-xxl-12">
                <div class="top-bid">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <img alt="..." class="img-fluid rounded"
                                     src="<?php echo $project['thumbnail'] ?>"></div>
                            <div class="col-md-6">
                                <h3 class="mb-3"><?php echo $project['name']; ?></h3>
                                <hr>
                                <ul class="list-unstyled">
                                    <li class="price d-flex justify-content-between">
                                        <h4 style="color: #adacad;">Total Trading Volume: <strong
                                                    class="text-primary"><?php echo $project['volume']; if($project['ethChoice'] === 'eth') { echo 'ETH';} if($project['ethChoice'] === 'matic') { echo 'MATIC';} if($project['ethChoice'] === 'solana') { echo 'SOL';}?> </strong></h4>
                                        <span></span>
                                    </li>
                                    <li class="price d-flex justify-content-between">
                                        <h4 style="color: #adacad;">Collection Supply: <strong class="text-primary"
                                                    ><?php echo $project['supply'];?></strong></h4>
                                    </li>
                                    <li class="price d-flex justify-content-between">
                                        <h4 style="color: #adacad;">Marketplace Link:
                                            <strong class="text-primary">
                                                <a href="<?php echo $project['marketplaceLink']; ?>">Visit Marketplace</a>
                                            </strong>
                                        </h4>
                                    </li>
                                    <li class="price d-flex justify-content-between">
                                        <h4 style="color: #adacad;">Total Traits: <strong class="text-primary">
                                            <?php echo $project['traits'];?></strong></h4>
                                    </li>
                                    <li class="price d-flex justify-content-between">
                                        <h4 style="color: #adacad;">Floor Price: <strong class="text-primary">
                                            <?php echo $project['floorPrice']; if($project['ethChoice'] === 'eth') { echo 'ETH';} if($project['ethChoice'] === 'matic') { echo 'MATIC';} if($project['ethChoice'] === 'solana') { echo 'SOL';}?></strong></h4>
                                    </li>
                                </ul>
                                <hr>
                                <div class="row items">
                                    <div class="col-12 item px-lg-2">
                                        <h4 class="mt-0 mb-2" style="color: #adacad;">Description:</h4>
                                        <div class="price d-flex justify-content-between align-items-center">
                                            <?php echo nl2br($project['description']); ?>
                                        </div>
                                </div>

                                <div class='row items'>
                                <hr>
                                    <div class="col-12 item px-lg-2">
                                        <div class="card no-hover">
                                            <h4 class="mt-0 mb-2">Roadmap</h4>
                                            <div class="price d-flex justify-content-between align-items-center">
                                                <pre><?php echo $project["roadmap"];?></pre>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row items">
                                    <div class="col-4 item px-lg-2">
                                        <div class="card no-hover">
                                            <h4 class="mt-0 mb-2">Royalty:</h4>
                                            <div class="price d-flex justify-content-between align-items-center">
                                                <?php echo $project['royality']; ?>%
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4 item px-lg-2">
                                        <div class="card no-hover">
                                            <h4 class="mt-0 mb-2" >Team:</h4>
                                            <div class="price d-flex justify-content-between align-items-center">
                                                <?php echo $project['teamAmount']; ?> people
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4 item px-lg-2">
                                        <div class="card no-hover">
                                            <h4 class="mt-0 mb-2" >Category:</h4>
                                            <div class="price d-flex justify-content-between align-items-center">
                                                <?php echo $project['category']; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <a class="d-block btn btn-bordered-white mt-4" target="_blank"
                                   href="https://twitter.com/<?php echo $project['twitterName']; ?>" data-dnt="true"
                                   data-show-count="false" style="color: gray">
                                    <img src='img/extern_logo/twitter_logo.png' style='width:25px;'>
                                    Follow <?php echo $project['twitterName']; ?></a>
                                <a class="d-block btn btn-bordered mt-4" target="_blank"
                                   href="<?php echo $project['discordLink']; ?>" data-dnt="true"
                                   data-show-count="false" style="color: gray">
                                    <img src='img/extern_logo/discord_logo.png' style='width:25px;'> Discord
                                    server</a>
                                 <a class="d-block btn btn-bordered mt-4" target="_blank"
                                   href="<?php echo $project['websiteLink']; ?>" data-dnt="true"
                                   data-show-count="false" style="color: gray">
                                    <img src='img/extern_logo/link_icon.jpg' style='width:25px;'> Website
                                    Link</a>
                                    <div class="section-padding"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "include/footer.php" ?>

<script src="./vendor/jquery/jquery.min.js"></script>
<script src="./vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="./js/scripts.js"></script>

</body>
</html>