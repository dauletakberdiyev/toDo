<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assign extends Model
{
    use HasFactory;
    protected $table = 'access';
    protected $fillable = [
        'user_id',
        'todo_id',
        'readable',
        'editable'
    ];
}
