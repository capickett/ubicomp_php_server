<fieldset>
    <legend>Share Screen</legend>

    <h2>Java VNC Applet</h2>
    <a href="<?= $CONFIG['MODULE_vnc']['ROOT_DIR'] . '/applet.php' ?>" target="_blank"><button>Launch Applet in Separate Window</button></a>
    <form name="jvnc" method="get">
        <input type="hidden" name="module" value="vnc" />
        <button name="action" type="submit" value="JVNC">Connect</button>
    </form>
    <h2>User Installed VNC</h2>
    <form name="vnc" method="get">
        <input type="hidden" name="module" value="vnc" />
        <ol>
            <li><button name="action" type="submit" value="VNCLISTEN">Start Server Viewer</button></li>
            <li>Using your own installed VNC program, connect to IP <code><?= $_SERVER['SERVER_ADDR'] ?></code> on PORT <code>5500</code></li>
        </ol>
    </form>
</fieldset>
