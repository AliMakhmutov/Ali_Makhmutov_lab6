<?php

use Illuminate\Support\Facades\Route;
use App\Models\Student;
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

Route::get('/insert', function () {
    DB::insert("insert into students(name, date_of_birth, gpa, advisor) VALUES('Bauyrzhan', '2002-01-17', 2.2, 'Alisher')");
    echo "Successfully inserted";
    
});

Route::get('/upginsert', function () {
    $students = new Student;
    $students->name = 'Erlan';
    $students->date_of_birth = '2002-01-24';
    $students->gpa = 1.7;
    $students->advisor = 'Alisher';
    $students->save();
    echo "Successfully inserted";
});

Route::get('/select', function () {
    $select = DB::select("select * from students where name = 'Bauyrzhan'");
    foreach($select as $students) {
        echo "Name: ".$students->name;
        echo "<br>";
        echo "Date of birth: ".$students->date_of_birth;
        echo "<br>";
        echo "GPA: ".$students->gpa;
        echo "<br>";
        echo "Advisor: ".$students->advisor;
    }
});

Route::get('/update', function () {
    DB::update("update students set gpa = 2.7 where name = 'Bauyrzhan'");
    echo "Successfully updated";
});

Route::get('/upgupdate', function () {
    $post = Student::find(6);
    $post->advisor = 'Ali';
    $post->save();
    echo "Successfully updated";
});

Route::get('/delete', function () {
    DB::delete("delete from students where name = 'Bauyrzhan'");
    echo "Successfully deleted";
});

Route::get('/upgdelete', function () {
    // $post = Student::find(6);
    // $post->delete();

    // Student::destroy(6);

    // Student::destroy([4,6]);

    Student::where('name', 'Erlan')->delete();

    echo "Successfully deleted";
});