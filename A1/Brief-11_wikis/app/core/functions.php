<?php
function show($url)
{
    echo '<pre>';
    print_r($url);
    echo '</pre>';
}

function clean($input)
{
    $input = trim($input);
    $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
    $input = strip_tags($input);
    return $input;
}


function redirect($_path)
{
    header("location: " . ROOT . "/" . $_path);
    die;
}
