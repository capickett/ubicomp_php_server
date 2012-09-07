<?php

require_once 'config/config.php';

if (isset($_POST['module'])) {
    include "$MOD_EN/{$_POST['module']}/submit.php";
} else if (isset($_GET['module'])) {
    include "$MOD_EN/{$_GET['module']}/submit.php";
}

include 'top.php';

if(isset($statusMessage)) echo "<pre>$statusMessage</pre>\n";
?>
        <h1>UW UbiComp Lab TV Services</h1>
        <div class="controlpanel">
<?php
foreach ($CONFIG['MODS'] as $module) {
    include_once "$MOD_EN/$module/form.php";
}
?>
        </div> <!-- .controlpanel -->

<?php include 'bottom.php'; ?>
