<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Scout\Searchable;

class Address extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'street',
        'house_number',
        'unit',
        'city',
        'postcode',
        'country_id',
        'business_id',
    ];

    # return the country of the address
    public function country() : BelongsTo {
        return $this->belongsTo(Country::class);
    }

    # return the business of the address
    public function business() : BelongsTo {
        return $this->belongsTo(Business::class);
    }

}
