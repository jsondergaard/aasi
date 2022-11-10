<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Upload extends Model
{
	use HasFactory;

	protected $fillable = [
		'filename', 'user_id',
	];

	public function uploadable()
	{
		return $this->morphTo();
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function getPathAttribute()
	{
		return asset("uploads/{$this->filename}");
	}

	public function getThumbnailPathAttribute()
	{
		return asset("uploads/thumbnails/{$this->filename}");
	}
}
