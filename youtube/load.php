<!--
    TV PHP Media Server
    (c) Copyright 2012 Patrick Larson, Cameron Pickett
    UW CSE, UbiComp Research Group

    REQUIRES: youtube-dl, mplayer
    In order to see/hear video, user logged in must be same as Apache server user as defined in /etc/apache2/envvars
-->

<?php

    // TODO: Export constants to a config file
    $youtubeUrl = escapeshellarg($_POST["youtubeurl"]);
    $cookiesFile = "/var/tmp/youtube-dl-cookies.txt";
    $fifoFile = "~/mplayer.fifo"; // FIXME: Autocreate FIFO if non-existent
    $mflags = "-fs -cookies -cache 8192 -slave -input file $fifoFile -cookies-file $cookiesFile";
    $yflags = "-g --cookies $cookiesFile";


    exec("mplayer $mflags $( youtube-dl $yflags $youtubeUrl ) >/dev/null </dev/null &");
?>
