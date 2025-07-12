<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required | max:255',
            'price' => 'required | integer | between:0,10000',
            'seasons' => 'required',
            'seasons' => 'required | array',
            'seasons.*' => 'exists:seasons,id',
            'description' => 'required | max:120',
            'image' => 'required | image | mimes:png,jpeg,jpg'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '商品名を入力してください',
            'price.required' => '値段を入力してください',
            'price.integer' => '数値で入力してください',
            'price.between' => '0~10000円以内で入力してください',
            'seasons.required' => '季節を選択してください',
            'description.required' => '商品説明を入力してください',
            'description.max' => '120文字以内で入力してください',
            'image.required' => '商品画像を登録してください',
            'image.image' => '「.png」または「.jpeg」形式でアップロードしてください',
            'image.mimes' => '「.png」または「.jpeg」形式でアップロードしてください'
        ];
    }
}
