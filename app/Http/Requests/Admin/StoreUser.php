<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUser extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return auth()->user()->hasPermissionTo('create user') || auth()->user()->hasPermissionTo('update user');
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
				Rule::unique('users')->ignore($this->route('user'))
			],
			'email' => 'required|email',
			'gender' => 'required',
			'role' => '',
		];
	}
}
