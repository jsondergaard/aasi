<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sponsor;

class Offer extends Model
{
	use HasFactory;

	public function sponsor()
	{
		return $this->belongsTo(Sponsor::class);
	}
}
