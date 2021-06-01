<?php

// & jika tidak ada session, jalankan session start
if (!session_id()) {
    session_start();
}
require_once '../app/init.php';

$app = new App;
