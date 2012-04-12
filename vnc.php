<?php

    # TV PHP Media Server
    # (c) Copyright 2012 Patrick Larson, Cameron Pickett
    # UW CSE, UbiComp Research Group
    #
    # REQUIRES: xscreensaver 
    # Settings must be configured using xscreensaver-demo in the GUI
    # Make sure xscreensaver is running, rather than the gnome-screensaver
    # daemon

    $ipAddress = $_POST['vncip'];
    $dispPort = $_POST['vncdisplayport'];
    exec("vncviewer $ipAddress:$dispPort");
?>
