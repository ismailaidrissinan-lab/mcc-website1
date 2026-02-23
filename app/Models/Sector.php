<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    protected $fillable = ['name', 'slug', 'description', 'image_path'];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
