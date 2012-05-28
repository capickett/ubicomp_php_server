<?php
ini_set('display_errors', '1');

require_once 'config/config.php';

if (isset($_POST['module'])) {
    include "modules/{$_POST['module']}/submit.php";
} else if (isset($_GET['module'])) {
    include "modules/{$_GET['module']}/submit.php";
}

include 'top.php';

if(isset($statusMessage)) echo "<pre>$statusMessage</pre>\n";
?>
        <h1>UW UbiComp Lab TV Services</h1>
        <div class="controlpanel">
            <?php
            foreach ($CONFIG['MODULE_LOAD_ORDER'] as $module) {
                include_once 'modules/' . $module . '/form.php';
            }
            ?>
        </div> <!-- .controlpanel -->

<?php include 'bottom.php'; ?>
