<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePage extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return auth()->user()->hasPermissionTo('create page') || auth()->user()->hasPermissionTo('update page');
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'name' => [
				'required',
				Rule::unique('pages')->ignore($this->route('page'))
			],
			'content' => 'required',
			'parent_id' => 'numeric',
			'is_page' => '',
		];
	}
}
