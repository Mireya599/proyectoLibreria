<?php

namespace App\Http\Requests;

use App\Models\Venta;
use Illuminate\Foundation\Http\FormRequest;

class CreateVentaRequest extends FormRequest
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
        return Venta::$rules;
    }

    public function messages()
    {
        return Venta::$messages;
    }
}
