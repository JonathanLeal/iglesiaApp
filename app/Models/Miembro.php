<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Miembro extends Model
{
    protected $table = "miembros";
    protected $primaryKey = "id";
    public $timestamps = false;
}
