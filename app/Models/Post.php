<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $sam_property = 'что-то';
    protected $table = 'posts';
    use HasFactory;
}
