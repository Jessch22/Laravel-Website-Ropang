<?php
// Mencegah PHP 8.5 menampilkan pesan peringatan (Deprecated) ke layar website
error_reporting(E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED);
ini_set('display_errors', '0');

require __DIR__ . '/../public/index.php';
