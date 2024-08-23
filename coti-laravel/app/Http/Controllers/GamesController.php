<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\GamesExport;

class GamesController extends Controller
{
    public function index()
    {
        $games = Game::paginate(2);

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
        $avatar = $request->avatar->store('public');

        try {
            Game::create([
                "name" => $request->name,
                "avatar" => $avatar
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
        if ($request->hasFile('avatar')) {
            $avatar = $request->avatar->store('public');
            // no geral, criamos um cronjob que remova as imagens que não
            // estão ligadas à nenhum registro
            Storage::delete($game->avatar);
        } else {
            $avatar = $game->avatar;
        }

        try {
            $game->name = $request->name;
            $game->avatar = $avatar;
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

    public function export()
    {
        return Excel::download(new GamesExport, 'games.xlsx');
    }
}
