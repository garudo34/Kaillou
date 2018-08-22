<?php

namespace App\Http\Controllers;


use App\Anime;
use App\Composer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Smw\Transformers\AnimeTransformer;


class AnimeController extends ApiController
{

    protected $animeTransformer;

    function __construct(AnimeTransformer $animeTransformer)
    {
        $this->animeTransformer = $animeTransformer;
    }

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $animes = Anime::orderBy('title')->get();

        return $this->respond($this->animeTransformer->transformCollection($animes->toArray()));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $anime = Anime::create($request->all());
        return response()->json($anime, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param Anime $anime
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     * @internal param int $id
     */
    public function show(Anime $anime)
    {
        $result = $anime->with(['songs', 'composers'])->findOrFail($anime);

        if (!$result) {
            return $this->respondNotFound('Anime does not exist');
        }
//        dd($this->animeTransformer->transform($result));

        return $this->respond($result);
//        return response()->json($result, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Composer $composer
     * @return Response
     * @internal param int $id
     */
    public function edit(Composer $composer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Anime $anime
     * @return Response
     * @internal param int $id
     */
    public function update(Request $request, Anime $anime)
    {
        $anime->update($request->all());
        return response()->json($anime, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Anime $anime
     * @return Response
     * @internal param int $id
     */
    public function destroy(Anime $anime)
    {
        $anime->delete();
        return response()->json(null, 204);
    }
}
