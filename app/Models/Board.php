<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Board extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public static $rules = [
        'person_id' => 'required',
        'title' => 'required',
        'message' => 'required',
    ];

    public function person()
    {
        return $this->belongsTo('App\Models\Person');
    }

    public function getData(): string
    {
        return $this->id . ': ' . $this->title ;
    }
}
