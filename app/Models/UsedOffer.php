<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sponsor;
use App\Models\Offer;
use App\Models\User;

class UsedOffer extends Model
{
	use HasFactory;

	protected $fillable = ['user_id', 'sponsor_id', 'offer_id'];

	public function sponsor()
	{
		return $this->belongsTo(Sponsor::class);
	}

	public function offer()
	{
		return $this->belongsTo(Offer::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
