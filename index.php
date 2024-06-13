<?php
require 'connection.php';
 $paginanaam = 'Home';
        require "include/header.php";
$seoTitle = 'NFTDropCalender: Explore all NFTs Drops';
$seoDescription = 'Explore the verified NFT drops on NFTDropCalender, a pro view of that are NFTs about to drop! ✓ A new NFT calendar ';

$max_loop = 0;
$getProjects = $conn->prepare("SELECT * FROM projects WHERE verified = 'true' ORDER BY rand()");
        $getProjects->execute();
        $projects = $getProjects->fetchAll(\PDO::FETCH_ASSOC);

$getBanner = $conn->query("SELECT * FROM projects WHERE banner != 'null' ORDER BY dropDate");
$banner = $getBanner->fetch(\PDO::FETCH_ASSOC);

$getBannerLong = $conn->query("SELECT * FROM projects WHERE bannerPicture != 'null' ORDER BY dropDate");
$bannerLong = $getBanner->fetch(\PDO::FETCH_ASSOC);

$getProjectsPaid = $conn->prepare("SELECT * FROM projects WHERE verified = 'true' AND promoted = 'promote' ORDER BY rand()");
        $getProjectsPaid->execute();
        $projectsPaid = $getProjectsPaid->fetchAll(\PDO::FETCH_ASSOC);
        
$getProjectsExistPaid = $conn->prepare("SELECT * FROM projectsExist WHERE verified = 'true' AND promoted = 'promote' ORDER BY rand()");
        $getProjectsExistPaid->execute();
        $projectsExistPaid = $getProjectsExistPaid->fetchAll(\PDO::FETCH_ASSOC);
        
$getAllProjects = $conn->prepare("SELECT * FROM projectsExist WHERE verified = 'true' AND promoted = 'promote' OR promoted ='promote2'");

?>
<link href="css/banner.css" rel="stylesheet">
<style>
 
</style>

<div class="intro1 section-padding">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-xl-5 col-lg-6 col-12">
                <div class="intro-content  my-5">
                    <h1 class="mb-3">Discover<span> extraordinary NFTs</span></h1>
                    <div class="intro-btn mt-5">
                        <a class="btn btn-outline-primary" href="exploreDrops.php">Explore Drops</a>
                        <a class="btn btn-outline-primary" href="exploreProject.php">Explore Projects</a>
                    </div>
                </div>
            </div>
            
            <div class="col-xl-5 col-lg-6 col-12">
                <a href="prices.php" target="_blank">
                    <a href="nft.php?id=<?php echo base64_encode($banner['id']); ?>" target="_blank">
                    <div class="intro-slider">
                        <div class="slider-item">
                            <!--<img alt=""class="image-fluid rounded" id="image-fluid" style="height: 350px;" src="img/items/Nftdropcalendar.png">-->
                            <img alt="<?php echo $banner['name'] ?>" class="image-fluid rounded" id="image-fluid" style="height: 350px;" src="<?php echo ($banner['thumbnail']) ?>">
                            <!--<img alt=""class="image-fluid rounded" id="image-fluid" style="height: 350px;"src="<?php echo ($banner['thumbnail']) ?>">-->
                            </a>
                            <a href="nft.php?id=<?php echo base64_encode($banner['id']); ?>" target="_blank">
                            <div class="slider-item-avatar">
                                <!--<img alt="" src="img/items/Nftdropcalendar.png">-->
                                <img alt="<?php echo $banner['name'] ?>" src="<?php echo ($banner['thumbnail']) ?>">
                                <div>
                                    <!--<h5>Preview of Name. Get your project here for 0.1ETH</h5>-->
                                    <!--<h5>Frenchie Frens</h5>--> 
                                    <h5><?php echo $banner['name'] ?></h5>
                                    <!--<p>This is a preview of a description. You can get your project here for 0.1ETH</p>-->
                                    <p><?php echo mb_strimwidth($banner['description'], 0, 150, "..."); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    </a>
            </div>
        </div>
    </div>
</div>


<div class="notable-drops section-padding bg-light triangle-top-light triangle-bottom-light" id="NFT-DROPS">
    <div class="container">
         <div class="section-padding">
 <center>
     <a href="prices.php" target="_blank">
     <img alt="banner" style="" class="CoverPhoto"
          src="banner.png">
        </a>
 </center>
 </div>
        <div class="row">
            <div class="col-xl-12">
              <div class="intro d-flex justify-content-between align-items-end m-0">
                        <div class="intro-content">
                            <h1 class="mt-3 mb-0">Promotion Drops</h1>
                        </div>
                    </div>
            </div>
        <div class="swiper-container">
            <div class="row">
                <?php $i = 0; ?>
                <?php foreach ($projectsPaid as $project) {
                             $dropTijd = strtotime(explode("T", $project['dropDate'])[0].' '.explode("T", $project['dropDate'])[1]);
                            $nuTijd = strtotime(date('Y-m-d h:m:s'));
                    if (++$i > 8) {
                        break;    /* You could also write 'break 1;' here. */
                    } ?>
                    <div class="col-xl-3 col-lg-6 col-md-6">
                        <a href="nft.php?id=<?php echo base64_encode($project['id']); ?>" target="_blank">
                        <div class="card" style="background-color: inherit; max-height: 700px; min-height: 500px; object-fit: cover; box-shadow: 5px 5px rgba(253, 156, 46, 0.7),
              10px 10px rgba(253, 156, 46, 0.5),
              15px 15px rgba(253, 156, 46, 0.3),
              20px 20px rgba(253, 156, 46, 0.2),
              25px 25px rgba(253, 156, 46, 0.1);">
                            <img alt="<?php echo $project['name']?>" class="img-fluid card-img-top" src="<?php echo $project['thumbnail'] ?>">
                            <div class="sample">
                                <div class="ribbon down" style="--color: #fd9c2e;">
                                    <div class="content">
                                     <svg width="24px" height="24px" aria-hidden="true" focusable="false" data-prefix="far" data-icon="star" class="svg-inline--fa fa-star fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                         <path fill="currentColor" d="M528.1 171.5L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6zM388.6 312.3l23.7 138.4L288 385.4l-124.3 65.3 23.7-138.4-100.6-98 139-20.2 62.2-126 62.2 126 139 20.2-100.6 98z"></path>
                                    </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body" style="background-color: inherit;">
                                <div class="notable-drops-content-img"></div>
                                    <div class="countdown-times mb-3">
                            <?php if ($dropTijd > $nuTijd) {?>
                                            <div class="countdown-times mb-3">
                                                <div class='countdown d-flex justify-content-center'
                                                     data-date="<?php echo explode("T", $project['dropDate'])[0]; ?>"
                                                     data-time="<?php echo explode("T", $project['dropDate'])[1]; ?>">
                                                </div>
                                            </div>
                            <?php } else { ?>
                                <center>
                                    <div class="ribbon-wrapper"><div class="glow">&nbsp;</div>
                            		<div class="ribbon-front">
                            			LIVE
                            		</div>
                            		<div class="ribbon-edge-topleft"></div>
                            		<div class="ribbon-edge-topright"></div>
                            		<div class="ribbon-edge-bottomleft"></div>
                            		<div class="ribbon-edge-bottomright"></div>
                            	</div>
                                </center>
                            <?php } ?>
                            </div>
                                <h4 class="card-title"><?php echo $project['name'] ?></h4>
                                <p><?php echo mb_strimwidth($project['description'], 0, 80, "..."); ?> </p>
                                <div class="card-bottom d-flex justify-content-between" >
                                                <span><img src='img/extern_logo/twitter_logo.png'
                                                           style='width:40px;' alt"twitter"> <?php echo $project['twitterFollowerNumber']; ?></span>
                                                <span><img src='img/extern_logo/crypto/<?php echo $project['blockchain']; ?>.png'
                                                           style='width:30px;' alt"blockchain"></span>
                                                <span><img src='img/extern_logo/discord_logo.png'
                                                           style='width:35px;' alt"discord"> <?php echo $project['discordMemberNumber']; ?></span>
                                            </div>
                                <a href="nft.php?id=<?php echo base64_encode($project['id']); ?>">Check this NFT</a>
                            </div>
                        </div>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
        <div class="row">
            <div class="col-xl-12">
              <div class="intro d-flex justify-content-between align-items-end m-0">
                        <div class="intro-content">
                            <h1 class="mt-3 mb-0">Promotion Projects</h1>
                        </div>
                    </div>
        </div>
        <div class="swiper-container">
            <div class="row">
                <?php $i = 0; ?>
                <?php foreach ($projectsExistPaid as $projectExist) {
                    if (++$i > 4) {
                        break;    /* You could also write 'break 1;' here. */
                    } ?>
                    <div class="col-xl-3 col-lg-6 col-md-6">
                        <a href="project.php?id=<?php echo base64_encode($projectExist['id']); ?>" target="_blank">
                        <div class="card" style="max-height: 700px; min-height: 500px; object-fit: cover; box-shadow: 5px 5px rgba(253, 156, 46, 0.7),
              10px 10px rgba(253, 156, 46, 0.5),
              15px 15px rgba(253, 156, 46, 0.3),
              20px 20px rgba(253, 156, 46, 0.2),
              25px 25px rgba(253, 156, 46, 0.1);"><strong style="position:absolute;color:white;margin:5px;text-shadow: 1px 0 0 #000, 0 -1px 0 #000, 0 1px 0 #000, -1px 0 0 #000;"><?php echo $projectExist['floorPrice'] ?></strong><img alt="<?php echo $projectExist['name'] ?>" class="img-fluid card-img-top" src="<?php echo $projectExist['thumbnail'] ?>">
                        <div class="sample">
                            <div class="ribbon down" style="--color: #fd9c2e;">
                              <div class="content">
                                <svg width="24px" height="24px" aria-hidden="true" focusable="false" data-prefix="far" data-icon="star" class="svg-inline--fa fa-star fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                  <path fill="currentColor" d="M528.1 171.5L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6zM388.6 312.3l23.7 138.4L288 385.4l-124.3 65.3 23.7-138.4-100.6-98 139-20.2 62.2-126 62.2 126 139 20.2-100.6 98z"></path>
                                </svg>
                              </div>
                            </div>
                          </div>
                            <div class="card-body">
                                <div class="notable-drops-content-img"></div>
                                 <div class="countdown-times mb-3">
                            
                            </div>
                                <h4 class="card-title"><?php echo $projectExist['name'] ?></h4>
                                <p><?php echo mb_strimwidth($projectExist['description'], 0, 80, "..."); ?> </p>
                                <div class="card-bottom d-flex justify-content-between" >
                                                <span><img src='img/extern_logo/twitter_logo.png'
                                                           style='width:40px;' alt"twitter"> <?php echo $projectExist['twitterFollowerNumber']; ?></span>
                                                <span><img src='img/extern_logo/crypto/<?php echo $projectExist['blockchain']; ?>.png'
                                                           style='width:30px;' alt"blockchain"></span>
                                                <span><img src='img/extern_logo/discord_logo.png'
                                                           style='width:35px;' alt"discord"> <?php echo $projectExist['discordMemberNumber']; ?></span>
                                            </div>
                                <a href="project.php?id=<?php echo base64_encode($projectExist['id']); ?>">Check this NFT</a>
                            </div>
                        </div>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

<div class="container">
        <div class="row">
            <div class="col-xl-12">
              <div class="intro d-flex justify-content-between align-items-end m-0">
                        <div class="intro-content">
                            <span>NFT Drops</span>
                            <h1 class="mt-3 mb-0">NFT Drops</h3>
                        </div>
                        <div class="intro-btn">
                            <a class="btn content-btn" href="exploreDrops.php" style='padding: 0;
    font-weight: 600;
    color: var(--primary-t-color);
    background: transparent;
    -webkit-box-shadow: none;
    box-shadow: none;
    padding-right: 15px;'>View All</a>
                        </div>
                    </div>
        </div>
        <div class="swiper-container">
            <div class="row">
                <?php $i = 0; 
                 foreach ($projects as $project) {
                            $dropTijd = strtotime(explode("T", $project['dropDate'])[0].' '.explode("T", $project['dropDate'])[1]);
                            $nuTijd = strtotime(date('Y-m-d h:m:s'));
                    if (++$i > 4) {
                        break;    /* You could also write 'break 1;' here. */
                    } ?>
                    <div class="col-xl-3 col-lg-6 col-md-6">
 <?php if($project['promoted'] == 'promote') {?>
                                <div class="card" style=" max-height: 700px; min-height: 500px; object-fit: cover; box-shadow: 5px 5px rgba(253, 156, 46, 0.7),
              10px 10px rgba(253, 156, 46, 0.5),
              15px 15px rgba(253, 156, 46, 0.3),
              20px 20px rgba(253, 156, 46, 0.2),
              25px 25px rgba(253, 156, 46, 0.1); ">
                                    <?php } else {?>
                                    <div class="card" style=" max-height: 700px; min-height: 500px; ">
                                        <?php } ?><img alt="<?php echo $project['name'] ?>" class="img-fluid card-img-top" style="max-height: 256px; max-width: 256px; min-height: 256px; object-fit: cover;" src="<?php echo $project['thumbnail'] ?>">
                            <div class="card-body">
                                <div class="notable-drops-content-img"></div>
                                 <div class="countdown-times mb-3">
                            <?php if ($dropTijd > $nuTijd) {?>
                           <div class="countdown-times mb-3">
                                                <div class='countdown d-flex justify-content-center'
                                                     data-date="<?php echo explode("T", $project['dropDate'])[0]; ?>"
                                                     data-time="<?php echo explode("T", $project['dropDate'])[1]; ?>">
                                                </div>
                                            </div>
                            <?php } else { ?>
                                <center>
                                    <div class="ribbon-wrapper"><div class="glow">&nbsp;</div>
                            		<div class="ribbon-front">
                            			LIVE
                            		</div>
                            		<div class="ribbon-edge-topleft"></div>
                            		<div class="ribbon-edge-topright"></div>
                            		<div class="ribbon-edge-bottomleft"></div>
                            		<div class="ribbon-edge-bottomright"></div>
                            	</div>
                                </center>
                            <?php } ?>
                            </div>
                                <h4 class="card-title"><?php echo $project['name'] ?></h4>
                                <p><?php echo mb_strimwidth($project['description'], 0, 80, "..."); ?> </p>
                                <div class="card-bottom d-flex justify-content-between" >
                                                <span><img src='img/extern_logo/twitter_logo.png'
                                                           style='width:40px;' alt"twitter"> <?php echo $project['twitterFollowerNumber']; ?></span>
                                                <span><img src='img/extern_logo/crypto/<?php echo $project['blockchain']; ?>.png'
                                                           style='width:30px;' alt"blockchain"></span>
                                                <span><img src='img/extern_logo/discord_logo.png'
                                                           style='width:35px;' alt"discord"> <?php echo $project['discordMemberNumber']; ?></span>
                                            </div>
                                <a href="nft.php?id=<?php echo base64_encode($project['id']); ?>">Check this NFT</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>


<div class="notable-drops section-padding" id="NFT-DROPS">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="section-title text-center">
                    <h2>Why Choose NFTDropCalendar</h2>
                    <p>Discover the benefits of using NFTDropCalendar</p>
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="create-sell-content">
                    <div class="create-sell-content-icon"><i class="fas fa-shield-check"></i></div>
                    <div>
                        <h4>Verified Projects</h4>
                        <p>All projects and drops on NFTDropCalendar are verified and legitimate, ensuring a safe and reliable experience for users.</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="create-sell-content">
                    <div class="create-sell-content-icon"><i class="fas fa-info-circle"></i></div>
                    <div>
                        <h4>Comprehensive Information</h4>
                        <p>NFTDropCalendar provides all the necessary information and tools for users to stay informed and make informed decisions.</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="create-sell-content">
                    <div class="create-sell-content-icon"><i class="fas fa-bullhorn"></i></div>
                    <div>
                        <h4>Promote Your Project</h4>
                                               <p>Listing your own NFT project or drop on NFTDropCalendar will give it extra visibility and reach through our newsletter and social media channels.</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="create-sell-content">
                    <div class="create-sell-content-icon"><i class="fas fa-dollar-sign"></i></div>
                    <div>
                        <h4>Free to Use</h4>
                        <p>NFTDropCalendar is completely free to use for users, with a small fee for listing projects or drops.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
<?php require 'include/footer.php'; ?>
<script src="./js/scripts.js"></script>






