<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('welcome'); //welcome.blade.php
 });
 Route::get('/multable/{number?}', function ($number = null) {
    $j = $number??2;
    return view('multable', compact('j')); //multable.blade.php
 });
 Route::get('/even', function () {
    return view('even'); //even.blade.php
 });
 Route::get('/prime', function () {
    return view('prime'); //prime.blade.php
 });





Route::get('/marketbill', function () {
    $bill = [
        'items' => [
            ['name' => 'Milk', 'quantity' => 2, 'price' => 3.50],
            ['name' => 'Bread', 'quantity' => 1, 'price' => 2.00],
            ['name' => 'Eggs', 'quantity' => 12, 'price' => 4.00],
        ],
        'total' => 13.00
    ];
    return view('marketbill', ['bill' => $bill]);
});


Route::get('/transcript', function () {
   $transcript = [
       'student_name' => 'Shams Edris',
       'student_id' => '230100513',
       'courses' => [
           ['course_code' => 'CET001', 'course_name' => 'Web and Security Technologies', 'credits' => 3, 'grade' => 'A'],
           ['course_code' => 'CET002', 'course_name' => 'Project II', 'credits' => 4, 'grade' => 'A+'],
           ['course_code' => 'CET003', 'course_name' => 'Network Operation and Managment', 'credits' => 3, 'grade' => 'A'],
           ['course_code' => 'CET004', 'course_name' => 'Digital Forensics Fundamental', 'credits' => 3, 'grade' => 'A+'],
           ['course_code' => 'CET005', 'course_name' => 'Linux and Shell Programming', 'credits' => 3, 'grade' => 'A+'],
       ],
       'gpa' => 4.0
   ];
   return view('transcript', ['transcript' => $transcript]);
})->name('transcript');


Route::get('/calculator', function () {
   return view('calculator');
})->name('calculator');

Route::get('/gpa-simulator', function () {
   $courses = [
       ['code' => 'CET001', 'title' => 'Web and Security Technologies', 'credits' => 3],
       ['code' => 'CET002', 'title' => 'Project II', 'credits' => 4],
       ['code' => 'CET003', 'title' => 'Network Operation and Managment', 'credits' => 3],
       ['code' => 'CET004', 'title' => 'Digital Forensics Fundamental', 'credits' => 3],
       ['code' => 'CET005', 'title' => 'Linux and Shell Programming', 'credits' => 3],
   ];
   return view('gpa-simulator', ['courses' => $courses]);
})->name('gpa-simulator');


Route::get('/products-list', [ProductController::class, 'list'])->name('products');