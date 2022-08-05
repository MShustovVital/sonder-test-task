<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cube extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = ['data'=>'array'];

    public function setDataAttribute(array $data):void
    {
        $this->attributes['data'] = json_encode($data);
    }
}
