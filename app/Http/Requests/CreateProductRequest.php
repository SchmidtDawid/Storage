<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
            'product_name' => 'required|min:3|max:40',
            'description' => 'required|min:6',
            'value' => 'required|numeric|max:1000000000'
        ];
    }

    public function messages(){
        return[
            'product_name.required' => 'Nazwa produktu jest wymagana',
            'product_name.min' => 'Nazwa musi zawierać conajmniej 3 znaki',
            'product_name.max' => 'Nazwa nie moiże być dłuższa niż 40 znaków',
            'description.required' => 'Produkt musi posiadać opis',
            'description.min' => 'Opis musi być dłuższy niż 6 znaków',
            'value.required' => 'Produkt musi posiadać cenę',
            'value.numeric' => 'cena musi być liczbą (wartości dziesiętne odziel kropką)'
        ];
    }

}
