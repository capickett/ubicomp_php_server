<?php
include '../top.php';
require_once 'config/config.php';
?>
    <h2>UbiComp Java VNC Server</h1>
    
    <pre>
    Java VNC Server is now running.
    To stop VNC Server, press the Stop button.
    To restart VNC Server, press the Start button again.</pre>
    <applet archive="ubicompscreenshare.jar" code="ubicomp.vnc.VNCApplet.class" codebase="./" width="80" height="20">
        <param name="serverIP" value="<?= $_SERVER['SERVER_ADDR'] ?>" />
        <param name="displayPort" value="<?= $JVNC_PORT ?>" />
        <param name="displayName" value="UbiComp Screen Share" />
        <param name="displayHeight" value="600" />
        <param name="displayWidth" value="800" />
        <param name="autostart" value="true" />
        Your browser does not support Java applets!
    </applet>
<?php include '../bottom.php'; ?>
