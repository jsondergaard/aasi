<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Department;
use App\Models\Offer;

class User extends Authenticatable
{
	use HasApiTokens, HasFactory, HasRoles, Notifiable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array<int, string>
	 */
	protected $fillable = [
		'name',
		'email',
		'password',
	];

	/**
	 * The attributes that should be hidden for serialization.
	 *
	 * @var array<int, string>
	 */
	protected $hidden = [
		'password',
		'remember_token',
	];

	/**
	 * The attributes that should be cast.
	 *
	 * @var array<string, string>
	 */
	protected $casts = [
		'email_verified_at' => 'datetime',
	];

	public function departments()
	{
		return $this->belongsToMany(Department::class)->withTimestamps();
	}

	public function memberOf(Department $department)
	{
		return $this->departments->find($department);
	}

	public function getListDepartmentsAttribute()
	{
		$departmentsList = '';

		if ($this->departments) {
			foreach ($this->departments as $department) {
				$departmentsList .= $department->name;
			}
		}
		return $departmentsList;
	}

	public function usedOffer(Offer $offer)
	{
		$cooldown = ($offer->cooldown) ? now()->subSeconds($offer->cooldown) : now()->subMinutes(5);

		if ($usedOffer = UsedOffer::where([
			'user_id' => auth()->id(),
			'offer_id' => $offer->id,
		])->whereBetween('created_at', [$cooldown, now()])->first()) {
			return $usedOffer->created_at;
		}
	}
}
