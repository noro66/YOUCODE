<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TripRequest extends FormRequest
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
            'departure' => 'required|min:3|max:100',
            'destination' => 'required|min:5|max:100',
            'departure_time' => 'required|date',
            'time' => 'required',
            'Trip_duration' => 'required|numeric|max:24',
            'trip_image' => 'image',
            'trip_description' => 'required|min:50',
            'price' => 'required|numeric',
        ];
    }
}
