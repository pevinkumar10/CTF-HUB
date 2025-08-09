<?php

include_once "../libs/loader.php";

session_destroy();

header('location: login.php');
