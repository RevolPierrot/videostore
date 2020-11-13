<?php

namespace App\Http\Controllers;

use App\Models\Authors;
use App\Models\Movies;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MoviesController extends Controller
{
    /*private $validationRules = [
        'author_id' => ['required', 'min:1'],
        'title' => ['required', 'min:1'],
        'price' => ['required', 'min:1']
    ];
    private $validationMessages = [
        'author_id.required' => 'Bitte einen Autoren eingeben',
        'author_id.min' => "Der Autor muss mindestens :min Zeichen enthalten",
        'title.required' => 'Bitte einen Titel eingeben',
        'title.min' => "Der Titel muss mindestens :min Zeichen enthalten",
        'price.required' => 'Bitte einen Preis eingeben',
        'price.min' => "Der Preis muss mindestens :min Zeichen enthalten"
    ];
    */

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data = Movies::all();
        //kurzschreibweise:
        //$viewPrefix = auth()->check()? admin : public;
        if (auth()->check()) {
            return view('admin.movies.index', ['data' => $data]);
        } else {
            return view('public.movies.index', ['data' => $data]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.movies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //form-validation
        //$validated = $request->validate($this->validationRules, $this->validationMessages);
        //mass-assignment (corresponding w Movies-Model):
        //Movies::create($validated);
        $movie = new Movies();
        $movie->author_id = $request->author_id;
        $movie->title = $request->title;
        $movie->price = $request->price;
        $movie->save();
        return redirect('movies');
    }

    /**
     * Display the specified resource.
     *
     * @param Movies $id
     * @return Response
     */
    public function show($id)
    {
        $data = Movies::find($id);
        if ($data) {
            return view('public.movies.show', ['data' => $data]);
        }
        else {
            return view('errors.message', ['message' => "Sorry, Movie mit der ID $id gibts nicht."]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Movies $id
     * @return Response
     */
    public function edit($id)
    {
        $data = Movies::find($id);
        return view('admin.movies.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Movies $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //form-validation
        $validated = $request->validate($this->validationRules, $this->validationMessages);
        //mass-assignment (corresponding w Author-Model):
        Movies::find($id)->update($validated);
        return redirect('movies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Movies::find($id)->delete();
        return redirect('movies');
    }
}
