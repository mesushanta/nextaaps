<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Laravel\Scout\Searchable;

class Owner extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'first_name',
        'last_name',
    ];

    # returns all the businesses of the owner through pivot table
    public function businesses() : BelongsToMany {
        return $this->belongsToMany(Business::class);
    }

}
