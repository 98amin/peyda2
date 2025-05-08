<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $fillabel = ['name'];

    public function people()
    {
        return $this->hasMany(Person::class);
    }
}
