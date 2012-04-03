<!-- REQUIRES: youtube-dl, mplayer -->

<?php

    $youtubeUrl = $POST["videoName"];
    $COOKIES_FILE = "/var/tmp/youtube-dl-cookies.txt";

    $result = shell_exec('mplayer -cookies -cookies-file ' . $COOKIES_FILE . ' $(youtube-dl -g --cookies ' . $COOKIES_FILE . ' ' . $youtubeUrl . ')';

    echo "<pre>$result</pre>";
}
