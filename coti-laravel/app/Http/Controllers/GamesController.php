<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GamesController extends Controller
{
    private $games = [
        [
            "id" => 1,
            "name" => "Sekiro"
        ],
        [
            "id" => 2,
            "name" => "Tibia"
        ],
        [
            "id" => 3,
            "name" => "BrasFoot"
        ],
    ];

    public function index()
    {
        return view('games.index', ["games" => $this->games]);
    }

    public function edit(Request $request)
    {
        $game = null;
        foreach ($this->games as $gameRaw) {
            if ($gameRaw["id"] == $request->id) {
                $game = $gameRaw;
            }
        }
        return view('games.edit', ["game" => $game]);
    }

    public function create()
    {
        return view('games.create');
    }

    public function destroy(Request $request)
    {
        $game = null;
        foreach ($this->games as $gameRaw) {
            if ($gameRaw["id"] == $request->id) {
                $game = $gameRaw;
            }
        }

        return view('games.destroy', ["game" => $game]);
    }
}
