<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\instructorController;
use App\Models\About;
use App\Models\Home;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $homes = Home::orderBy('id', 'DESC')->limit(2)->get();
    return view('compro.index', compact('homes'));
})->name('home.index');

Route::get('about', function () {
    $about = About::orderBy('id','DESC')->first();
    return view('compro.about', compact('about'));
})->name('about.index');

Route::get('courses', function () {
    return view('compro.courses');
})->name('courses.index');

Route::get('testimonial', function () {
    return view('compro.testimonial');
})->name('testimonial.index');

Route::get('team', function () {
    return view('compro.team');
})->name('team.index');

Route::get('contact', function () {
    return view('compro.contact');
})->name('contact.index');

Route::get('login', function () {
    return view('admin.login');
})->name('login.index');

Route::get('dashboard', function () {
    return view('admin.app');
});

Route::get('homeadmin', [HomeController::class, 'index'])->name('homeadmin.index');
Route::get('homeadmin/create', [HomeController::class, 'create'])->name('homeadmin.create');
Route::post('homeadmin/store', [HomeController::class, 'store'])->name('homeadmin.store');
Route::get('homeadmin/edit/{id}', [HomeController::class, 'edit'])->name('homeadmin.edit');
Route::put('homeadmin/update/{id}', [HomeController::class, 'update'])->name('homeadmin.update');
Route::delete('homeadmin/destroy/{id}', [HomeController::class, 'destroy'])->name('homeadmin.destroy');

Route::resource('aboutadmin', AboutController::class);
Route::resource('instructoradmin', instructorController::class);

