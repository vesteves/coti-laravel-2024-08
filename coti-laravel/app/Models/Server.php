<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    use HasFactory;

    protected $table = 'servers';

    protected $fillable = [
        'name',
        'max',
        'game_id',
    ];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}
