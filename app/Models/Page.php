<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use App\Models\User;

class Page extends Model
{
	use HasFactory, Sluggable, SluggableScopeHelpers;

	/**
	 * Get the route key for the model.
	 *
	 * @return string
	 */
	public function getRouteKeyName()
	{
		return 'slug';
	}

	/**
	 * @var array
	 */
	protected $guarded = ['created_at', 'id'];

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function parent(): \Illuminate\Database\Eloquent\Relations\BelongsTo
	{
		return $this->belongsTo(__CLASS__);
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function children(): \Illuminate\Database\Eloquent\Relations\HasMany
	{
		return $this->hasMany(__CLASS__, 'parent_id', 'id');
	}

	public function author()
	{
		return $this->belongsTo(User::class);
	}

	/**
	 * @return string
	 */
	public function getPathAttribute(): string
	{
		return route('page', [
			'page' => $this
		]);
	}

	/**
	 * @return string
	 */
	public function getDisplaySelfAttribute(): string
	{
		return false;
	}

	/**
	 * Return the sluggable configuration array for this model.
	 *
	 * @return array
	 */
	public function sluggable(): array
	{
		return [
			'slug' => [
				'source' => 'name',
				'onUpdate' => true
			]
		];
	}
}
