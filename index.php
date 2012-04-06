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
    if(isset($_POST['youtubeurl'])) {
        include 'play_video.php';
?>

        <pre>Loading YouTube video...</pre>

<?php
    }
?>

        <h1>UW UbiComp Lab TV Services</h1>

        <form name="youtube" class="controlpanel" method="post">
            Play YouTube Video: <input type="text" name="youtubeurl" title="Paste YouTube URL here..." size="40" />
            <button type="submit">PLAY</button>
        </form>
	</br>
	<form action="screensaver.php"  method="post">
	    Display Posters: <input type="submit" name="scrsaver" value="Go!" />
	</form>
    </body>

</html>
