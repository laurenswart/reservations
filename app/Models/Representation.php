<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Representation extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'show_id',
        'when',
        'location_id',
    ];

   /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'representations';

   /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the location of the representation
     */
    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    /**
     * Get the show for this representation
     */
    public function show()
    {
        return $this->belongsTo(Show::class);
    }

    /**
     * Get the reservations for this representation
     */
    public function reservations()
    {
        return $this->hasMany(Reservations::class);
    }

    /**
     * Get the users that have a reservation for this representation
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}


