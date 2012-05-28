<?php include_once "{$CONFIG['MODULE_dropbox']['CONFIG_DIR']}/config.php"; ?>

<fieldset>
    <legend>Dropbox</legend>

    <h2>Recently Received <code>(Last updated <?= date("g:ia") ?>)</code>:</h2>
    <ol>
        <?php
        $latest_files = array();
        $new_files = glob("{$DROPBOX_ROOT}/{$RECEIVE_FOLDER}/*");
        foreach ($new_files as $file) {
            if (is_file($file)) {
                $latest_files[filemtime($file)] = $file;
            }
        }
        ksort($latest_files);
        $latest_files = array_reverse($latest_files, true);
        $limit = count($latest_files) < $LFILES_LIST ? count($latest_files) : $LFILES_LIST;
        $i = 0;
        foreach ($latest_files as $time => $file) {
            if ($i >= $limit) {
                break;
            }
        ?>
        <li>
            <a href="<?= "{$CONFIG['MODULE_dropbox']['ROOT_DIR']}/read_received.php?f=" . basename($file) ?>" target="_blank"><?= basename($file) ?></a>
            <span class="dropbox_modify">(<?= date("g:ia, D M jS, Y", $time) ?>)</span>
        </li>
        <?php
            $i++;
        }
        ?>
    </ol>
    
    <h2></h2>
</fieldset>
