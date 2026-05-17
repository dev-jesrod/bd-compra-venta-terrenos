<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTerrenoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre' => 'required|string|max:100',
            'ubicacion' => 'required|string|max:255',
            'descripcion' => 'required|string|max:1000',
            'precio' => 'required|numeric|min:1|max:999999999',
            'largo' => 'required|numeric|min:0.01|max:99999.99',
            'ancho' => 'required|numeric|min:0.01|max:99999.99',
            'superficie' => 'nullable|numeric|min:0|max:999999999',
            'zonificacion' => 'nullable|string|max:50',
            'pendiente' => 'nullable|string|max:50',
            'imagenes.*' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:500',
            'imagenes' => 'nullable|array|max:5',
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre del terreno es obligatorio.',
            'nombre.max' => 'El nombre no puede exceder 100 caracteres.',
            'ubicacion.required' => 'La ubicación es obligatoria.',
            'descripcion.required' => 'La descripción es obligatoria.',
            'precio.required' => 'El precio es obligatorio.',
            'precio.min' => 'El precio debe ser mayor a 0.',
            'largo.required' => 'El largo es obligatorio.',
            'ancho.required' => 'El ancho es obligatorio.',
            'imagenes.max' => 'Máximo 5 imágenes por terreno.',
            'imagenes.*.max' => 'Cada imagen no puede exceder 500KB.',
            'imagenes.*.image' => 'El archivo debe ser una imagen.',
            'imagenes.*.mimes' => 'Las imágenes deben ser formato: jpeg, jpg, png o webp.',
        ];
    }
}