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
        return view('games.index');
    }

    /**
     * Display the specified resource.
     *
     * @param string $slug
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(string $slug)
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
                        aggregated_rating,
                        slug,
                        involved_companies.company.name,
                        genres.name,
                        summary,
                        websites.*,
                        videos.*,
                        screenshots.*;
                    where slug=\"{$slug}\";
                ", "text/plain"
            )
            ->post('https://api.igdb.com/v4/games')
            ->json();

        abort_if(! $game, 404);

        return view('games.show', [
            'game' => $this->formatForView($game[0])
        ]);
    }

    private function formatForView($game)
    {
        return collect($game)->merge([
            'coverImageUrl' => isset($game['cover']) ? Str::replaceFirst(
                'thumb',
                'cover_big',
                $game['cover']['url']
            ) : asset('/img/cover_not_found.jpg'),
            'genres' => collect($game['genres'])->pluck('name')->filter()->implode(', '),
            'involvedCompanies' => collect($game['involved_companies'])->pluck('company.name')->filter()->implode(', '),
            'platforms' => collect($game['platforms'])->pluck('abbreviation')->filter()->implode(', '),
            'trailer' => isset($game['videos'][0]['video_id'])
                ? 'https://youtube.com/embed/'.$game['videos'][0]['video_id']
                : null,
            'memberRating' => isset($game['rating'])
                ? round($game['rating'])
                : null,
            'criticRating' => isset($game['aggregated_rating'])
                ? round($game['aggregated_rating'])
                : null,
            'screenshots' => collect($game['screenshots'])->map(function ($screenshot) {
                return [
                  'huge' => Str::replaceFirst('thumb', 'screenshot_huge', $screenshot['url']),
                  'big' => Str::replaceFirst('thumb', 'screenshot_big', $screenshot['url'])
                ];
            })->take(9),
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
}
