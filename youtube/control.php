<!--
    TV PHP Media Server
    (c) Copyright 2012 Patrick Larson, Cameron Pickett
    UW CSE, UbiComp Research Group

    REQUIRES: FIFO file exists at location
-->

<?php

    // FIXME: Autocreate FIFO if not existent

    $FIFO = "~/mplayer.fifo"; // TODO: Export constants to a cfg

    switch($_POST['action']) {
    case 'PAUSE':
        // FIXME: server hangs
//        exec('echo "pause" > ' . $FIFO);
        $statusMessage = "Pausing YouTube video...";
        break;
    }

?>
