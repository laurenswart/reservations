<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;


class Show extends Model implements Feedable
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
        'price',
        'category_id'
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

    public function toFeedItem(): FeedItem
    {
        return FeedItem::create()
            ->id($this->id)
            ->title($this->title)
            ->summary($this->description)
            ->updated($this->created_at)    //Gérer le cas ou le champ est null
            ->link($this->slug)                        //Fournir l'URL qui affiche le show
            ->authorName('')                         //Peut laisser à '' ou l'auteur du spectacle
            ->authorEmail('');
    }

    public static function getFeedItems()
    {
    return Show::all();
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    

}
