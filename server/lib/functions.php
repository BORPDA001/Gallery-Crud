<?php

function hash_password($password) {
    return md5($password);
}

function upload_file($file, $upload_dir) {
    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
    $file_name = time() . "." . $ext;
    if (move_uploaded_file($file['tmp_name'], $upload_dir . $file_name)){
    return $file_name;
    }
}

function inp($value) {
    return trim(htmlspecialchars($value));
}
function get_full_url() {
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $host = $_SERVER['HTTP_HOST'];
    $uri = $_SERVER['REQUEST_URI'];
    $full_url = $protocol . $host . $uri;
    return $full_url;
}