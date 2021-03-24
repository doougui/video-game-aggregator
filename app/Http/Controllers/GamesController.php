<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param string $slug
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($slug)
    {
        $game = Http::withHeaders(config('services.igdb'))
            ->withBody(
        "
                    fields
                        name,
                        cover.url,
                        first_release_date,
                        total_rating_count,
                        platforms.abbreviation,
                        rating,
                        slug,
                        involved_companies.company.name,
                        genres.name,
                        aggregated_rating,
                        summary,
                        websites.*,
                        videos.*,
                        screenshots.*,
                        similar_games.rating,
                        similar_games.name,
                        similar_games.slug,
                        similar_games.cover.url,
                        similar_games.platforms.abbreviation;
                    where slug=\"{$slug}\";
                ", "text/plain"
            )
            ->post('https://api.igdb.com/v4/games')
            ->json()[0];

        abort_if(! $game, 404);

        $game = $this->formatForView($game);

        return view('show', compact('game'));
    }

    private function formatForView($game)
    {
        return collect($game)->merge([
            'coverImageUrl' => Str::replaceFirst(
                'thumb',
                'cover_big',
                $game['cover']['url']
            ),
            'genres' => collect($game['genres'])->pluck('name')->filter()->implode(', '),
            'involvedCompanies' => collect($game['involved_companies'])->pluck('company.name')->filter()->implode(', '),
            'platforms' => collect($game['platforms'])->pluck('abbreviation')->filter()->implode(', '),
            'memberRating' => isset($game['rating'])
                ? round($game['rating']) . '%'
                : null,
            'criticRating' => isset($game['aggregated_rating'])
                ? round($game['aggregated_rating']) . '%'
                : null,
            'screenshots' => collect($game['screenshots'])->map(function ($screenshot) {
                return [
                  'huge' => Str::replaceFirst('thumb', 'screenshot_huge', $screenshot['url']),
                  'big' => Str::replaceFirst('thumb', 'screenshot_big', $screenshot['url'])
                ];
            })->take(9),
            'similarGames' => collect($game['similar_games'])->map(function ($game) {
                return collect($game)->merge([
                    'coverImageUrl' => Str::replaceFirst(
                        'thumb',
                        'cover_big',
                        $game['cover']['url']
                    ),
                    'rating' => isset($game['rating'])
                        ? round($game['rating']) . '%'
                        : null,
                    'platforms' => collect($game['platforms'])->pluck('abbreviation')->filter()->implode(', ')
                ]);
            })->take(6),
            'social' => [
                'website' => collect($game['websites'])->first(),
                'facebook' => collect($game['websites'])->filter(function ($website) {
                   return Str::contains($website['url'], 'facebook');
                })->first(),
                'twitter' => collect($game['websites'])->filter(function ($website) {
                    return Str::contains($website['url'], 'twitter');
                })->first(),
                'instagram' => collect($game['websites'])->filter(function ($website) {
                    return Str::contains($website['url'], 'instagram');
                })->first(),
            ]
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
