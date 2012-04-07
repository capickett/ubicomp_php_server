<!--
    TV PHP Media Server
    (c) Copyright 2012 Patrick Larson, Cameron Pickett
    UW CSE, UbiComp Research Group

    REQUIRES: youtube-dl, mplayer
    In order to see/hear video, user logged in must be same as Apache server user as defined in /etc/apache2/envvars
-->

<?php

    require_once('../config/youtube.php');

    $youtubeUrl = escapeshellarg($_POST["youtubeurl"]);
    // FIXME: Running in Mint with gnome3 and ATI video card requires -vo xvand DISPLAY=:0.0 in the exec
    $mflags = "-fs -cookies -cache 8192 -slave -input file=" . FIFO . " -cookies-file " . COOKIES;
    $yflags = "-g --cookies" . COOKIES;

    exec("mplayer $mflags $( youtube-dl $yflags $youtubeUrl ) >/dev/null </dev/null &");
?>
