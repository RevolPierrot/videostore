<?php

namespace App\Http\Controllers;

use App\Models\Authors;
use App\Models\Todos;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthorsController extends Controller
{
    private $validationRules = [
        'firstname' => ['required', 'min:3'],
        'lastname' => ['required', 'min:3']
];
    private $validationMessages = [
        'firstname.required' => 'Bitte einen Vornamen eingeben',
        'firstname.min' => "Der Vorname muss mindestens :min Zeichen enthalten",
        'lastname.required' => 'Bitte einen Nachnamen eingeben',
        'lastname.min' => "Der Nachname muss mindestens :min Zeichen enthalten"
    ];
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data = Authors::all();
        //kurzschreibweise:
        //$viewPrefix = auth()->check()? admin : public;
        if (auth()->check()) {
            return view('admin.authors.index', ['data' => $data]);
        } else {
            return view('public.authors.index', ['data' => $data]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.authors.create');
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
        $validated = $request->validate($this->validationRules, $this->validationMessages);
        //mass-assignment (corresponding w Author-Model):
        Authors::create($validated);
        return redirect('authors');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $data = Authors::find($id);
        if ($data) {
            return view('public.authors.show', ['data' => $data]);
        }
        else {
            return view('errors.message', ['message' => "Sorry, Autor mit der ID $id gibts nicht."]);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $data = Authors::find($id);
        return view('admin.authors.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //form-validation
        $validated = $request->validate($this->validationRules, $this->validationMessages);
        //mass-assignment (corresponding w Author-Model):
        Authors::find($id)->update($validated);
        return redirect('authors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Authors::find($id)->delete();
        return redirect('authors');
    }
}
