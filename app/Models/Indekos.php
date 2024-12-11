<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Indekos extends Model
{
    protected $table = 'indekos';

    public function rooms() {
        return $this->hasMany(Room::class, 'indekos_id', 'id');
    }
}
