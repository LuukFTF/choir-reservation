<?php
date_default_timezone_set('Europe/Amsterdam');

require_once $_SERVER['DOCUMENT_ROOT'].'/includes/db/db-connect.php';

$query = "SELECT * 
FROM eventitems";

$result = mysqli_query($DB, $query)
or die('Error in query: '.$query);

while($row = mysqli_fetch_assoc($result))
{
    $eventitems[] = $row;
}

mysqli_close($DB);

$x = 0;
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
    <title>RC - 2. Events</title>
</head>
<body>
    <section class="topbar-container">
        <div class="topbar inv container flex">
            <div class="title flex-item"> January </div> 
            <a class="btn topbar-btn btn-options flex-item"></a>
        </div>
    </section>
        
    <div class="webcontainer">
    <section class="calendar-list callist-default">
        <div class="callist container flex">
        <?php foreach ($eventitems as $id => $eventitem) { 
            $startdatetime = $eventitem['startdatetime'];
            $enddatetime = $eventitem['enddatetime'];
            
            $starttime = date("H:i", strtotime("$startdatetime"));
            $endtime = date("H:i", strtotime("$enddatetime"));
            $day = date("D", strtotime("$startdatetime"));
            $daynumber = date("j", strtotime("$startdatetime"));?>

            <div class="calllist-item flex-item container flex">
                <div class="callist-left flex-item">
                    <div class="day"><?= $day ?></div>
                    <div class="dayofmonth"><?= $daynumber ?></div>
                </div>
                <a class="callist-right item" href="eventitem?id=<?= $eventitem['eventitem_id'] ?>">
                    <div class="title"><?= $eventitem['title'];?></div>
                    <div class="time"><?= $starttime ?> - <?= $endtime ?></div>
                </a>
            </div>
        <?php $id++; } ?>
        </div>
    </section>
    <a class="btn fab-btn fab-rightbott"><div class="fab-btn fab-rightbott btn-content btn-add"></div></a>
    </div>

    <section class="bottomnavbar-container">
        <nav class="bottomnavbar container flex nav">
            <a href="../main" class="btn nav-btn btn-home"><br><div class="btn-text">Home</div></a>
            <a href="../events" class="btn nav-btn btn-event active"><br><div class="btn-text">Events</div></a>
            <a href="../inbox" class="btn nav-btn btn-inbox"><br><div class="btn-text">Inbox</div></a>
            <a href="../settings" class="btn nav-btn btn-settings"><br><div class="btn-text">Settings</div></a>
        </nav>
    </section>
</body>
</html>

