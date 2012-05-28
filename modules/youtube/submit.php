<?php

# TV PHP Media Server
# (c) Copyright 2012 Patrick Larson, Cameron Pickett
# UW CSE, UbiComp Research Group
#
# REQUIRES: FIFO file exists at location
# REQUIRES: youtube-dl, mplayer
# In order to see/hear video, user logged in must be same as Apache server user as defined in /etc/apache2/envvars

require_once "{$CONFIG['MODULE_youtube']['CONFIG_DIR']}/config.php";

switch($_GET['action']) {
case 'PLAY':
    play_video();
    $statusMessage = "Loading YouTube video...";
    break;
case 'PAUSE':
    exec('echo "pause" > ' . $FIFO);
    $statusMessage = "Pausing YouTube video...";
    break;
case 'MUTE':
    exec('echo "mute 1" > ' . $FIFO . ' &');
    $statusMessage = "Muting YouTube video...";
    break;
case 'UNMUTE':
    exec('echo "mute 0" > ' . $FIFO . ' &');
    $statusMessage = "Unmuting YouTube video...";
    break;
case 'GOTO':
    $seekPercentage = $_GET['seek'];
    exec('echo "seek ' . $seekPercentage . ' 1" > ' . $FIFO . ' &');
    $statusMessage = "Going to $seekPercentage% of the video...";
    break;
case 'FAST':
    # TODO: Check if speed value is 1.0 or 100
    exec('echo "speed_mult 1.25" > ' . $FIFO . ' &');
    $statusMessage = "Faster...";
    break;
case 'FFAST':
    exec('echo "speed_mult 2.0" > ' . $FIFO . ' &');
    $statusMessage = "Much faster...";
case 'SLOW':
    exec('echo "speed_mult 0.8" > ' . $FIFO . ' &');
    $statusMessage = "Slower...";
    break;
case 'SSLOW':
    exec('echo "speed_mult 0.5" > ' . $FIFO . ' &');
    $statusMessage = "Much slower...";
    break;
case 'REG':
    exec('echo "speed_set 1.0" > ' . $FIFO . ' &');
    $statusMessage = "Normal speed...";
    break;
case 'VOLUP':
    exec('echo "volume 10 0" > ' . $FIFO . ' &');
    $statusMessage = "Increasing volume...";
    break;
case 'VOLDOWN':
    exec('echo "volume -10 0" > ' . $FIFO . ' &');
    $statusMessage = "Decreasing volume...";
    break;
}

function play_video() {
    global $CONFIG;
    global $FIFO;
    global $COOKIES;
    $ts = date($CONFIG['LOG_TS']);
    $youtubeUrl = escapeshellarg($_GET["youtubeurl"]);
    # FIXME: Running in Mint with gnome3 and ATI video card requires -vo xvand DISPLAY=:0.0 in the exec
    $mflags = "-fs -cookies -cache 8192 -slave -input file=$FIFO -cookies-file $COOKIES";
    $yflags = "-g --cookies " . $COOKIES;
    exec("mplayer $mflags $( youtube-dl $yflags $youtubeUrl ) >> logs/youtube_submit_$ts.log 2>> logs/youtube_submit_$ts.log &");
}
