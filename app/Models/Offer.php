<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sponsor;
use App\Traits\HasUploads;
use Intervention\Image\Facades\Image as Image;

class Offer extends Model
{
	use HasFactory, HasUploads;

	protected $fillable = ['name', 'description', 'sponsor_id'];

	public function sponsor()
	{
		return $this->belongsTo(Sponsor::class);
	}

	public function activate()
	{
		UsedOffer::create([
			'user_id' => auth()->id(),
			'sponsor_id' => $this->sponsor->id,
			'offer_id' => $this->id,
		]);

		return true;
	}

	public function upload($image)
	{
		$file = request()->file('image');
		$storage_path = storage_path() . '/app/public/uploads';
		$name = $this->id . '-' . uniqid() . '.' . $file->getClientOriginalExtension();

		Image::make($file->getRealPath())->fit(512, 512, function ($constraint) {
			$constraint->upsize();
		})->save("{$storage_path}/thumbnails/{$name}", 60);

		Image::make($file->getRealPath())->save("{$storage_path}/{$name}", 80);

		$this->uploads()->create([
			'user_id' => auth()->id(),
			'filename' => $name,
			'uploadable_id' => $this->id,
			'uploadable_type' => 'App\Models\Offer'
		]);
	}
}
