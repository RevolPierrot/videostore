<?php
namespace App\Http\Controllers\Api;

use Exception;
use App\Models\Todos;
use Illuminate\Http\Response;
use App\Http\Requests\TodosRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\TodosResource;

class ApiTodosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data = Todos::all('id','text','done');
        if ($data) {
            $response = [
                'success'   => true,
                'errors'    => null,
                'result'    => TodosResource::collection($data),
            ];
        } else {
            $response = [
                'success'   => false,
                'errors'    => ["Keine Todos vorhanden"],
                'result'    => null,
            ];
        }
        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param Todo $todo
     * @return Response
     */
    public function show($id)
    {
        $data = Todos::find($id);
        if ($data) {
            $response = [
                'success'   => true,
                'errors'    => null,
                'result'    => new TodosResource($data),
            ];
        } else {
            $response = [
                'success'   => false,
                'errors'    => ["Kann Todo mit ID: $id nicht finden"],
                'result'    => null,
            ];
        }
        return response()->json($response);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TodosRequest $request
     * @return Response
     */
    public function store(TodosRequest $request)
    {
        if ($request->validator && $request->validator->fails()) {
            $response = [
                'success'   => false,
                'errors'    => $request->validator->errors(),
                'result'    => null,
            ];
        } else {
            $result = Todos::create($request->validated());
            $response = [
                'success'   => true,
                'errors'    => null,
                'result'    => new TodosResource($result),
            ];
        }
        return response()->json($response);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  TodosRequest  $request
     * @param Todos $todo
     * @return Response
     */
    public function update(TodosRequest $request, Todos $todo)
    {
        if ($request->validator && $request->validator->fails()) {
            $response = [
                'success'   => false,
                'errors'    => $request->validator->errors(),
                'result'    => null,
            ];
        } else {
            $todo->update($request->validated());
            $response = [
                'success'   => true,
                'errors'    => null,
                'result'    => new TodosResource($todo),
            ];
        }
        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Todos $todo
     * @return Response
     */
    public function destroy(Todos $todo)
    {
        try {
            $result = $todo->delete();
            $response = [
                'success'   => true,
                'errors'     => null,
                'result'    => $result,
            ];
        } catch (Exception $e) {
            $response = [
                'success'   => false,
                'errors'    => [$e->getMessage()],
                'result'    => null,
            ];
        }

        return response()->json($response);
    }
}
