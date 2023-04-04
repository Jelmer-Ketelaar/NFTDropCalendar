<?php
require 'connection.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// if (isset(
//     $_POST['projectName'],
//     $_POST['projectDescription'], $_POST['blockchain'],
//     $_POST['roadmap'],
//     $_POST['royality'],
//     $_POST['supply'], $_POST['teamAmount'],
//     $_POST['twitterName'], $_POST['discordLink'],
//     $_POST['websiteLink'], $_POST['signature'], $_POST['traits'])) {

    // Get all the upload data
    $projectName = htmlspecialchars($_POST['projectName']);
    $projectDescription =  htmlspecialchars($_POST['projectDescription']);
    $blockchain =  htmlspecialchars($_POST['blockchain']);
    $category =  htmlspecialchars($_POST['inlineRadioOptions']);
    $filename =  htmlspecialchars($_FILES['thumbnail']['name']);
    $filetype = $_FILES['thumbnail']['type'];
    $dropDate =  htmlspecialchars($_POST['dropDate']);
    $roadmap =  htmlspecialchars($_POST['roadmap']);
    $mintPrice =  htmlspecialchars($_POST['mintPrice']);
    $royality =  htmlspecialchars($_POST['royality']);
    $supply =  htmlspecialchars($_POST['supply']);
    $teamAmount =  htmlspecialchars($_POST['teamAmount']);
    $twitterName =  htmlspecialchars($_POST['twitterName']);
    $discordLink =  htmlspecialchars($_POST['discordLink']);
    $websiteLink =  htmlspecialchars($_POST['websiteLink']);
    $emailContact =  htmlspecialchars($_POST['emailContact']);
    $signature =  htmlspecialchars($_POST['signature']);
    $traits =  htmlspecialchars($_POST['traits']);
    $promoted =  htmlspecialchars($_POST['promotionBox']);
    // $promoted = 'promote2';

// if($category !== 'art' && $category !== 'fun' && $category !== 'metaverse' ) {
//         header('Location: index.php');
//         echo ("<script LANGUAGE='JavaScript'>
//     window.alert('We are sorry but something went wrong. Please contact us if you have paid!');
//     window.location.href='http://nftdropcalendar.info'; </script>");
// }

    if($blockchain !== 'ethereum' && $blockchain !== 'solana' && $blockchain !== 'polygon' && $blockchain !== 'cardano' ) {
            header('Location: index.php');
    }
    if (!str_contains($discordLink, 'http')) { 
        $discordLink = 'https://'.$discordLink;
    }

    if (str_contains($twitterName, 'https://twitter.com/')) { 
        $twitterName = explode("https://twitter.com/",$twitterName);
        $twitterName = $twitterName[1];
    }
    if (str_contains($twitterName, '@')) { 
        $twitterName = explode("@",$twitterName);
        $twitterName = $twitterName[1];
    }
    
    
    $data = file_get_contents('https://cdn.syndication.twimg.com/widgets/followbutton/info.json?screen_names='.$twitterName); 
    $parsed =  json_decode($data,true);
    
    if(isset($parsed[0]['followers_count'])){
        $twitterFollowerCount =  $parsed[0]['followers_count'];
    } else {
        $twitterFollowerCount = 0;
    }
    $discordMemberCount = 0;

    // Save image in folder
    if ($filetype === 'image/jpeg' || $filetype === 'image/png' || $filetype === 'image/gif' || $filetype === 'image/jpg') {
        $imageCreate = date("Y-m-d-H:i:s");
        move_uploaded_file($_FILES['thumbnail']['tmp_name'], 'images/' . $imageCreate . '_' . $filename);
        $filepath = "images/" . $imageCreate . '_' . $filename;
    }


    // insert a single publisher
    $sql = 'INSERT INTO projects(name, description, blockchain, category, thumbnail, mintPrice, dropDate ,roadmap, royality, supply, teamAmount, twitterName, discordLink, websiteLink, emailContact, discordMemberNumber, twitterFollowerNumber, signature, traits ,promoted) VALUES(:projectName, :projectDescription, :blockchain, :category, :thumbnail, :mintPrice, :dropDate, :roadmap, :royality, :supply, :teamAmount, :twitterName, :discordLink, :websiteLink, :emailContact, :discordMemberCount, :twitterFollowerCount, :signature, :traits, :promoted)';

    $statement = $conn->prepare($sql);

    $statement->execute([
        ':projectName' => $projectName,
        ':projectDescription' => $projectDescription,
        ':blockchain' => $blockchain,
        ':category' => $category,
        ':thumbnail' => $filepath,
        ':dropDate' => $dropDate,
        ':roadmap' => $roadmap,
        ':mintPrice' => $mintPrice,
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
        ':traits' => $traits,
        ':promoted' => $promoted

    ]);

    
      $hashedId = base64_encode($conn->lastInsertId());

//    $to = 'jelmerketelaar487@gmail.com';
//    $subject = 'New Drop | NFTDropCalender';
//    $message = "Accept it or Decline it! \n http://localhost/NFT-Calander/package/documents/reviewApp.php?ww=Test";
//    $headers = "From: jelmerketelaar487@gmail.nl";

//    mail($to, $subject, $message, $headers);

    header('Location: nft.php?id=' . $hashedId);


// } else {
//  ?> <p>Something went wrong. Please try again later an sent us an email or a text message via Twitter</p>
//     <p>Contact: info@nftdropcalendar.info</p>
//     <p>Twitter: <a href="https://twitter.com/CalenderNft">CalendarNft</a></p>
