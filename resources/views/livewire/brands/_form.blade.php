<div class="space-y-4">
    <div>
        <label class="block text-sm font-medium mb-1">Nome</label>
        <input type="text" wire:model.defer="form.name" class="border rounded p-2 w-full"/>
        @error('form.name') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Grupo Econômico</label>
        <select wire:model.defer="form.group_id" class="border rounded p-2 w-full">
            <option value="">Selecione um grupo</option>

            @php
                $groupsForSelect = $form->groups ?? ($groups ?? collect());
            @endphp

            @foreach($groupsForSelect as $g)
                <option value="{{ $g->id }}">{{ $g->name }}</option>
            @endforeach
        </select>
        @error('form.group_id') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>
</div>
