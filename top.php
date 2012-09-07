<!DOCTYPE html>
<?php ini_set('display_errors', '1'); ?>
<html>

    <!--
        TV PHP Media Server
        (c) Copyright 2012 Patrick Larson, Cameron Pickett
        UW CSE, UbiComp Research Group
    -->

    <head>
        <title>UW UBICOMP LAB TV SERVER</title>
        <link rel="stylesheet" type="text/css" href="styles/index.css" />
<?php
foreach ($CONFIG['MODS'] as $module) {
    foreach (glob("$MOD_EN/$module/$STYLES_DIR/*.css") as $style) {
?>
        <link rel="stylesheet" type="text/css" href="<?= $style ?>" />
<?php
    }
}
?>
    </head>

    <body>
