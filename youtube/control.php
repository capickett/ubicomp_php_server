<?php

    # TV PHP Media Server
    # (c) Copyright 2012 Patrick Larson, Cameron Pickett
    # UW CSE, UbiComp Research Group
    #
    # REQUIRES: FIFO file exists at location

    require_once('config/youtube.php');

    switch($_POST['action']) {
    case 'PAUSE':
        exec('echo "pause" > ' . FIFO . ' &');
        $statusMessage = "Pausing YouTube video...";
        break;
    case 'MUTE':
        exec('echo "mute 1" > ' . FIFO . ' &');
        $statusMessage = "Muting YouTube video...";
        break;
    case 'UNMUTE':
        exec('echo "mute 0" > ' . FIFO . ' &');
        $statusMessage = "Unmuting YouTube video...";
        break;
    case 'GOTO':
        $seekPercentage = $_POST['seek'];
        exec('echo "seek ' . $seekPercentage . ' 1" > ' . FIFO . ' &');
        $statusMessage = "Going to $seekPercentage% of the video...";
        break;
    case 'FAST':
        # TODO: Check if speed value is 1.0 or 100
        exec('echo "speed_mult 1.25" > ' . FIFO . ' &');
        $statusMessage = "Faster...";
        break;
    case 'FFAST':
        exec('echo "speed_mult 2.0" > ' . FIFO . ' &');
        $statusMessage = "Much faster...";
    case 'SLOW':
        exec('echo "speed_mult 0.8" > ' . FIFO . ' &');
        $statusMessage = "Slower...";
        break;
    case 'SSLOW':
        exec('echo "speed_mult 0.5" > ' . FIFO . ' &');
        $statusMessage = "Much slower...";
        break;
    case 'REG':
        exec('echo "speed_set 1.0" > ' . FIFO . ' &');
        $statusMessage = "Normal speed...";
        break;
    case 'VOLUP':
        exec('echo "volume 10 0" > ' . FIFO . ' &');
        $statusMessage = "Increasing volume...";
        break;
    case 'VOLDOWN':
        exec('echo "volume -10 0" > ' . FIFO . ' &');
        $statusMessage = "Decreasing volume...";
        break;
    }

?>
