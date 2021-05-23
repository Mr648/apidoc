<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return urldecode('%7B%22cloud%22%3A%22il_1%22%2C%22cloudVersion%22%3A%2218769%22%2C%22enablePurchase%22%3Atrue%2C%22enablePropWeapon%22%3Atrue%2C%22interstitialLevel%22%3A6%2C%22interstitialMinTime%22%3A15%2C%22showInterstitial%22%3Atrue%2C%22interstitialX%22%3A1%2C%22interstitialY%22%3A0%2C%22recommendPowerRate%22%3A0.003%2C%22difficultyRate%22%3A0.75%2C%22boosLifeRate%22%3A8%2C%22enableSkin%22%3Atrue%2C%22spin%22%3A%5B%5B0.35%2C0.1%2C0.05%2C0.3%2C0.05%2C0.3%2C0.2%2C0%5D%2C%5B0.3%2C0.1%2C0.05%2C0.2%2C0.05%2C0.3%2C0.2%2C0%5D%2C%5B0.3%2C0.15%2C0.1%2C0.2%2C0.08%2C0.3%2C0.2%2C0%5D%2C%5B0.3%2C0.2%2C0.15%2C0.2%2C0.08%2C0.3%2C0.2%2C0.1%5D%5D%7D');
    });
