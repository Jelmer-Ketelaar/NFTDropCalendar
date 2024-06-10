<?php
$seoTitle = 'NFTDropCalendar is an event calendar for the growing NFT industry!';
$seoDescription = 'List here your own NFT drop on our NFT Calendar!';
$page = 'create';
$paginanaam = 'List Drop';
require 'include/header.php'; ?>

<style>
    .img-fluid {
        height: auto;
        width: 100%;
    }
</style>

<div class="page-title">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-6">
                <div class="page-title-content">
                    <h3>NFT Drop</h3>
                    <p class="mb-2">List here your NFT<strong> Drop</strong><br>
                    <strong>DO NOT LIST YOUR PROJECT HERE</strong></p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="upload-item section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xxl-6 col-xl-6 col-lg-6">
                <h4 class="card-title mb-3">NFT Drop</h4>
                <div class="card">
                    <div class="card-body">
                        <!-- Form starts here -->
                        <form action="listingProces.php" method="POST" enctype="multipart/form-data" id="listingForm">
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <label class="form-label" for="projectNameInput">Project Name</label>
                                    <input class="form-control" name="projectName" type="text" required="required" maxlength="50" id="projectNameInput">
                                </div>
                                <div class="col-12">
                                    <div class="form-group mt-3">
                                        <label class="form-label" for="projectShortDesInput">Project Description</label>
                                        <textarea class="form-control" id="projectShortDesInput" name="projectDescription" placeholder="Description about the project" maxlength="750" cols="30" required="required" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group mt-3">
                                        <label class="form-label" for="selectBlockchain">Select Blockchain</label>
                                        <select name="blockchain" id="selectBlockchain" required="required">
                                            <option value="ethereum">Ethereum</option>
                                            <option value="solana">Solana</option>
                                            <option value="polygon">Polygon</option>
                                            <option value="cardano">Cardano</option>
                                            <option value="avalanche">Avalanche</option>
                                            <option value="binance">Binance</option>
                                            <option value="elrond">Elrond</option>
                                            <option value="arbitrum">Arbitrum</option>
                                            <option value="venom">Venom Foundation</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group mt-3">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="Fun" checked="">
                                            <label class="form-check-label" for="inlineRadio1">Fun</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="Metaverse">
                                            <label class="form-check-label" for="inlineRadio2">Metaverse</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="Artwork">
                                            <label class="form-check-label" for="inlineRadio3">Artwork</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <hr>
                                    <div class="input-group form-group">
                                        <div class="custom-file">
                                            <label class="custom-file-label" id="bannerLabel" for="inputGroupFile01">Choose project image (NO BANNER)</label>
                                            <input type="file" name="thumbnail" id="inputGroupFile01" accept="image/*" onchange="loadFile(event)" required="required">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group mt-3">
                                        <hr>
                                        <label>NFT public mint date:</label>
                                        <input type="datetime-local" id="birthdaytime" name="dropDate" required="required">
                                        <sub>Already dropped? <a style="color:blue;" href="listProject.php">here</a></sub>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <hr>
                                    <div class="form-group mt-3">
                                        <label class="form-label" for="traits">Traits</label>
                                        <input type="number" class="form-control" id="traits" name="traits" placeholder="Different Traits amount" step="1" required="required">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="roadmap">Roadmap:</label>
                                        <textarea class="form-control" id="roadmap" name="roadmap" placeholder="Q1: Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do Q2: eiusmod tempor incididunt ut labore et dolore magna aliqua Q3: enim ad minim veniam, quis nostrud exercitation ullamco Q4: laboris nisi ut aliquip ex ea commodo consequat" cols="30" rows="5" maxlength="4000" required="required"></textarea>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <hr>
                                    <div class="form-group">
                                        <label for="mintPrice">Mint Price</label>
                                        <input type="number" class="form-control" id="mintPrice" name="mintPrice" placeholder="Mint Price (ETH)" step=".0001" required="required">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <hr>
                                    <div class="form-group">
                                        <label for="royality">Royalty</label>
                                        <input type="number" class="form-control" id="royality" name="royality" placeholder="Royalty fee (%)" required="required">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <br>
                                    <div class="form-group">
                                        <label for="supply">NFT Supply</label>
                                        <input type="number" class="form-control" id="supply" name="supply" placeholder="NFT Supply (example 3333)" required="required">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <br>
                                    <div class="form-group">
                                        <label for="teamAmount">Team Size</label>
                                        <input type="number" class="form-control" id="teamAmount" name="teamAmount" placeholder="Team size" required="required">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <hr>
                                    <div class="form-group">
                                        <label for="twitterNameInput">Twitter Username</label>
                                        <input type="text" class="form-control" id="twitterNameInput" name="twitterName" placeholder="Twitter username (NO LINKS)" required="required">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <hr>
                                    <div class="form-group">
                                        <label for="discordNameInput">Discord Invite Link</label>
                                        <input type="text" class="form-control" id="discordNameInput" name="discordLink" placeholder="Discord invite link" required="required">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <hr>
                                    <div class="form-group">
                                        <label for="websiteLinkInput" class="form-label">Website Link</label>
                                        <input type="text" class="form-control" id="websiteLinkInput" name="websiteLink" placeholder="Website link" required="required">
                                    </div>
                                </div>
                                <input type="hidden" id="signature" name="signature" value="">
                                <div class="col-12">
                                    <hr>
                                    <div class="form-group mt-3">
                                        <label for="emailContact" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="emailContact" name="emailContact" placeholder="Email (only for contact, nobody can see)" required="required" maxlength="70">
                                    </div>
                                    <div class="form-group mt-3" style="border:3px solid #008AFF; border-radius:10px; padding:10px;">
                                        <h5 style="margin:4px; text-align:center;">Hype up/boost your Project +90.000 views!</h5>
                                        <p style="margin-bottom:4px; margin-top:4px; text-align:center; margin-left: 50px">
                                            Only <strong><span style="color:#008AFF;">4</span></strong>/8 Promotion Place open! <strong><strike id="normalPromoPrice">0.6ETH</strike><span id="promotePrice" style="margin-left: 10px">0.04ETH / 1.2 SOL</span></strong>
                                            <span id="countdownDiscount" style="color:#008AFF; font-size: 17px;"> 3:3:24</span>
                                        </p>
                                        <div class="form-check form-check-inline" style="margin-bottom:4px; margin-left: 2vw;">
                                            <input class="form-check-input" type="radio" name="promotionBox" id="promotionBox1" value="promote">
                                            <label class="form-check-label" for="promotionBox1">
                                                <p style="text-align:center;">Homepage promo, Listpage promo, Twitter Page Pin,<br>1 Week Full Promo, <strong>340%</strong> more hype on your project</p>
                                            </label>
                                        </div>
                                        <p style="text-align:center;">Easy pay through <strong>Web3</strong> wallet: Metamask, Phantom wallet, Formatic</p>
                                    </div>
                                    <div class="form-group mt-3">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="promotionBox" id="promotionBox2" value="promote2" checked="">
                                            <label class="form-check-label" for="promotionBox2">Listing on NFTDropCalendar <strong id="listingPrice"> FREE</strong></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <br>
                                <div class="alert alert-primary" role="alert" id="walletRequiredMessage" style="display:none;">
                                    DM us on twitter and we will give you a SOL address to send the crypto's to :) click
                                    <a href="https://twitter.com/DropCalendarNFT" target="_blank">@DropCalendarNFT </a>for our twitter
                                </div>
                                <div class="alert alert-danger" role="alert" id="declinedAlert" style="display:none;">
                                    You rejected the transaction, why? You want to explode, right? We are here for you!
                                </div>
                                <div class="alert alert-danger" role="alert" id="emptyAlert" style="display:none;">
                                    You rejected the transaction, why? You want to explode, right? We are here for you!
                                </div>
                            </div>
                            <div class="mt-3">
                                <button class="btn btn-primary w-100 mt-3 mt-sm-4" type="submit" id="btn-connect">List drop</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xxl-4 col-xl-4 col-lg-6">
                <div style="position: -webkit-sticky; /* Safari */ position: sticky; top: 0;">
                    <h4 class="card-title mb-3">Preview</h4>
                    <div class="card items">
                        <div class="card-body mt-4">
                            <div class="items-img position-relative image-over">
                                <img alt="" class="img-fluid rounded mb-3" src="img/items/1.jpg" id="projectImage">
                                <center>
                                    <!-- Author -->
                                    <div class="author">
                                        <div class="author-thumb avatar-lg">
                                            <img class="rounded-circle" id="blockchainLogo" src="img/extern_logo/crypto/ethereum.png" alt="">
                                        </div>
                                    </div>
                                </center>
                            </div>
                            <h4 class="mb-3" id="projectName">Project name</h4>
                            <p class="my-3" id="projectShortDes">Project description</p>
                            <hr>
                            <div class="social-icons justify-content-center my-3" style="display: block;" id="socialBtn">
                                <p><img id="twitterLogo" src="img/extern_logo/twitter_logo_white.png" style="width: 25px; height: 25px; visibility: visible;"> <span id="twitterName"></span></p>
                                <p><img id="discordLogo" src="img/extern_logo/discord_logo.jpg" style="width: 25px; height: 25px; visibility: visible;"> <span id="discordName"></span></p>
                                <p><img id="websiteLogo" src="img/extern_logo/link_icon.jpg" style="width: 25px; height: 25px; visibility: visible;"> <span id="websiteName"></span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="backgroundFade" onclick="closeModal()" style="visibility:hidden;position:fixed;top:0;z-index:8;width:200vw;height:200vh;background-color:#1f1f1f;opacity:0.5;"></div>

<div id="wallet-container" classs="container"
     style="visibility:hidden;background-color:rgb(39, 49, 56);width:46vw;height:46vh;position:sticky;z-index:9;left:50%;transform: translate(-50%, 0);border-radius:10px;position: fixed; top:25vh;">


    <div class="row" style="width: 90vw;">
        <div class="col-6"
             style="text-align: center;border: 1px solid grey; border-radius: 10px 0px 0px 0px;cursor: pointer;"
             onclick="metamask()">
            <img style="width:25%;padding-bottom:0px;" src="img/extern_logo/metamask_logo.png">
            <h3 style="line-height: 0;">MetaMask</h3>
            <p>Connect to your MetaMask Wallet</p>
            <br>
        </div>
        <!--<div class="col-6"-->
        <!--     style="text-align: center;border: 1px solid grey; border-radius: 0px 10px 0px 0px;cursor: pointer;"-->
        <!--     onclick="listTorus()">-->
        <!--    <img style="width:25%;" src="img/extern_logo/torus_logo.png">-->
        <!--    <h3 style="line-height: 0;">Torus</h3>-->
        <!--    <p style="margin-bottom:5px;">Signup for direct tansaction</p>-->
        <!--    <br>-->
        <!--</div>-->
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

<?php include "include/footer.php"; ?>

<script>
document.getElementById('listingForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the form from submitting traditionally

    var isPromotionSelected = document.getElementById('promotionBox1').checked;
    var formIsValid = validateForm(); // Check if the form is valid

    if (formIsValid) {
        if (isPromotionSelected) {
            // Show the Web3 wallet modal for promotional submissions
            document.getElementById('wallet-container').style.visibility = 'visible';
            document.getElementById('backgroundFade').style.visibility = 'visible';
        } else {
            // Submit the form normally if no promotion or free promotion is selected
            this.submit();
        }
    } else {
        alert('Please fill all required fields before submitting.');
        focusFirstInvalid();
    }
});

// Function to validate all required fields in the form
function validateForm() {
    var isValid = true;
    var inputs = document.querySelectorAll('#listingForm input[required], #listingForm textarea[required], #listingForm select[required]');

    inputs.forEach(function(input) {
        if (!input.value.trim()) {
            isValid = false;
            input.classList.add('is-invalid'); // Add an 'is-invalid' class to highlight the field
        } else {
            input.classList.remove('is-invalid');
        }
    });

    return isValid;
}

function focusFirstInvalid() {
    var firstInvalid = document.querySelector('.is-invalid');
    if (firstInvalid) {
        firstInvalid.focus();
    }
}

// Close modal function when clicking on the background fade
document.getElementById('backgroundFade').addEventListener('click', function() {
    document.getElementById('wallet-container').style.visibility = 'hidden';
    this.style.visibility = 'hidden';
});

let count = 11801;
const counter = setInterval(timer, 1000); //1000 will  run it every 1 second
  function timer() {
      count = count - 1;
        if (count === -1) {
          clearInterval(counter);
          return;
        }

        const seconds = count % 60;
        let minutes = Math.floor(count / 60);
        let hours = Math.floor(minutes / 60);
          minutes %= 60;
          hours %= 60;

          document.getElementById("countdownDiscount").innerHTML = ' ' + hours + ":" + minutes + ":" + seconds; // watch for spelling
}
</script>

<script src="js/data.js"></script>
<script src="https://unpkg.com/web3@latest/dist/web3.min.js"></script>
<script type="text/javascript" src="https://unpkg.com/web3modal"></script>
<script type="text/javascript" src="https://unpkg.com/@walletconnect/web3-provider"></script>
<script type="text/javascript" src="https://unpkg.com/fortmatic@2.0.6/dist/fortmatic.js"></script>
<script src="https://unpkg.com/@solana/web3.js@latest/lib/index.iife.min.js"></script>
<script src="js/wallet-check.js"></script>
