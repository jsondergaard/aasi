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
}
