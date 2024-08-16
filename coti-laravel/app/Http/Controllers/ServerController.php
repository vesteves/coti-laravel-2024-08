<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Server;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\StoreServerRequest;

class ServerController extends Controller
{
    public function index()
    {
        $servers = Server::with(['game'])->get();

        return view('servers.index', ["servers" => $servers])
            ->with('message', session('message'))
            ->with('messageType', session('messageType'));
    }

    public function create()
    {
        $games = Game::all();

        return view('servers.create', [
            "games" => $games
        ]);
    }

    public function store(StoreServerRequest $request)
    {
        try {
            Server::create([
                "name" => $request->name,
                "max" => $request->max,
                "game_id" => $request->game_id,
            ]);

            return Redirect::route('servers.index')
                ->with('messageType', 'success')
                ->with('message', 'Servidor criado!');
        } catch (\Throwable $th) {
            report($th);
            return Redirect::route('servers.index')
                ->with('messageType', 'danger')
                ->with('message', $th->getMessage());
        }
    }

    public function edit(Server $server)
    {
        $games = Game::all();

        return view('servers.edit', [
            "server" => $server,
            "games" => $games
        ]);
    }

    public function update(Server $server, Request $request)
    {
        try {
            $server->name = $request->name;
            $server->max = $request->max;
            $server->game_id = $request->game_id;

            $server->save();

            return Redirect::route('servers.index')
                ->with('messageType', 'success')
                ->with('message', 'Servidor atualizado!');
        } catch (\Throwable $th) {
            report($th);
            return Redirect::route('servers.index')
                ->with('messageType', 'danger')
                ->with('message', $th->getMessage());
        }
    }

    public function destroy(Server $server)
    {
        try {
            $server->delete();

            return Redirect::route('servers.index')
                ->with('messageType', 'success')
                ->with('message', 'Servidor removido!');
        } catch (\Throwable $th) {
            report($th);
            return Redirect::route('servers.index')
                ->with('messageType', 'danger')
                ->with('message', $th->getMessage());
        }
    }
}
