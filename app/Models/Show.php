<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
    use HasFactory;
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slug',
        'title',
        'description',
        'poster_url',
        'location_id',
        'bookable',
        'price'
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'shows';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * Get the location of the show
     */
    public function location(){
        return $this->belongsTo(Location::class);
    }

    /**
     * Get the representations of the show
     */
    public function representations(){
        return $this->hasMany(Representation::class);
    }

    /**
     * Get the performances (artists in a type of collaboration) for the show
     */
    public function artistTypes()
    {
        return $this->belongsToMany(ArtistType::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    
}
