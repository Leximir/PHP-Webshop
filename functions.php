<?php

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}


//if($_SERVER['REQUEST_URI'] === '/'){
//    echo 'bg-gray-900 text-white';
//} else {
//    echo 'text-gray-300';
//}

// if statement above is proportional to this one line echo statement
//echo $_SERVER['REQUEST_URI'] === '/' ? 'bg-gray-900 text-white' : 'text-gray-300';

function urlIs($value)
{
    return $_SERVER['REQUEST_URI'] === $value;
}