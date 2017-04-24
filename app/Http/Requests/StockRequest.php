<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class StockRequest extends FormRequest
{
    /**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'sltParent' => 'required',
			'txtStockName'	=> 'required|unique:stocks,name',
			//'fImages'	=> 'required|image'
		];
	}
	public function messages  () {
		return [
			'sltParent.required'	=> 'Please Choose Category',
			'txtStockName.required'	=> 'Please Enter Name stock',
			'txtStockName.unique'	=> 'Product Name Is Exist'
			// 'fImages.required'	=> 'Please Choose Images',
			// 'fImages.image'	=> 'This File Is Not Images'

		];
	}
}
