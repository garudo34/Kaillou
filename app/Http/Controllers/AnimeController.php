<?php

namespace App\Http\Controllers;


use App\Anime;
use App\Http\Requests\AnimeRequest;
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

        return $this->respond($this->animeTransformer->transformCollection($animes->toArray()),
            'Animes retrieved successfully.');
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
     * @param AnimeRequest|Request $request
     * @return Response
     */
    public function store(AnimeRequest $request)
    {
        $input = $request->all();

        if (isset($request->validator) && $request->validator->fails()) {
            return $this->respondValidationError('Validation Error', $request->validator->errors());
        }

        $anime = Anime::create($input);

        return $this->respondCreated($anime, 'Animes created successfully.');
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
        $result = $anime::with([
            'composers' => function ($q) use ($anime) {
                $q->where('anime_id', $anime->id);
            },
            'songs'     => function ($q) use ($anime) {
                $q->where('anime_id', $anime->id);
            },
        ])->first();

        return $this->respond($result, 'Anime retrieved successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Anime $anime
     * @return Response
     * @internal param int $id
     */
    public function edit(Anime $anime)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AnimeRequest|Request $request
     * @param Anime $anime
     * @return Response
     * @internal param int $id
     */
    public function update(AnimeRequest $request, Anime $anime)
    {
        $input = $request->all();

        if (isset($request->validator) && $request->validator->fails()) {
            return $this->respondValidationError('Validation Error', $request->validator->errors());
        }

        $anime->fill($input)->save();

        return $this->respond($anime, 'Anime updated successfully.');
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
        return $this->respond($anime, 'Product deleted successfully.');
    }
}
