<?php

namespace App\Livewire\Actions\Brands;

use App\Livewire\Forms\BrandForm;
use App\Services\BrandService;
use App\Services\GroupService;
use Illuminate\Contracts\View\View;
use Livewire\Component;

final class BrandCreate extends Component
{
    public BrandForm $form;
    public $groups;

    public function mount(GroupService $groupService): void
    {
        $this->groups = $groupService->getForSelect();
    }

    public function save(BrandService $service): void
    {
        $this->validate();

        $service->create($this->form->toArray());

        session()->flash('success', 'Bandeira criada com sucesso!');

        redirect()->route('brands.index');
    }

    public function render(): View
    {
        return view('livewire.brands.create', ['groups' => $this->groups]);
    }
}
