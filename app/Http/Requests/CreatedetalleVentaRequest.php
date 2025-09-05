<?php

namespace App\Http\Requests;

use App\Models\detalleVenta;
use Illuminate\Foundation\Http\FormRequest;

class CreatedetalleVentaRequest extends FormRequest
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
        return detalleVenta::$rules;
    }

    public function messages()
    {
        return detalleVenta::$messages;
    }
}
