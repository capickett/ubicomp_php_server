<?php

# TV PHP Media Server
# (c) Copyright 2012 Patrick Larson, Cameron Pickett
# UW CSE, UbiComp Research Group
#
# REQUIRES: xscreensaver 
# Settings must be configured using xscreensaver-demo in the GUI
# Make sure xscreensaver is running, rather than the gnome-screensaver
# daemon

require_once "$MOD_EN/vnc/$CONFIG_DIR/config.php";

if($_GET['action'] == 'VNCLISTEN') {
    $ts = date($CONFIG['LOG_TS']);
    exec("vncviewer -listen 0 -fullscreen -viewonly -encodings \"Hextile Tight\" >> logs/vnc_submit_$ts.log 2>> logs/vnc_submit_$ts.log &");
    $statusMessage = "Starting VNC Client in listening mode...";
} else if ($_GET['action'] == 'JVNC') {
    $ipAddress = $_SERVER['REMOTE_ADDR'];
    $ts = date($CONFIG['LOG_TS']);
    exec("vncviewer $ipAddress:$JVNC_PORT -fullscreen -viewonly -encodings \"Hextile Tight\" >> logs/vnc_submit_$ts.log 2>> logs/vnc_submit_$ts.log &");
    $statusMessage = "Connecting to Java VNC Applet...";
} else {
    exec("killall vncviewer &");
    $statusMessage = "Disconnecting VNC viewer...";
}
