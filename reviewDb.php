<?php
require 'connection.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_GET['ww']) && $_GET['ww'] == 'Jelmer01') {
    $getProjects = $conn->prepare("SELECT * FROM projects ORDER BY id DESC");
    $getProjects->execute();
    $projects = $getProjects->fetchAll(\PDO::FETCH_ASSOC);

    $getProjectsLis = $conn->prepare("SELECT * FROM projectsExist ORDER BY id DESC");
    $getProjectsLis->execute();
    $projectsListed = $getProjectsLis->fetchAll(\PDO::FETCH_ASSOC);
} else {
    die();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="robots" content="noindex">
    <meta name="googlebot" content="noindex">
    <meta charset="UTF-8">
    <title>NFTDropCalendar</title>
    <link rel="apple-touch-icon" href="img/logo/apple-touch-icon.png">
    <link rel="stylesheet" href="css/style.css">
     <style>
        th {
            color: white;
            font-size: 20px;
        }

        td {
            color: white;
            font-size: 15px;
        }

        /* Style for mobile devices */
        @media (max-width: 768px) {
            /* Center-align the Save All button on mobile */
            .btn-save-all {
                text-align: center;
                width: 100%;
                margin-top: 10px;
            }
        }
    </style>
</head>
<body class="@@dashboard dark-theme">
<!-- ***** Activity Area Start ***** -->
<section class="activity-area load-more">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Intro -->
                <div class="intro mb-4">
                    <div class="intro-content">
                        <span>All Drops</span>
                        <h3 class="mt-3 mb-0">Edit</h3>
                        <form style='float:right;' action="https://nftdropcalendar.info/reviewApp.php" method='GET'>
                            <input type='hidden' name='ww' value='Test'>
                            <button type="submit" style='float:right;' class="btn btn-success">Projecten Goedkeuren</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row items">
            <div class="col-12 col-md-12 col-lg-12" style='overflow-x: auto;
                white-space: nowrap;width: auto;'>
                <!-- Netstorm Tab -->
                <ul class="netstorm-tab nav nav-tabs" id="nav-tab">
                    <li>
                        <a class="active" id="nav-home-tab" data-toggle="pill" href="#nav-home">
                            <h5 class="m-0">All</h5>
                        </a>
                    </li>
                </ul>
                <form action='reviewDbProc.php' method='POST'>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Verified</th>
                                <th>NameDrop</th>
                                <th>Blockchain</th>
                                <th>Category</th>
                                <th>Thumbnail</th>
                                <th>dropDate</th>
                                <th>mintPrice</th>
                                <th>Royalty</th>
                                <th>SupplyTotal</th>
                                <th>teamAmount</th>
                                <th>TwitterName</th>
                                <th>discordLink</th>
                                <th>websiteLink</th>
                                <th>promoted</th>
                                <th>discordMemberCount</th>
                                <th>twitterFollowerCount</th>
                                <th>signature</th>
                                <th>dateUploadDropUser</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($projects as $project) { ?>
                                <tr>
                                    <input type='hidden' name='id[]' value='<?php echo $project['id']; ?>'>
                                    <td><?php echo $project['id']; ?></td>
                                    <td>
                                        <select name='verified[]'>
                                            <option value='true' <?php if ($project['verified'] == 'true') { ?>selected<?php } ?>>true</option>
                                            <option value='false' <?php if ($project['verified'] == 'false') { ?>selected<?php } ?>>false</option>
                                        </select>
                                    </td>
                                    <td><input type='text' name='name[]' value='<?php echo $project['name']; ?>'></td>
                                    <td>
                                        <select name='blockchain[]'>
                                            <option value='ethereum' <?php if ($project['blockchain'] == 'ethereum') { ?>selected<?php } ?>>ethereum</option>
                                            <option value='solana' <?php if ($project['blockchain'] == 'solana') { ?>selected<?php } ?>>solana</option>
                                            <option value='polygon' <?php if ($project['blockchain'] == 'polygon') { ?>selected<?php } ?>>polygon</option>
                                            <option value='cardano' <?php if ($project['blockchain'] == 'cardano') { ?>selected<?php } ?>>cardano</option>
                                        </select>
                                    </td>
                                    <td><?php echo $project['category']; ?></td>
                                    <td><img style='width:50px;' src='<?php echo $project['thumbnail']; ?>'></td>
                                    <td><input type='datetime-local' name='dropDate[]' value='<?php echo $project['dropDate']; ?>'></td>
                                    <td><input type='text' name='mintPrice[]' value='<?php echo $project['mintPrice']; ?>'></td>
                                    <td><input type='number' step='0.5' name='royalty[]' value='<?php echo $project['royality']; ?>'></td>
                                    <td><input type='number' name='supply[]' value='<?php echo $project['supply']; ?>'></td>
                                    <td><input type='number' name='teamAmount[]' value='<?php echo $project['teamAmount']; ?>'></td>
                                    <td><input type='text' name='twitterName[]' value='<?php echo $project['twitterName']; ?>'></td>
                                    <td><input type='text' name='discordLink[]' value='<?php echo $project['discordLink']; ?>'></td>
                                    <td><input type='text' name='websiteLink[]' value='<?php echo $project['websiteLink']; ?>'></td>
                                    <td><input type='text' name='promoted[]' value='<?php echo $project['promoted']; ?>'></td>
                                    <td><input type='number' name='discordMemberNumber[]' value='<?php echo $project['discordMemberNumber']; ?>'></td>
                                    <td><input type='number' name='twitterFollowerNumber[]' value='<?php echo $project['twitterFollowerNumber']; ?>'></td>
                                    <td><?php echo $project['signature']; ?></td>
                                    <td><?php echo $project['dateUploadDropUser']; ?></td>
                                    <td></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-success">Save All</button>
                </form>
                <div class="text-center mt-4">
            </div>
        </div>
    </div>
</section>
<!-- ***** Activity Area End ***** -->
</body>
</html>
