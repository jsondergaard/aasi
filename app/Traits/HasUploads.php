<?php

namespace App\Traits;

use App\Models\Upload;
use Illuminate\Database\Eloquent\Model;

trait HasUploads
{
	public function uploads()
	{
		return $this->morphMany(Upload::class, 'uploadable');
	}

	public function getUploadsCountAttribute(): int
	{
		return $this->uploads->count();
	}

	public function getImagePathAttribute(): string
	{
		if ($this->uploads()->count() >= 1) {
			return asset("uploads/{$this->uploads()->first()->filename}");
		}

		return asset("no-image.jpg");
	}

	public function getThumbnailPathAttribute(): string
	{
		if ($this->uploads()->count() >= 1) {
			return asset("uploads/thumbnails/{$this->uploads()->first()->filename}");
		}

		return asset("no-image.jpg");
	}
}
