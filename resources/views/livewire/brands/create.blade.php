<div class="p-6">
    <h1 class="text-2xl font-semibold mb-4">Nova Bandeira</h1>

    <form wire:submit.prevent="save" class="space-y-4">
        <div>
            <label class="block mb-1 font-medium">Nome</label>
            <input type="text" wire:model="form.name" class="border rounded px-3 py-2 w-full">
            @error('form.name') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block mb-1 font-medium">Grupo</label>
            <select wire:model="form.group_id" class="border rounded px-3 py-2 w-full">
                <option value="">Selecione um grupo</option>
                @foreach($form->groups as $group)
                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                @endforeach
            </select>
            @error('form.group_id') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            Salvar
        </button>

        <a href="{{ route('brands.index') }}" class="ml-2 text-gray-600">Cancelar</a>
    </form>
</div>
