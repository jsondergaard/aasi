<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Offer;
use App\Models\User;

class Sponsor extends Model
{
	use HasFactory;

	public function offers()
	{
		return $this->hasMany(Offer::class);
	}

	public function author()
	{
		return $this->belongsTo(User::class);
	}
}
