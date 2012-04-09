<?php

    # TV PHP Media Server
    # (c) Copyright 2012 Patrick Larson, Cameron Pickett
    # UW CSE, UbiComp Research Group
    #
    # REQUIRES: FIFO file exists at location

    require_once('config/youtube.php');

    switch($_POST['action']) {
    case 'PAUSE':
        // XXX: Requires further testing
        exec('echo "pause" > ' . FIFO . ' &');
        $statusMessage = "Pausing YouTube video...";
        break;
    }

?>
