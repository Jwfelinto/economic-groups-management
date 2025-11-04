<div class="p-6">
    <h1 class="text-2xl font-semibold mb-4">Editar Grupo</h1>

    <form wire:submit.prevent="update" class="space-y-4">
        <div>
            <label class="block mb-1 font-medium">Nome</label>
            <input type="text" wire:model="form.name" class="border rounded px-3 py-2 w-full">
            @error('form.name') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Atualizar
        </button>

        <a href="{{ route('groups.index') }}" class="ml-2 text-gray-600">Cancelar</a>
    </form>
</div>
