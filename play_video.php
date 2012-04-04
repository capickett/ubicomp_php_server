<!--
    REQUIRES: youtube-dl, mplayer
    In order to see/hear video, user logged in must be same as Apache server user as defined in /etc/apache2/envvars
-->

<?php

    $youtubeUrl = $_POST["youtubeurl"];
    $cookiesFile = "/var/tmp/youtube-dl-cookies.txt";

    exec('(mplayer -fs -cookies -cookies-file ' . $cookiesFile . ' $(youtube-dl -g --cookies ' . $cookiesFile . ' ' . $youtubeUrl . ')) >/dev/null </dev/null &');
?>
