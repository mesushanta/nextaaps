<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;

class Country extends Model
{
    use HasFactory, Searchable;

    public $timestamps = false;

    protected $fillable = [
        'country_code',
        'phone_code',
        'name',
    ];

    # return all the addresses related to this country
    public function addresses() : HasMany {
        return $this->hasMany(Business::class);
    }

    # return all the businesses in the country through addresses table
    public function businesses() : BelongsToMany
    {
        return $this->belongsToMany(Business::class, 'addresses');
    }

}
