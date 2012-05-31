<?php
include_once 'config/config.php';

if (!isset($_GET['f'])) {
    header('HTTP/1.1 400 Bad Request');
    die('BAD REQUEST');
}

$file = $_GET['f'];

if (preg_match("/\.\./", $file)) {
    die("Trying to access outside Dropbox receive folder!!!");
}

$ext = explode('.', $file);

switch(strtolower($ext[1])) {
    case 'gif': $ct = 'image/gif'; break;
    case 'jpg': case 'jpeg': $ct = 'image/jpeg'; break;
    case 'pdf': $ct = 'application/pdf'; break;
    case 'png': $ct = 'image/png'; break;
    case 'svg': $ct = 'image/svg+xml'; break;
    case 'tiff': $ct = 'image/tiff'; break;
    default: $ct = 'application/octet-stream'; break;
}

header('Content-Type: ' . $ct);
header("Content-Disposition: filename={$file}");
header('Content-Length: ' . filesize("{$DROPBOX_ROOT}/{$RECEIVE_FOLDER}/{$file}"));
@readfile("{$DROPBOX_ROOT}/{$RECEIVE_FOLDER}/{$file}");
exit;

