<?php
session_start();

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
