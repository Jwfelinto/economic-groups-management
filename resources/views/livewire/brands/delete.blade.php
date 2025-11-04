<div class="p-6">
    <h1 class="text-2xl font-semibold mb-4">Excluir Bandeira</h1>

    @if($confirming)
        <p class="text-red-600 mb-4">
            Tem certeza que deseja excluir a bandeira <strong>{{ $brand->name }}</strong>?
        </p>

        <button wire:click="delete" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
            Confirmar exclusão
        </button>
        <a href="{{ route('brands.index') }}" class="ml-2 text-gray-600">Cancelar</a>
    @else
        <button wire:click="confirmDeletion" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
            Excluir
        </button>
        <a href="{{ route('brands.index') }}" class="ml-2 text-gray-600">Voltar</a>
    @endif
</div>
