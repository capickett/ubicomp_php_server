<?php
require_once "{$CONFIG['MODULE_dropbox']['CONFIG_DIR']}/config.php";

$latest_files = array();
$new_files = glob("{$DROPBOX_ROOT}/{$RECEIVE_FOLDER}/*");
foreach ($new_files as $file) {
    if (is_file($file)) {
        $latest_files[filemtime($file)] = $file;
    }
}
ksort($latest_files);
$latest_files = array_reverse($latest_files, true);
$start = 0;
if (isset($_GET['dropbox_page'])) {
    $start = $LFILES_LIST*$_GET['dropbox_page'];
}
$pages = ceil(count($latest_files) / $LFILES_LIST);
$limit = count($latest_files) < $start + $LFILES_LIST ? count($latest_files) : $start + $LFILES_LIST;
?>

<fieldset>
    <legend>Dropbox</legend>

    <h2>Recently Received <code>(Last updated <?= date("g:ia") ?>)</code>:</h2>
    <ol start="<?= $start + 1 ?>">
        <?php
        $i = 0;
        foreach ($latest_files as $time => $file) {
            if ($i >= $limit) {
                break;
            }
            if ($i >= $start) {
        ?>
        <li>
            <a href="<?= "{$CONFIG['MODULE_dropbox']['ROOT_DIR']}/read_received.php?f=" . basename($file) ?>" target="_blank"><?= basename($file) ?>
            <span class="dropbox_modify">(<?= date("g:ia, D M jS, Y", $time) ?>)</span></a>
        </li>
        <?php
            }
            $i++;
        }
        ?>
    </ol>
    <div>Pages: 
        <?php for ($i = 0; $i < $pages; $i++) { ?>
        <a href="?dropbox_page=<?= $i ?>"><?= $i + 1 ?></a>
        <? } ?>
    </div>

</fieldset>
