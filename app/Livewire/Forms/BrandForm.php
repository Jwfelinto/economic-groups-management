<?php

namespace App\Livewire\Forms;

use App\Services\GroupService;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Form;

final class BrandForm extends Form
{
    public string $name = '';
    public ?int $group_id = null;

    public Collection $groups;

    public function mount(GroupService $groupService): void
    {
        $this->groups = $groupService->getForSelect();
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'group_id' => ['required', 'exists:groups,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O nome da bandeira é obrigatório.',
            'group_id.required' => 'Selecione o grupo econômico.',
        ];
    }
}
