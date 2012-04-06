<!DOCTYPE html>

<!--
    TV PHP Media Server
    (c) Copyright 2012 Patrick Larson, Cameron Pickett
    UW CSE, UbiComp Research Group
-->

<html>

    <head>
        <title>UW UBICOMP LAB TV SERVER</title>
    </head>

    <body>

<?php
    if(isset($_POST['action'])) {
        switch($_POST['action']) {
        case 'PLAY':
            include 'youtube/load.php';
            $statusMessage = "Loading YouTube video...";
            break;
        case 'PAUSE':
            include 'youtube/control.php';
            break;
        }
    }
?>

        <pre><?php if(isset($statusMessage)) echo $statusMessage; ?></pre>

        <h1>UW UbiComp Lab TV Services</h1>

        <form name="youtube_load" class="controlpanel" method="post">
            Play YouTube Video: <input type="text" name="youtubeurl" title="Paste YouTube URL here..." size="40" />
            <button name="action" type="submit" value="PLAY">PLAY</button>
        </form>
        <form name="youtube_control" class="controlpanel" method="post">
            <button type="submit" name="action" value="PAUSE">PAUSE</button>
        </form>
        

    </body>

</html>
