<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sponsor;

class Offer extends Model
{
	use HasFactory;

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
}
