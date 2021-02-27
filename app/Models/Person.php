<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Scopes\ScopePerson;

class Person extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // public static $rules = array(
    //     'name' => 'required',
    //     'mail' => 'email',
    //     'age' => 'integer|min:0|max:150'
    // );

    public static $rules = [
        'name' => ['required'],
        'mail' => ['email'],
        'age' => ['integer', 'min:0', 'max:150'],
    ];

    public function getData()
    {
        return $this->id . ': ' . $this->name . ' (' . $this->age . ')';
    }


    // protected static function boot()
    // {
    //     parent::boot();

    //     // static::addGlobalScope('age', function (Builder $builder) {
    //     //     $builder->where('age', '>', 20);
    //     // });
    //     static::addGlobalScope(new ScopePerson());
    // }

    public function scopeNameEqual($query, $str)
    {
        return $query->where('name', 'like', $str);
    }
    
    public function scopeAgeGreaterThan($query, $n)
    {
        return $query->where('age', '>=', $n);
    }

    public function scopeAgeLessThan($query, $n)
    {
        return $query->where('age', '<=', $n);
    }

}
