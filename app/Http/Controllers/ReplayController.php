<?php

namespace App\Http\Controllers;

use App\Models\Replay;
use App\Models\Question;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\ReplyResource;

class ReplayController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('JWT', ['except' => ['index','show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Question $question)
    {

        return  ReplyResource::collection($question->replay);
        // return Replay::latest()->get();


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Question $question, Request $request)
    {
        $reply = $question->replay()->create($request->all());
        return response(['Reply'=> new ReplyResource($reply)] , Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Replay  $replay
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question, Replay $replay)
    {
        return  new ReplyResource($replay);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Replay  $replay
     * @return \Illuminate\Http\Response
     */
    public function update(Question $question, Request $request, Replay $replay)
    {
        $replay->update($request->all());
        return response("Mis a jour effectué avec succes!", Response::HTTP_ACCEPTED );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Replay  $replay
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question, Replay $replay)
    {

        $replay->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
