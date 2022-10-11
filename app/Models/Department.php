<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Department extends Model
{
	use HasFactory;

	public function author()
	{
		return $this->belongsTo(User::class);
	}
}
