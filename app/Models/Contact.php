<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Contact extends Model
{
	use HasFactory;

	public function contact()
	{
        
		return $this->belongsTo(User::class);
	}
}