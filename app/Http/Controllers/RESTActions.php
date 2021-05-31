<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

trait RESTActions
{
    /**
     * @OA\Post(path="/user",
     *   tags={"user"},
     *   summary="Create user",
     *   description="This can only be done by the logged in user.",
     *   operationId="createUser",
     *   @OA\RequestBody(
     *       required=true,
     *       description="Created user object",
     *       @OA\MediaType(
     *           mediaType="multipart/form-data",
     *           @OA\Schema(ref="#/components/schemas/User")
     *       )
     *   ),
     *   @OA\Response(response="default", description="successful operation")
     * )
     */
    public function all(Request $request)
    {
        $m = self::MODEL;
        return  $this->respond($m::with('user')->get());
    }

    public function get($id)
    {
        $m = self::MODEL;
        $model = $m::find($id);

        if (is_null($model)) {
            return $this->respond([], Response::HTTP_NOT_FOUND);
        }

        return $this->respond($model);
    }

    public function add(Request $request)
    {
        $m = self::MODEL;

        if (!$request->has('user_id'))
            $request->request->add(['user_id' => Auth::user()->id]);

        $this->validate($request, $m::$rules);
        return $this->respond($m::create($request->all()), Response::HTTP_CREATED);
    }

    public function put(Request $request, $id)
    {
        $m = self::MODEL;

        if (!$request->has('user_id'))
            $request->request->add(['user_id' => Auth::user()->id]);

        $this->validate($request, $m::$rules);
        $model = $m::find($id);

        if (is_null($model)) {
            return $this->respond([], Response::HTTP_NOT_FOUND);
        }

        $model->update($request->all());
        return $this->respond($model);
    }

    public function remove($id)
    {
        $m = self::MODEL;

        if (is_null($m::find($id))) {
            return $this->respond([], Response::HTTP_NOT_FOUND);
        }

        $m::destroy($id);
        return $this->respond([], Response::HTTP_NO_CONTENT);
    }

    protected function respond($data = [], $status = Response::HTTP_OK)
    {
        return response()->json($data, $status);
    }
}
