<?php
$seoTitle = 'NFTDropCalendar: Update your NFT';
$seoDescription = 'Update your own NFT';
$page = '';
$paginanaam = 'Update';
require 'include/header.php';
require 'connection.php';


if(!isset($_GET['drop']) && !isset($_GET['project'])){
    $getDrops = $conn->prepare("SELECT * FROM projects WHERE verified = 'true' ORDER BY dropDate");
    $getDrops->execute();
    $drops = $getDrops->fetchAll(\PDO::FETCH_ASSOC);
    
    $getProjects = $conn->prepare("SELECT * FROM projectsExist WHERE verified = 'true' ORDER BY dateUploadDropUser");
    $getProjects->execute();
    $projects = $getProjects->fetchAll(\PDO::FETCH_ASSOC);
    
    $nft = ['name'=>'Project Title', 'description'=>'Project Description', 'thumbnail'=>'img/content/auction_2.jpg', 'blockchain'=>'ethereum'];
} else {
    if($_GET['drop'] != 'none'){
        $dropId = base64_decode($_GET['drop']);
        $getNft = $conn->prepare("SELECT * FROM projects WHERE id = ".$dropId);
        $getNft->execute();
        $nft = $getNft->fetch();
    }
    if($_GET['project'] != 'none'){
        $projectId = base64_decode($_GET['project']);
        $getNft = $conn->prepare("SELECT * FROM projectsExist WHERE id = ".$projectId);
        $getNft->execute();
        $nft = $getNft->fetch();
    }
}

?>


  
    <style>
        #listing {
            position: absolute;
            margin-top: -100000px;
            visibility: hidden;
        }
    </style>
    <!-- ***** Create Area Start ***** -->
    <section class="author-area section-padding">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-12 col-md-4">
                    <!-- Author Profile -->
                    <div class="card no-hover text-center" style='position: sticky; top:15vh;'>
                        <div class="image-over">
                            <img class="card-img-top" id='projectImage' src="<?php echo $nft['thumbnail']; ?>" alt="">
                            <!-- Author -->
                            <div class="author">
                                <div class="author-thumb avatar-lg">
                                    <img class="rounded-circle" id='blockchainLogo'
                                         src="img/extern_logo/crypto/<?php echo $nft['blockchain']; ?>.png" alt="">
                                </div>
                            </div>
                        </div>
                        <!-- Card Caption -->
                        <div class="card-caption col-12 p-0">
                            <!-- Card Body -->
                            <div class="card-body mt-4">
                                <h5 class="mb-3" id='projectNameInput'><?php echo $nft['name']; ?></h5>
                                <p class="my-3" id='projectShortDesInput'><?php echo $nft['description']?></p>
                                <hr>
                                <div class="social-icons justify-content-center my-3" style='display:none;'
                                     id='socialBtn'>
                                    <p><img id='twitterLogo' src='img/extern_logo/twitter_logo_white.png'
                                            style='width:25px;height:25px;visibility:hidden;'> <span
                                                id='twitterName'></span></p>
                                    <p><img id='discordLogo' src='img/extern_logo/discord_logo_white.png'
                                            style='width:25px;height:25px;visibility:hidden;'> <span
                                                id='discordName'></span></p>
                                    <p><img id='websiteLogo' src='img/extern_logo/link_icon_white.png'
                                            style='width:25px;height:25px;visibility:hidden;'> <span
                                                id='websiteName'></span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-7">
                    <!-- Intro -->
                    <div class="intro mt-5 mt-lg-0 mb-4 mb-lg-5">
                        <div class="intro-content">
                            <span>Update your own NFT drop/project</span>
                            <h3 class="mt-3 mb-0">NFT Collection</h3>
                        </div>
                    </div>
                    <?php if(isset($_GET['drop']) && $_GET['drop'] != 'none'){ ?>
                    <!-- Item Form -->
                    <form class="item-form card no-hover" id='listingForm' action='updateDropProc.php' method='POST'
                          enctype="multipart/form-data">
                        <input type='hidden' name='id' value="<?php echo $nft['id']; ?>">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mt-3">
                                    <label>Name:</label>
                                    <input type="text" class="form-control" id='projectNameInput' name="projectName"
                                           placeholder="Project name" required="required" value="<?php echo $nft['name']; ?>" maxlength="25">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group mt-3">
                                    <label>Description:</label>
                                    <textarea class="form-control" id='projectShortDesInput' name="projectDescription"
                                              placeholder="Description about the project" maxlength='750' cols="30"
                                              required="required" rows="3"><?php echo $nft['description']; ?></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group mt-3">
                                    <label>Blockchain:</label>
                                    <select name="blockchain" id="selectBlockchain">
                                        <option value="ethereum" <?php if($nft['blockchain'] == 'ethereum'){ ?> selected<?php } ?>>Ethereum</option>
                                        <option value="solana" <?php if($nft['blockchain'] == 'solana'){ ?> selected<?php } ?>>Solana</option>
                                        <option value="polygon" <?php if($nft['blockchain'] == 'polygon'){ ?> selected<?php } ?>>Polygon</option>
                                        <option value="cardano" <?php if($nft['blockchain'] == 'cardano'){ ?> selected<?php } ?>>Cardano</option>
                                        <option value="avalanche" <?php if($nft['blockchain'] == 'avalanche'){ ?> selected<?php } ?>>Avalanche</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group mt-3">
                                    <hr>
                                    <label>Category:</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                               id="inlineRadio1" value="Fun" <?php if($nft['category'] == 'Fun'){ ?> checked<?php } ?>>
                                        <label class="form-check-label" for="inlineRadio1">Fun</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                               id="inlineRadio2" value="Metaverse" <?php if($nft['category'] == 'Metaverse'){ ?> checked<?php } ?>>
                                        <label class="form-check-label" for="inlineRadio2">Metaverse</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                               id="inlineRadio3" value="Artwork" <?php if($nft['category'] == 'Artwork'){ ?> checked<?php } ?>>
                                        <label class="form-check-label" for="inlineRadio3">Artwork</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <hr>
                                <div class="form-group mt-3">
                                    <label>NFT public mint date:</label>
                                    <input type="datetime-local" style="'color:white;'" id="birthdaytime"
                                           name="dropDate" value='<?php echo $nft['dropDate']; ?>'>
                                </div>
                            </div>
                            <div class="col-12">
                                <hr>
                                <div class="form-group">
                                    <label>Roadmap:</label>
                                    <textarea class="form-control" id='roadmap' name="roadmap" placeholder="2022 Q1: Creating NFTGenie coin to make things easier
2022 Q2: Some plans to do in the future
2022 Q3: Some bright and cool things that are gonna be huge
2022 Q4: Some more plans etc
(summary of your roadmap)
                                        
                                        " cols="30" rows="5" maxlength='2000'><?php echo $nft['roadmap']; ?></textarea>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <hr>
                                <label>Mint Price:</label>
                                <div class="form-group">
                                    <input type="number" class="form-control" id='mintPrice' name="mintPrice"
                                           placeholder="Mint Price (ETH)" step=".0001" value="<?php echo $nft['mintPrice']; ?>">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <hr>
                                <label>Royalty:</label>
                                <div class="form-group">
                                    <input type="float" class="form-control" id='royality' name="royality"
                                           placeholder="Royalty fee (%)" value="<?php echo $nft['royality']; ?>" required="required">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <label>Supply:</label>
                                <div class="form-group">
                                    <input type="number" class="form-control" id='supply' name='supply'
                                           placeholder="NFT Supply (example 3333)" value="<?php echo $nft['supply']; ?>" required="required">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <label>Team Size:</label>
                                <div class="form-group">
                                    <input type="number" class="form-control" id='teamAmount' name="teamAmount"
                                           placeholder="Team size " value="<?php echo $nft['teamAmount']; ?>" required="required">
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <hr>
                                <label>Twitter Name:</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" id='twitterNameInput' name="twitterName"
                                           placeholder="Twitter username" value="<?php echo $nft['twitterName']; ?>" required="required">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <hr>
                                <label>Discord Invite Link:</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" id='discordNameInput' name="discordLink"
                                           placeholder="Discord invite link" value="<?php echo $nft['discordLink']; ?>" required="required">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <br>
                                <label>Website Link:</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" id='websiteLinkInput' name="websiteLink"
                                           placeholder="Website link" value="<?php echo $nft['websiteLink']; ?>" required="required">
                                </div>
                            </div>
                            <input type="hidden" id='signature' name='signature' value=''>
                            <div class="col-12">
                                <hr>
                                <label>Email:</label>
                                <div class="form-group mt-3">
                                    <input type="email" class="form-control" id='emailContact' name="emailContact"
                                           placeholder="Email (only for contact, nobody can see)" required="required" value="<?php echo $nft['emailContact']; ?>"
                                           maxlength="70">
  
                                    <div class="form-group mt-3">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="promotionBox"
                                                   id="promotionBox2" value="promote2" checked>
                                            <label class="form-check-label" for="promotionBox2">Update drop + Hypednumber, followers, discord members check.
                                                <strong id='listingPrice'> FREE </strong></label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <hr>
                                <b>Make sure you pay with the SAME wallet so we can verify that it is you.</b>
                                <button class="btn btn-primary w-100 mt-3 mt-sm-4" type="submit" id="btn-connect">Update Drop</button>
                            </div>
                            <div class="col-12">
                                <br>
                                <div class="alert alert-primary" role="alert" id='walletRequiredMessage'
                                     style='display:none;'>
                                    DM us on twitter and we will give you a ETH address to send the crypto's to :) click
                                    <a href='https://twitter.com/NFTGenie' target="_blank">@DropCalendarNFT </a>for our twitter
                                </div>
                                <div class="alert alert-danger" role="alert" id='declinedAlert' style='display:none;'>
                                    You rejected the transaction, why? you want to explode, right? We are here for you!
                                </div>
                                <div class="alert alert-danger" role="alert" id='emptyAlert' style='display:none;'>
                                    You rejected the transaction, why? you want to explode, right? We are here for you!
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php } elseif(isset($_GET['project']) && $_GET['project'] != 'none') { ?>
                            <form class="item-form card no-hover" id='listingForm' action='updateProjProc.php' method='POST' enctype="multipart/form-data">
                            <div class="row">
                                <input type='hidden' name='id' value="<?php echo $nft['id']; ?>">
                                <div class="col-12">
                                    <div class="form-group mt-3">
                                        <input type="text" class="form-control" id='projectNameInput' name="projectName" placeholder="Project name" value='<?php echo $nft['name']; ?>' required="required" maxlength="25">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group mt-3">
                                        <textarea class="form-control" id='projectShortDesInput' name="projectDescription" placeholder="Description about the project" maxlength='750' cols="30" required="required" rows="3"><?php echo $nft['description']; ?></textarea>
                                    </div>
                                </div>
                            <div class="col-12">
                                <div class="form-group mt-3">
                                    <select name="blockchain" id="selectBlockchain">
                                        <option value="ethereum" <?php if($nft['blockchain'] == 'ethereum'){ ?> selected<?php } ?>>Ethereum</option>
                                        <option value="solana" <?php if($nft['blockchain'] == 'solana'){ ?> selected<?php } ?>>Solana</option>
                                        <option value="polygon" <?php if($nft['blockchain'] == 'polygon'){ ?> selected<?php } ?>>Polygon</option>
                                        <option value="cardano" <?php if($nft['blockchain'] == 'cardano'){ ?> selected<?php } ?>>Cardano</option>
                                        <option value="avalanche" <?php if($nft['blockchain'] == 'avalanche'){ ?> selected<?php } ?>>Avalanche</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group mt-3">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                               id="inlineRadio1" value="Fun" <?php if($nft['category'] == 'Fun'){ ?> checked<?php } ?>>
                                        <label class="form-check-label" for="inlineRadio1">Fun</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                               id="inlineRadio2" value="Metaverse" <?php if($nft['category'] == 'Metaverse'){ ?> checked<?php } ?>>
                                        <label class="form-check-label" for="inlineRadio2">Metaverse</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                               id="inlineRadio3" value="Artwork" <?php if($nft['category'] == 'Artwork'){ ?> checked<?php } ?>>
                                        <label class="form-check-label" for="inlineRadio3">Artwork</label>
                                    </div>
                                </div>
                            </div>

                                <div class="col-12 col-md-6">
                                    <div class="form-group mt-3">
                                        <input type="number" class="form-control" id='traits' name="traits" value='<?php echo $nft['traits']; ?>' placeholder="Diffrent Traits amount" step="1">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group mt-3">
                                        <input type="number" class="form-control" id='floorPrice' name="floorPrice" value='<?php echo $nft['floorPrice']; ?>' placeholder="Current Floor-price" step="0.00001">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Roadmap:</label>
                                        <textarea class="form-control" id='roadmap' name="roadmap" placeholder="2022 Q1: Creating NFTGenie coin to make things easier
2022 Q2: Some plans to do in the future
2022 Q3: Some bright and cool things that are gonna be huge
2022 Q4: Some more plans etc
(summary of your roadmap)
                                        
                                        " cols="30" rows="5" maxlength='2000'><?php echo $nft['roadmap']; ?></textarea>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <input type="number" class="form-control" id='volumeTxt' name="volume" value='<?php echo $nft['volume']; ?>' placeholder="Volume traded (ETH)" step=".0001">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <input type="float" class="form-control" id='royality' name="royality" value='<?php echo $nft['royality']; ?>' placeholder="Royalty fee (%)" required="required">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <input type="number" class="form-control" id='supply' name='supply' value='<?php echo $nft['supply']; ?>' placeholder="NFT Supply (example 3333)" required="required">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <input type="number" class="form-control" id='teamAmount' name="teamAmount" value='<?php echo $nft['teamAmount']; ?>' placeholder="Team size " required="required">
                                    </div>
                                </div>
                                
                                <div class="col-12 col-md-6">
                                <hr>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id='twitterNameInput' name="twitterName" value='<?php echo $nft['twitterName']; ?>' placeholder="Twitter username" required="required">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                <hr>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id='discordNameInput' name="discordLink" value='<?php echo $nft['discordLink']; ?>' placeholder="Discord invite link" required="required">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id='websiteLinkInput' name="websiteLink" value='<?php echo $nft['websiteLink']; ?>' placeholder="Website link" required="required">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id='marketplaceLink' name="marketplaceLink" value='<?php echo $nft['marketplaceLink']; ?>' placeholder="Marketplace link" required="required">
                                    </div>
                                </div>
                                <input type="hidden" id='signature' name='signature' value=''>
                                <div class="col-12">
                                <hr>
                                    <div class="form-group mt-3">
                                        <input type="email" class="form-control" id='emailContact' name="emailContact" value='<?php echo $nft['emailContact']; ?>' placeholder="Email (only for contact, nobody can see)" required="required" maxlength="70">
                                        
                                        <div class="form-group mt-3">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="promotionBox"
                                                       id="promotionBox2" value="promote2" checked>
                                                <label class="form-check-label" for="promotionBox2">Update project + Hypednumber, followers, discord members check.
                                                    <strong id='listingPrice'> FREE</strong></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    Make sure you pay with the SAME wallet so we can verify that it is you.
                                    <button class="btn w-100 mt-3 mt-sm-4" type="submit" id="btn-connectProj">Update project</button>
                                </div>
                                <div class="col-12">
                                    <br>
                                    <div class="alert alert-primary" role="alert" id='walletRequiredMessage'
                                         style='display:none;'>
                                        DM us on twitter and we will give you a SOL address to send the crypto's to :) click
                                        <a href='https://twitter.com/NFTGenie' target="_blank">@NFTGenie </a>for our twitter
                                    </div>
                                    <div class="alert alert-danger" role="alert" id='declinedAlert' style='display:none;'>
                                        You rejected the transaction, why? you want to explode, right? We are here for you!
                                    </div>
                                    <div class="alert alert-danger" role="alert" id='emptyAlert' style='display:none;'>
                                        You rejected the transaction, why? you want to explode, right? We are here for you!
                                    </div>
                                </div>
                            </div>
                        </form>
                    <?php } else { ?>
                        <form class="item-form card no-hover" action='update.php' method='GET'>
                            <div class="form-group mt-3">
                                <label>Only for drops (that have a mint date):</label>
                                <br>
                                <select name="drop" id="selectBlockchain">
                                    <option value="none">Search your Drop:</option>
                                    <?php foreach($drops as $drop){  ?>
                                        <option value="<?php echo base64_encode($drop['id']); ?>"><?php echo $drop['name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <label>Only for projects that already dropped:</label>
                                <br>
                                <select name="project" id="selectBlockchain">
                                    <option value="none">Search your Project:</option>
                                    <?php foreach($projects as $project){  ?>
                                        <option value="<?php echo base64_encode($project['id']); ?>"><?php echo $project['name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        <button class="btn w-100 mt-3 mt-sm-4" type="submit" id="btn-connect">Get the info</button>
                    </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
    <div class="section-padding"></div>

    <div id="backgroundFade" onclick="closeModal()"
         style="visibility:hidden;position:fixed;top:0;z-index:8;width:200vw;height:200vh;background-color:#1f1f1f;opacity:0.5;"></div>

    <div id="wallet-containter" classs="container"
         style="visibility:hidden;background-color:rgb(39, 49, 56);width:46vw;height:46vh;position:sticky;z-index:9;left:50%;transform: translate(-50%, 0);border-radius:10px;position: fixed; top:25vh;">

        <div class="row">
            <div class="col-6"
                 style="text-align: center;border: 1px solid grey; border-radius: 10px 0px 0px 0px;cursor: pointer;"
                 onclick="metamask()">
                <img style="width:25%;padding-bottom:0px;" src="img/extern_logo/metamask_logo.png">
                <h3 style="line-height: 0;">MetaMask</h3>
                <p>Connect to your MetaMask Wallet</p>
                <br>
            </div>
            <div class="col-6"
                 style="text-align: center;border: 1px solid grey; border-radius: 0px 10px 0px 0px;cursor: pointer;"
                 onclick="walletC()">
                <img style="width:25%;" src="img/extern_logo/torus_logo.png">
                <h3 style="line-height: 0;">Torus</h3>
                <p style="margin-bottom:5px;">Signup for direct tansaction</p>
                <br>
            </div>
        </div>
        <div class="row">
            <div class="col-6"
                 style="text-align: center;border: 1px solid grey; border-radius: 0px 0px 0px 10px;cursor: pointer;"
                 onclick="tijdelijkePhantom()">
                <img style="width:25%;padding-bottom:0px;" src="img/extern_logo/phantom_logo.png">
                <h3 style="line-height: 0;">PhantomWallet</h3>
                <p>Connect to your Solana Wallet</p>
                <br>
            </div>
            <div class="col-6"
                 style="text-align: center;border: 1px solid grey; border-radius: 0px 0px 10px 0px;cursor: pointer;"
                 onclick="formaticW()">
                <img style="width:25%;padding-bottom:0px;" src="img/extern_logo/formatic_logo.png">
                <h3 style="line-height: 0;">Formatic</h3>
                <p>Connect to your Formatic Wallet</p>
                <br>
            </div>
        </div>
    </div>

<!-- ***** Create Area End ***** -->
<script src="https://cdn.jsdelivr.net/npm/@toruslabs/torus-embed"></script>
<script src="https://cdn.jsdelivr.net/gh/ethereum/web3.js@1.0.0-beta.34/dist/web3.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fortmatic@latest/dist/fortmatic.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@walletconnect/web3-provider@1.7.1/dist/umd/index.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/web3@latest/dist/web3.min.js"></script>
<script src="https://unpkg.com/@solana/web3.js@latest/lib/index.iife.js"></script>
<script src="https://unpkg.com/web3@latest/dist/web3.min.js"></script>
<script type="text/javascript" src="https://unpkg.com/web3modal"></script>
<script type="text/javascript" src="https://unpkg.com/evm-chains/lib/index.js"></script>
<script type="text/javascript" src="https://unpkg.com/@walletconnect/web3-provider"></script>
<script type="text/javascript" src="https://unpkg.com/fortmatic@2.0.6/dist/fortmatic.js"></script>
<script src='assets/js/updateWallet.js'></script>
<?php if(!isset($_GET['drop']) && !isset($_GET['project'])){ ?>
<script src='assets/js/updateWalletProj.js'></script>
<?php } ?>
<script src='.../js/create.js'></script>

<script src="js/data.js"></script>


<script src="https://unpkg.com/web3@latest/dist/web3.min.js"></script>

<script type="text/javascript" src="https://unpkg.com/web3modal"></script>
<!--<script type="text/javascript" src="https://unpkg.com/evm-chains/lib/index.js"></script>-->
<script type="text/javascript" src="https://unpkg.com/@walletconnect/web3-provider"></script>
<script type="text/javascript" src="https://unpkg.com/fortmatic@2.0.6/dist/fortmatic.js"></script>
<script src="https://unpkg.com/@solana/web3.js@latest/lib/index.iife.min.js"></script>
<script src="js/wallet-check.js"></script>

<?php require 'include/footer.php'; ?>