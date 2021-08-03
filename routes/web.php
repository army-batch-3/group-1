<?php

use Illuminate\Support\Facades\Route;

foreach (glob(__DIR__ . "/cms/*.php") as $filename) {
    include $filename;
}
