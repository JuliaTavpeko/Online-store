<?php

function dump($data): void
{
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
}

function dd($data){
    dump($data);
    die;
}

function print_arr($data): void
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

