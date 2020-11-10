<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TodosController;
use App\Http\Controllers\AuthorsController;

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

//view() zeigt automatisch Inhalte des angesprochen Files (zu finden in resources/views/)
//die angespr. files müssen immer auf '.blade.php' enden!
Route::get('/', function () {
    return view('start');
});
Route::get('/foo', function () {
    return "<h1>Hello Foo!</h1>";
});

//Übung Routing:
Route::get('/blub', function () {
    return "<h1>Hello Blub!</h1>";
});

//Übung Routing:
Route::get('/test', function () {
    return '<form action="https://google.com">
                <input type="submit" value="Google" />
            </form>';
});

//Aufgabe:
//erstellt eine Route, die es erlaubt folgendes aufzurufen: http://videostore.loc/name/Meier
//ausgegeben soll dann werden in einer h1 Überschrift: Meine Name ist Meier
//Route::get('/name/{user}', function ($user) {
//    return "<h1>Meine Name ist $user</h1>";
//});
//...mit der Variante MUSS ein Parameter angegeben werden (nur /name/ würde nicht funktionieren)
//damit es nur mit /name auch geht (der Parameter danach also optional ist), setzt man ? hinter die Variable:
//Route::get('/name/{user?}', function ($user = null) {
//    return "<h1>Meine Name ist $user</h1>";
//});

//Fallback, falls bei ungültigen URLs keine Fehlermeldung angezeigt werden soll (SOLL EIGTL ANS ENDE; funzt aber):
Route::fallback(function () {
    return "<h1>Route nicht gefunden</h1>";
});

//Route mit regular expressions Filter (oft wichtig für Sicherheit):
//Route::get('/name/{user?}', function ($user = null) {
//    return "<h1>$user</h1>";
//})->where('user', '[A-Za-z]+');
//o.a.
//Route::get('/name/{id}/{user?}', function ($id, $user = null) {
//    return "<h1>ID: &nbsp &nbsp $id<br>User: $user </h1>";
//})->where(['id' => '[0-9]+', 'user' => '[A-Za-z]+']);

//Übung der view() function (dafür neuen file greeting.blade.php erstellt unter resources/views/):
//Route::get('greeting/{user?}', function ($user = "Der, dessen Name nicht genannt wurde...") {
//    return view('greeting', ['user' => $user]);
//})->where(['user' => '[A-Za-z]+']);

//Übung der view() function mit parent-child blade template:
//Route::get('greeting/{user?}', function ($user = "Der, dessen Name nicht genannt wurde...") {
//    return view('greeting', ['user' => $user]);
//});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('greeting/{user?}', [TestController::class, 'greetings'])->name('greeting');

//Todos verwalten
Route::get('/todos', [TodosController::class, 'index'])->name('todos');
Route::get('/todos/{id}', [TodosController::class, 'show'])->name('todos.show');

//Route::get('/todos/create', [TodosController::class, 'create'])->name('todos.create')->middleware('auth');
//Route::get('/todos/edit', [TodosController::class, 'edit'])->name('todos.edit')->middleware('auth');
//usw

//Projectday Übung 2:
Route::get('/authors', [AuthorsController::class, 'index'])->name('authors');
Route::get('/authors/{id}', [AuthorsController::class, 'show'])->name('authors.show');



//Todos updaten/verändern/löschen
$routeParams = [
    'middleware' => 'auth',
    'prefix' => 'todos',
];

$routeFunction = function($route) {
    $route->get('/create', [TodosController::class, 'create'])->name('todos.create');
    $route->get('/edit/{id}', [TodosController::class, 'edit'])->name('todos.edit');
    $route->post('/store', [TodosController::Class, 'store'])->name('todos.store');
    $route->post('/update/{id}', [TodosController::Class, 'update'])->name('todos.update');
    $route->get('/destroy/{id}', [TodosController::Class, 'destroy'])->name('todos.destroy');
};

//muss unter jeder Routing-Gruppe stehen
Route::group($routeParams, $routeFunction);

//Projectday Übung 2:
$routeParams = [
    'middleware' => 'auth',
    'prefix' => 'authors',
];

$routeFunction = function($route) {
    $route->get('/create', [AuthorsController::class, 'create'])->name('authors.create');
    $route->get('/edit/{id}', [AuthorsController::class, 'edit'])->name('authors.edit');
    $route->post('/store', [AuthorsController::Class, 'store'])->name('authors.store');
    $route->post('/update/{id}', [AuthorsController::Class, 'update'])->name('authors.update');
    $route->get('/destroy/{id}', [AuthorsController::Class, 'destroy'])->name('authors.destroy');
};


Route::group($routeParams, $routeFunction);
//alternative Schreibweise (mit den Params direkt in der Gruppe), siehe Dozentenordner
