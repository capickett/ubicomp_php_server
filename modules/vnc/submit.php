<?php

    # TV PHP Media Server
    # (c) Copyright 2012 Patrick Larson, Cameron Pickett
    # UW CSE, UbiComp Research Group
    #
    # REQUIRES: xscreensaver 
    # Settings must be configured using xscreensaver-demo in the GUI
    # Make sure xscreensaver is running, rather than the gnome-screensaver
    # daemon

    require_once "{$CONFIG['MODULE_vnc']['CONFIG_DIR']}/config.php";

    if($_POST['action'] == 'VNC') {
        $ipAddress = $_POST['vncip'];
        $dispPort = $_POST['vncdisplayport'];
        $passwd = $_POST['vncpasswd'];
        exec("echo \"$passwd\" | vncviewer $ipAddress:$dispPort -fullscreen -viewonly -encodings \"Hextile Tight\" -autopass &");
        $statusMessage = "Connecting to user-configured VNC server...";
    } else if ($_POST['action'] == 'JVNC') {
        $ipAddress = $_SERVER['REMOTE_ADDR'];
        exec("vncviewer $ipAddress:$JVNC_PORT -fullscreen -viewonly -encodings \"Hextile Tight\" &");
        $statusMessage = "Connecting to Java VNC Applet...";
    } else {
        exec("killall vncviewer &");
        $statusMessage = "Disconnecting VNC viewer...";
    }
?>
