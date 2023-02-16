<?php

use Main\Route\Route;
use App\Controllers\MainController;

Route::get('/index', [MainController::class, 'index']);
