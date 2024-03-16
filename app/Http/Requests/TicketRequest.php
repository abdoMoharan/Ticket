<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TicketRequest extends FormRequest
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
            'subject' => 'required|string|min:3|max:200',
            'message' => 'nullable',
            'type' => 'required|in:Normal,Transfer,Complain',
            'start_date' => 'required|date',
            'closed_date' => 'required|date|after_or_equal:start_date',
        ];
    }
}
