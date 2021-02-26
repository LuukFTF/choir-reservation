<?php

date_default_timezone_set('Europe/Amsterdam');

require_once $_SERVER['DOCUMENT_ROOT'].'/includes/db/db-connect.php';

// Redirect back if index not in url or value is empty
if(!isset($_GET['id']) || $_GET['id'] == '')
{
    header('Location:/events/');
    exit;
}

$id = $_GET['id'];



$query = "SELECT * 
FROM eventitems 
WHERE eventitem_id = $id";

$result = mysqli_query($DB, $query)
or die('Error in query: '.$query);

$eventitem =  mysqli_fetch_assoc($result);

$query_pcs = "SELECT * 
FROM presencechecks  
WHERE eventitem_id = $id";






$startdatetime = $eventitem['startdatetime'];
$enddatetime = $eventitem['enddatetime'];

$starttime = date("H:i", strtotime("$startdatetime"));
$endtime = date("H:i", strtotime("$enddatetime"));
$dayfull = date("l", strtotime("$startdatetime"));

$datetext = date("F j, Y", strtotime("$startdatetime"))



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,
    initial-schale=1.0">
    <script src="https://kit.fontawesome.com/0bc22cc72a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/utilities.css">
    <title>RC - 2.1 Event Item</title>
</head>
<body class="expanded">

    <section class="topbar-container">
        <div class="topbar details container flex">
            <a href="../../events" class="btn btn-back flex-item"></a>
            <div class="topbar-main flex-item">
                <div class="titlesmall"><?= $eventitem['title'];?></div> 
                <div class="titledesc"><?= $dayfull ?> ⋅ <?= $datetext;?> ⋅ <?= $starttime ?> - <?= $endtime ?></div>
            </div>
            <a class="btn right btn-options flex-item"></a>
        </div>
    </section>
    
    <div class="webcontainer">
    <section class="calendardetails">
        <div class="detail-field"><?= $eventitem['description0'];?></div>
        <section class="presence container flex">
            <div class="presence-info flex-item container flex">
                <div class="presence-titlesub flex-item container flex"> 
                    <div class="presence-title flex-item">
                        Presence
                    </div>
                    <div class="presence-subtitle flex-item">
                        10/50
                    </div>
                    </div>
                <div class="presence-timeslot flex-item">
                    <div class="timeslot-title">closes</div>
                    <div class="timeslot-time">20:00</div>
                </div>
            </div>
            <div class="presence-main">
                <form class="presence-form container flex">
                    <div class="flex-item">
                        <input class="checkbox" type="radio" id="absent" name="presence" value="absent">
                        <label class="checkbox-label" for="absent">absent</label>
                    </div>
                    <div class="flex-item">
                        <input class="checkbox flex-item" type="radio" id="present" name="presence" value="present">
                        <label for="present">present</label>
                    </div>
                    <div class="flex-item">
                        <input class="checkbox flex-item" type="radio" id="unsure" name="presence" value="unsure">
                        <label for="unsure">unsure</label>
                    </div>
                    <input class="btn secondary" type="submit" value="Submit"></input>
                </form> 
        </section>
        <div class="detail2-field">
            <div class="title"><?= $eventitem['subtitle1'];?></div>
            <div class="text"><?= $eventitem['description1'];?></div>
        </div>
        <div class="detail2-field">
            <div class="title"><?= $eventitem['subtitle2'];?></div>
            <div class="text"><?= $eventitem['description2'];?></div>
        </div>
    </section>

    <section class="subcalendar">

    </section>

    <a class="btn fab-btn fab-rightbott"><div class="fab-btn fab-rightbott btn-content btn-edit"></div></a>
    </div>


    <section class="bottomnavbar-container">
        <nav class="bottomnavbar container flex nav">
            <a href="../../main" class="btn nav-btn btn-home"><br><div class="btn-text">Home</div></a>
            <a href="../../events" class="btn nav-btn btn-event active"><br><div class="btn-text">Events</div></a>
            <a href="../../inbox" class="btn nav-btn btn-inbox"><br><div class="btn-text">Inbox</div></a>
            <a href="../../settings" class="btn nav-btn btn-settings"><br><div class="btn-text">Settings</div></a>
        </nav>
    </section>
</body>
</html>