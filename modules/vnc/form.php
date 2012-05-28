<fieldset>
    <legend>Share Screen</legend>

    <h2>Java VNC Applet</h2>
    <a href="<?= $CONFIG['MODULE_vnc']['ROOT_DIR'] . '/applet.php' ?>" target="_blank"><button>Launch Applet in Separate Window</button></a>
    <form name="jvnc" method="post">
        <input type="hidden" name="module" value="vnc" />
        <button name="action" type="submit" value="JVNC">Connect</button>
        <button name="action" type="submit" value="STOPJVNC">Disconnect</button>
    </form>
    <h2>User Installed VNC</h2>
    <form name="vnc" method="post">
        <input type="hidden" name="module" value="vnc" />
        <div>
            <label for="vncip">IP Address:</label> <input type="text" id="vncip" name="vncip" title="Your IP address" size="15" value="<?= $_SERVER['REMOTE_ADDR'] ?>" />
            <label for="vncdisplayport">Display Port:</label> <input type="text" id="vncdisplayport" name="vncdisplayport" title="Display port (default 1)" size="5" value="1" />
        </div>
        <div>
            <label for="vncpasswd">VNC Password:</label> <input type="password" id="vncpasswd" name="vncpasswd" size="15" />
            <button name="action" type="submit" value="VNC">Connect</button>
            <button name="action" type="submit" value="STOPVNC">Disconnect</button>
        </div>
    </form>
</fieldset>
