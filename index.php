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
        case 'MUTE':
        case 'UNMUTE':
        case 'VOLUP':
        case 'VOLDOWN':
            include 'youtube/control.php';
            break;
        case 'SCRSAVER':
            include 'screensaver.php';
            break;
        case 'VNC':
        case 'VNCSTOP':
            include 'vnc/vnc.php';
            break;
        }
    }
?>

        <?php if(isset($statusMessage)) echo "<pre>$statusMessage</pre>"; ?>
        <h1>UW UbiComp Lab TV Services</h1>

        <div class="controlpanel">
            <?php include('youtube/form.php'); ?>

            <fieldset>
                <legend>Screensaver</legend>
                <form name="screensaver" method="post">
                    <label for="scrsaver">Display Posters:</label> <button name="action" type="submit" value="SCRSAVER">Go!</button>
                </form>
            </fieldset>

            <?php include('vnc/form.php'); ?>
        </div> <!-- .controlpanel -->
    </body>

</html>
