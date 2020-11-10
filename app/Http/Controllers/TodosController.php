<?php

namespace App\Http\Controllers;

use App\Models\Todos;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TodosController extends Controller
{
    private $validationRules = [
        'text' => ['required', 'min:3'],
        'done' => []
    ];
    private $validationMessages = [
        'text.required' => 'Bitte ein Todo eingeben',
        'text.min' => "Das Todo muss mindestens :min Zeichen enthalten",
    ];

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $todos = Todos::all();
        //kurzschreibweise:
        //$viewPrefix = auth()->check()? admin : public;
        if (auth()->check()) {
            return view('admin.todos.index', ['todos' => $todos]);
        } else {
            return view('public.todos.index', ['todos' => $todos]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.todos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //dd($request->post());
        //form-validation
        $validated = $request->validate($this->validationRules, $this->validationMessages);
        //mass-assignment (corresponding w Todo-Model):
        Todos::create($validated);

        //neues formular erstellen mit den formulardaten (ohne mass-assignment):
        //$todo = new Todos();
        //$todo->text = $request->text;
        //$todo->done = $request->has('done') ? 1 : 0;
        //$todo->save();

        return redirect('todos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $todo = Todos::find($id);
        return view('public.todos.show', ['todo' => $todo]);

        /*
         * if ($todo) {
         * return "<h1>Todo: $todo->text</h1>";
         * }
         * else {
         * return "Kann Todo mit Nr. $id nicht finden.";
         * }
        */
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(int $id)
    {
        $todo = Todos::find($id);
        return view('admin.todos.edit', ['todo' => $todo]);
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
        $validated = $request->validate($this->validationRules, $this->validationMessages);
        //mass-assignment (corresponding w Todo-Model):
        Todos::find($id)->update($validated);

        //$todo = Todos::find($id);
        //$todo->text = $request->text;
        //$todo->done = $request->has('done') ? 1 : 0;
        //$todo->save();

        return redirect('todos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Todos::find($id)->delete();
        return redirect('todos');
    }
}
