<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServerController extends Controller
{
    private $servidores = [
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
        return view('servers.index', ["servidores" => $this->servidores]);
    }

    public function create()
    {
        return view('servers.create');
    }

    public function edit(Request $request)
    {
        // Dump and Die
        // dd($request->id);

        $servidor = null;

        foreach ($this->servidores as $servidorRaw) {
            if ($servidorRaw["id"] == $request->id) {
                $servidor = $servidorRaw;
            }
        }

        return view('servers.edit', ["servidor" => $servidor]);
    }

    public function destroy(Request $request)
    {
        $servidor = null;

        foreach ($this->servidores as $servidorRaw) {
            if ($servidorRaw["id"] == $request->id) {
                $servidor = $servidorRaw;
            }
        }

        return "Pronto para deletar o servidor " . $servidor["name"];
    }
}
