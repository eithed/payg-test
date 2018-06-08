<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Redirect extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'from', 'to',
    ];

    public function toArray()
    {
    	return [
    		'short_url' => "/".$this->from,
    		'url' => $this->to
    	];
    }
}
