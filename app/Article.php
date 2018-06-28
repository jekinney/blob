<?php

namespace App;

use Carbon\Carbon;
use App\Rules\PublishDate;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /**
    * Always eager load relationships
    *
    * @var array
    */
    protected $with = ['author'];

    /**
    * Set dates as carbon instances
    *
    * @var array
    */
    protected $dates = ['publish_at'];

	/**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
	 * Get the route key for the model.
	 *
	 * @return string
	 */
	public function getRouteKeyName()
	{
	    return 'slug';
	}

    /**
    * Always sluggify incoming slugs
    */
    public function setSlugAttribute($slug)
    {
    	return $this->attributes['slug'] = str_slug( $slug );
    }

    /**
    * Always sluggify incoming slugs
    */
    public function setBodyAttribute($body)
    {
        return $this->attributes['body'] = json_encode( $body );
    }

    /**
    * Always sluggify incoming slugs
    */
    public function getBodyAttribute($body)
    {
        return json_decode( $body );
    }

    //// Relationships

    /**
    * Get the authoring user
    */
    public function author()
    {
        return $this->belongsTo( User::class, 'user_id', 'id' )->select( 'id', 'name' );
    }

    //// Queries

    /**
    * Get a list of articles
    *
    * @return Collection
    */
    public function List()
    {
        return $this->latest()->paginate( 10 );
    }

    /**
    * Get a published list of articles
    *
    * @return Collection
    */
    public function newestList($amount = 5)
    {
        return $this->where( 'publish_at', '<', Carbon::now() )->latest()->limit( $amount )->get();
    }

    /**
    * Get a published list of articles
    *
    * @return Collection
    */
    public function publishedList()
    {
        return $this->where( 'publish_at', '<', Carbon::now() )->latest()->paginate( 10 );
    }

    /**
    * Get a data to show an article
    *
    * @return Model
    */
    public function show()
    {
        return $this;
    }

    /**
    * Get a data to edit an article
    *
    * @return Model
    */
    public function edit()
    {
        return $this;
    }

    /**
    * Create and insert into database
    *
    * @param \Illuminate\Http\Request $request
    * @return Model
    */
    public function store(Request $request)
    {
        return $this->create( $this->validateAndSetData( $request ) );
    }

    /**
    * Update and insert into database
    *
    * @param \Illuminate\Http\Request $request
    * @return Model
    */
    public function renew(Request $request)
    {
        $this->update( $this->validateAndSetData( $request ) );

        return $this->fresh();
    }

    /**
    * Remove an article forever
    *
    * @return boolean
    */
    public function remove()
    {
        return $this->delete();
    }

    /**
    * Validate, set and sanitize data to be inserted into database
    *
    * @param \Illuminate\Http\Request $request
    * @return array
    */
    private function validateAndSetData($request)
    {
        //dd( $request->publish_at );

        $request->validate( $this->validationRules( $request ) );

        return [
            'body' => $request->body,
            'slug' => $request->slug,
            'title' => $request->title,
            'user_id' => $request->user()->id,
            'overview' => $request->overview,
            'publish_at' => Carbon::createFromFormat( 'm-d-Y', $request->publish_at ),
        ];
    }

    /**
    * Set validation rules depending if updating or creating
    *
    * @param \Illuminate\Http\Request $request
    * @return array
    */
    private function validationRules($request)
    {
        $rules = [
            'body' => 'required',
            'slug' => 'required|string|max:120',
            'title' => 'required|string|max:255',
            'overview' => 'required|string|max:255',
            'publish_at' => ['required', new PublishDate],
        ];

        if ( $request->method() == 'post' ) {

            $rules['slug'] = 'unique:articles,slug';
            $rules['title'] = 'unique:articles,title';

        } else {

            $rules['slug'] = 'unique:articles,slug,'. $this->id;
            $rules['title'] = 'unique:articles,title,'. $this->id;

        }

        return $rules;
    }
}
