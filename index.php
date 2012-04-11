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
                <form action="screensaver.php"  method="post">
                    <label for="scrsaver">Display Posters:</label> <button name="action" type="submit" value="SCRSAVER">Go!</button>
                </form>
            </fieldset> <!-- .controlsection -->
        </div> <!-- .controlpanel -->
        <div id="copynotice">&copy; Copyright 2012 Patrick Larson, <a href="http://synrgi.wordpress.com">Cameron Pickett</a></div>
</body>

</html>
