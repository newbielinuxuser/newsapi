<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FailedRequest extends Model
{
	protected $fillable = [
		'status',
		'code',
		'message',
		'category',
		'country',
		'source_url',
		'domain',
		'api',
	];
}
