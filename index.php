<!DOCTYPE html>
<html>

    <!--
        TV PHP Media Server
        (c) Copyright 2012 Patrick Larson, Cameron Pickett
        UW CSE, UbiComp Research Group
    -->

    <head>
        <title>UW UBICOMP LAB TV SERVER</title>
        <link rel="stylesheet" type="text/css" href="styles/index.css" />
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
        case 'SCRSAVER':
            include 'screensaver.php';
            break;
        case 'VNC':
            include 'vnc.php';
            break;
        }
    }
?>

        <?php if(isset($statusMessage)) echo "<pre>$statusMessage</pre>"; ?>
        <h1>UW UbiComp Lab TV Services</h1>

        <div class="controlpanel">
            <fieldset>
                <legend>YouTube</legend>
                <form name="youtube_load" method="post">
                    <label for="youtubeurl">Play URL:</label> <input type="text" id="youtubeurl" name="youtubeurl" title="Paste YouTube URL here..." size="40" />
                    <button name="action" type="submit" value="PLAY">PLAY</button>
                    <button type="submit" name="action" value="PAUSE">PAUSE/RESUME</button>
                </form>
            </fieldset> <!-- .controlsection -->

            <fieldset>
                <legend>Screensaver</legend>
                <form name="screensaver"  method="post">
                    <label for="scrsaver">Display Posters:</label> <button name="action" type="submit" value="SCRSAVER">Go!</button>
                </form>
            </fieldset> <!-- .controlsection -->

            <fieldset>
                <legend>Share Screen</legend>
                <form name="vnc" method="post">
                    <label for="vncip">IP Address:</label> <input type="text" id="vncip" name="vncip" title="Your IP address" size="20" value="<?= $_SERVER['REMOTE_ADDR'] ?>" />
                    <label for="vncdisplayport">Display Port:</label> <input type="text" id="vncdisplayport" name="vncdisplayport" title="Display port (default 1)" size="5" value="1" />
                    <button name="action" type="submit" value="VNC">Connect</button>
                <form>
            </fieldset>
        </div> <!-- .controlpanel -->
        <div id="copynotice">&copy; Copyright 2012 Patrick Larson, <a href="http://synrgi.wordpress.com">Cameron Pickett</a></div>
    </body>

</html>
