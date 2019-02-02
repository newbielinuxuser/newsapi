<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
	protected $fillable = [
		'source_name',
		'author',
		'title',
		'description',
		'url',
		'urlToImage',
		'publishedAt',
		'content',
		'country',
		'category',
		'status_code',
		'source_url',
		'domain',
	];
}
