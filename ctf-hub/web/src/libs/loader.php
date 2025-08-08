<?php
session_start();


include_once __dir__ . "/../classes/db.class.php";
include_once __dir__ . "/../classes/user.class.php";
include_once __dir__ . "/../classes/product.class.php";

function load_template($template_name, $variables = [])
{
    $template_location = $_SERVER['DOCUMENT_ROOT'] . "/templates/";
    extract($variables);
    if (file_exists($template_location . $template_name . ".php")) {
        include_once $_SERVER['DOCUMENT_ROOT'] . "/templates/$template_name.php";
    } else {
        throw new ErrorException("Template File not found in " . $template_name);
    }
}
