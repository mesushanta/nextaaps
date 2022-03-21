<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;

class Business extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'name',
        'description'
    ];


    # returns all the addresses of the business
    public function addresses() : HasMany {
        return $this->hasMany(Address::class);
    }

    # returns all the owners of the business through pivot table
    public function owners() : BelongsToMany
    {
        return $this->belongsToMany(Owner::class);
    }

    # returns all the countries of the business through addresses table
    public function countries() : BelongsToMany
    {
        return $this->belongsToMany(Country::class, 'addresses');
    }

    # Adding the fields to the searchable index using scout via relationship
    public function toSearchableArray() : array
    {
        $return =
            [
                $this->only('name','description'),
                $this->addresses->pluck('street'),
                $this->countries->pluck('name'),
                $this->owners->pluck('first_name','last_name'),
            ];

        $return['country'] = array();

        # Adding related countries' id to searchable array make it filterable
        $this->countries->each(function(Country $country) use (&$return, &$index) {
            $return['country'][] = $country->id;
        });
        return $return;
    }


}
