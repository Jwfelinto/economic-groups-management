<?php

namespace App\Livewire\Forms;

use Livewire\Form;

final class GroupForm extends Form
{
    public string $name = '';

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O nome do grupo é obrigatório.',
            'name.max' => 'O nome não pode ultrapassar 255 caracteres.',
        ];
    }
}
