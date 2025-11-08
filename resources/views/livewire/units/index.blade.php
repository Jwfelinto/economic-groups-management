<div class="p-6">
    <h1 class="text-2xl font-semibold mb-4">Unidades</h1>

    <div class="flex justify-between mb-4">
        <input type="text" wire:model="search" placeholder="Buscar unidade..."
               class="border rounded px-3 py-2 w-1/3">

        <a href="{{ route('units.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Nova Unidade
        </a>
    </div>

    <table class="min-w-full bg-white border rounded shadow">
        <thead>
        <tr class="bg-gray-100">
            <th class="px-4 py-2 text-left">Nome Fantasia</th>
            <th class="px-4 py-2 text-left">Bandeira</th>
            <th class="px-4 py-2 text-left">Colaboradores</th>
            <th class="px-4 py-2 text-left">Criado em</th>
            <th class="px-4 py-2 text-left">Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($units as $unit)
            <tr class="border-t">
                <td class="px-4 py-2">{{ $unit->trade_name }}</td>
                <td class="px-4 py-2">{{ $unit->brand->name ?? '-' }}</td>
                <td class="px-4 py-2">{{ $unit->employees_count }}</td>
                <td class="px-4 py-2">{{ $unit->created_at->format('d/m/Y') }}</td>
                <td class="px-4 py-2 space-x-2">
                    <a href="{{ route('units.show', $unit) }}" class="text-blue-600">Ver</a>
                    <a href="{{ route('units.edit', $unit) }}" class="text-yellow-600">Editar</a>
                    <a href="{{ route('units.delete', $unit) }}" class="text-red-600">Excluir</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $units->links() }}
    </div>
</div>
