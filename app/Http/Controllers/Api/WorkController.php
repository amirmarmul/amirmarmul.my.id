<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWorkRequest;
use App\Http\Resources\WorkResource;
use App\Models\Work;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $works = QueryBuilder::for(Work::class)
            ->jsonPaginate();

        return WorkResource::collection($works);
    }

    /**
     * Store a newly created resource in storage.s
     *
     * @param  App\Http\Requests\StoreWorkRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWorkRequest $request)
    {
        $work = $request->save();

        return WorkResource::make($work);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function show(Work $work)
    {
        return WorkResource::make($work);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWorkRequest  $request
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Work $work)
    {
        $work = $request->save();

        return WorkResource::make($work);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function destroy(Work $work)
    {
        $work->delete();

        return response()->noContent();
    }
}
