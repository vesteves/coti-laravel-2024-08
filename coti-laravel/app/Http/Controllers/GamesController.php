<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class GamesController extends Controller
{
    public function index()
    {
        $games = Game::all();

        return view('games.index', ["games" => $games])
            ->with('message', session('message'))
            ->with('messageType', session('messageType'));
    }

    public function create()
    {
        return view('games.create');
    }

    public function store(Request $request)
    {
        try {
            Game::create([
                "name" => $request->name
            ]);

            return Redirect::route('games.index')
                ->with('messageType', 'success')
                ->with('message', 'Jogo criado!');
        } catch (\Throwable $th) {
            report($th);
            return Redirect::route('games.index')
                ->with('messageType', 'danger')
                ->with('message', $th->getMessage());
        }
    }

    public function edit(Game $game)
    {
        return view('games.edit', ["game" => $game]);
    }

    public function update(Game $game, Request $request)
    {
        try {
            $game->name = $request->name;
            $game->save();

            return Redirect::route('games.index')
                ->with('messageType', 'success')
                ->with('message', 'Jogo atualizado!');
        } catch (\Throwable $th) {
            report($th);
            return Redirect::route('games.index')
                ->with('messageType', 'danger')
                ->with('message', $th->getMessage());
        }
    }

    public function destroy(Game $game)
    {
        try {
            $game->delete();

            return Redirect::route('games.index')
                ->with('messageType', 'success')
                ->with('message', 'Jogo removido!');
        } catch (\Throwable $th) {
            report($th);
            return Redirect::route('games.index')
                ->with('messageType', 'danger')
                ->with('message', $th->getMessage());
        }
    }
}
