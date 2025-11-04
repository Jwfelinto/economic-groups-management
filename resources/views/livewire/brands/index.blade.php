{{-- Commit: feat(brands): add brand index blade with search and filter --}}
<div class="p-6">
    <h1 class="text-2xl font-semibold mb-4">Bandeiras</h1>

    <div class="flex justify-between mb-4">
        <input type="text" wire:model="search" placeholder="Buscar bandeira..."
               class="border rounded px-3 py-2 w-1/3">

        <a href="{{ route('brands.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Nova Bandeira
        </a>
    </div>

    <table class="min-w-full bg-white border rounded shadow">
        <thead>
        <tr class="bg-gray-100">
            <th class="px-4 py-2 text-left">Nome</th>
            <th class="px-4 py-2 text-left">Grupo</th>
            <th class="px-4 py-2 text-left">Unidades</th>
            <th class="px-4 py-2 text-left">Criado em</th>
            <th class="px-4 py-2 text-left">Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($brands as $brand)
            <tr class="border-t">
                <td class="px-4 py-2">{{ $brand->name }}</td>
                <td class="px-4 py-2">{{ $brand->group->name ?? '-' }}</td>
                <td class="px-4 py-2">{{ $brand->units_count }}</td>
                <td class="px-4 py-2">{{ $brand->created_at->format('d/m/Y') }}</td>
                <td class="px-4 py-2 space-x-2">
                    <a href="{{ route('brands.show', $brand) }}" class="text-blue-600">Ver</a>
                    <a href="{{ route('brands.edit', $brand) }}" class="text-yellow-600">Editar</a>
                    <a href="{{ route('brands.delete', $brand) }}" class="text-red-600">Excluir</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $brands->links() }}
    </div>
</div>
