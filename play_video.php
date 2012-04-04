<!-- REQUIRES: youtube-dl, mplayer -->

<?php

    $youtubeUrl = $_POST["youtubeurl"];
    $cookiesFile = "/var/tmp/youtube-dl-cookies.txt";

    // FIXME: browser hangs at execution
    $result = shell_exec('mplayer -cookies -cookies-file ' . $cookiesFile . ' $(youtube-dl -g --cookies ' . $cookiesFile . ' ' . $youtubeUrl . ')');

    echo "<pre>$result</pre>";
?>
