<?php
session_start();

const BASE_PATH = __DIR__ . "/../";

//var_dump(BASE_PATH);

require_once BASE_PATH . "app/functions.php";
require_once base_path("app/Database.php");
require_once base_path("router.php");