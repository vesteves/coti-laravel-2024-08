<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ServerController extends Controller
{
    private $servers = [
        [
            "id" => 1,
            "name" => "Server 1",
            "max" => 100
        ],
        [
            "id" => 2,
            "name" => "Server 2",
            "max" => 150
        ],
        [
            "id" => 3,
            "name" => "Server 3",
            "max" => 200
        ],
    ];

    public function index()
    {
        return view('servers.index', ["servers" => $this->servers]);
    }

    public function create()
    {
        return view('servers.create');
    }

    public function store(Request $request)
    {
        // return view('servers.index', ["servers" => $this->servers])
        //     ->with('messageType', 'danger')
        //     ->with('message', 'Falha ao criar servidor.');

        array_push($this->servers, [
            "id" => count($this->servers) + 1,
            "name" => $request->name,
            "max" => $request->max
        ]);

        // return Redirect::route('servers.index');
        return view('servers.index', ["servers" => $this->servers])
            ->with('messageType', 'success')
            ->with('message', 'Servidor criado!');
    }

    public function edit(Request $request)
    {
        // Dump and Die
        // dd($request->id);

        $server = null;

        foreach ($this->servers as $serverRaw) {
            if ($serverRaw["id"] == $request->id) {
                $server = $serverRaw;
            }
        }

        return view('servers.edit', ["server" => $server]);
    }

    public function update(Request $request)
    {
        // return view('servers.index', ["servers" => $this->servers])
        //     ->with('messageType', 'danger')
        //     ->with('message', 'Falha ao atualizar servidor.');

        foreach ($this->servers as $index => $server) {
            if ($server["id"] == $request->id) {
                $this->servers[$index]["name"] = $request->name;
                $this->servers[$index]["max"] = $request->max;
            }
        };

        // return Redirect::route('servers.index');
        return view('servers.index', ["servers" => $this->servers])
            ->with('messageType', 'success')
            ->with('message', 'Servidor atualizado!');
    }

    public function destroy(Request $request)
    {
        $server = null;

        foreach ($this->servers as $serverRaw) {
            if ($serverRaw["id"] == $request->id) {
                $server = $serverRaw;
            }
        }

        return "Pronto para deletar o servidor " . $server["name"];
    }
}
