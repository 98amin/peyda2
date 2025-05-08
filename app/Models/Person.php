<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'status_id', 'hospital'];

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
