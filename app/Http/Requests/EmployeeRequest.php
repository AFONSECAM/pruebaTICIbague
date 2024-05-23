<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
        $rules = [
            'name' => 'required|string',
            'surname' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
            'department_id' => 'required|exists:departments,id'
        ];

        if ($this->isMethod('post')) {
            $rules['email'] = 'required|email|unique:employees,email';
            $rules['identification_number'] = 'required|numeric|unique:employees,identification_number';
        } elseif ($this->isMethod('put') || $this->isMethod('patch')) {
            $employeeId = $this->route('employee')->id;
            $rules['email'] = 'required|email|unique:employees,email,' . $employeeId;
            $rules['identification_number'] = 'required|numeric|unique:employees,identification_number,' . $employeeId;
        }
        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'El campo nombre es obligatorio.',
            'surname.required' => 'El campo apellido es obligatorio.',
            'address.required' => 'La dirección es obligatoria.',
            'email.required' => 'El campo email es obligatorio.',
            'email.email' => 'El formato del email no es válido.',
            'email.unique' => 'Este email ya está registrado.',
            'phone.required' => 'El campo número es obligatorio.',
            'phone.unique' => 'El número ya está registrado.',
            'identification_number.required' => 'El número de identificación es obligatorio.',
            'identification_number.unique' => 'El número de identificación ya está registrado.',
            'department_id.required' => 'El campo departamento es obligatorio.',
            'department_id.exists' => 'El departamento seleccionado no es válido.',
        ];
    }
}
