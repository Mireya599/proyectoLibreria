<?php

namespace App\Http\Requests;

use App\Models\DetalleCompra;
use Illuminate\Foundation\Http\FormRequest;

class CreateDetalleCompraRequest extends FormRequest
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
        return DetalleCompra::$rules;
    }

    public function messages()
    {
        return DetalleCompra::$messages;
    }
}
