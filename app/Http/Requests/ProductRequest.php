<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|decimal:0,2',
            'promotional_price'=> 'nullable|decimal:0,2',
        ];
    }

    // public function messages(): array
    // {
    //     return [
    //         'name.required' => 'O nome é obrigatorio',
    //         'description.required' => 'A descricao e obrigatorio',
    //         'price.required' => 'O preco e obrigatorio',
    //         'price.decimal' => 'Apenas 2 casa apos a virgula',
    //         'promotional_price.decimal' => 'Apenas 2 casa apos a virgula',
    //     ];
    // }
}
