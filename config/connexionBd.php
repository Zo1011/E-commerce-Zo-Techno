<?php
try {
    $access = new PDO("mysql:host=localhost;dbname=zo_commerce;charset=utf8", "root", "");
    $access->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} catch (Exception $e) {
    $e->getMessage();
}
