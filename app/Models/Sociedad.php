<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sociedad extends Model
{
    use HasFactory;
    protected $table = "sociedades";
    protected $primaryKey = "id";
    public $timestamps = false;
}
