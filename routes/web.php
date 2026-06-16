<?php

use Illuminate\Support\Facades\Route;

Route::livewire('/', 'pages::homepage')->name('homepage');
Route::livewire('/voting', 'pages::voting')->name('voting');
Route::livewire('/result', 'pages::chart')->name('chart');
Route::livewire('/datavote', 'pages::datavote')->name('datavote');
