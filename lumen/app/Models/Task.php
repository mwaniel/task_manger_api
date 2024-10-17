<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillables =[
        'title','description','status','due_date'
    ];

    protected $attributes = [
        'status'=>'pending',
    ];
}
