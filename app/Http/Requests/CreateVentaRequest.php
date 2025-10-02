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
    public function rules(): array
    {
        return [
            'clientes_id'        => ['required','integer'], // o exists:clientes,id si ya tienes tabla
            'total'              => ['required','numeric','min:0.01'],

            'producto_id'        => ['required','array','min:1'],
            'producto_id.*'      => ['nullable','integer'],

            'descripcion'        => ['required','array','min:1'],
            'descripcion.*'      => ['nullable','string','max:255'],

            'lista_precio'       => ['required','array','min:1'],
            'lista_precio.*'     => ['required','in:venta,mayorista'],

            'unidad'             => ['required','array','min:1'],
            'unidad.*'           => ['nullable','string','max:20'],

            'cantidad'           => ['required','array','min:1'],
            'cantidad.*'         => ['required','integer','min:1'],

            'precio_unitario'    => ['required','array','min:1'],
            'precio_unitario.*'  => ['required','numeric','min:0'],

            'subtotal'           => ['required','array','min:1'],
            'subtotal.*'         => ['required','numeric','min:0'],
        ];
    }

    public function messages()
    {
        return Venta::$messages;
    }
}
