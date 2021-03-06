#!/usr/bin/php
<?php


$unzip_path = '/usr/share/';

$cmd = "cd $unzip_path; rm -rf microweber-latest.zip";
$output = exec($cmd);

$cmd = "cd $unzip_path; rm -rf microweber-update.zip";
$output = exec($cmd);

$cmd = "cd $unzip_path; rm -rf microweber-ext.zip";
$output = exec($cmd);

$wget_cmd = "wget";
if (defined("WGET_NO_SSL")) {
    $wget_cmd = "wget --no-check-certificate";
}

$cmd = "cd $unzip_path; {$wget_cmd} https://microweber.com/download.php -O microweber-latest.zip";
$output = exec($cmd);

$cmd = "cd $unzip_path; {$wget_cmd} https://microweber.com/download.php?update -O microweber-update.zip";
$output = exec($cmd);

if(isset($download_key)){
    $cmd = "cd $unzip_path; {$wget_cmd} 'https://microweber.com/download.php?extended=$download_key' -O microweber-ext.zip";
    $output = exec($cmd);

    $cmd = "cd $unzip_path; unzip -o microweber-ext.zip  -d {$unzip_path}microweber-ext";
    $output = exec($cmd);
}

$cmd = "cd $unzip_path; unzip -o microweber-latest.zip  -d {$unzip_path}microweber-latest";
$output = exec($cmd);

$cmd = "cd $unzip_path; unzip -o microweber-update.zip  -d {$unzip_path}microweber-update";
$output = exec($cmd);