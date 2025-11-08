<div class="p-6">
    <h1 class="text-2xl font-semibold mb-4">Grupos</h1>

    <div class="mb-4 flex justify-between">
        <input
            wire:model.live="search"
            type="text"
            placeholder="Buscar grupo..."
            class="border p-2 rounded w-1/3"
        />

        <a href="{{ route('groups.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Novo Grupo
        </a>
    </div>

    <table class="w-full border-collapse border border-gray-300">
        <thead>
        <tr class="bg-gray-100">
            <th class="border p-2 text-left">Nome</th>
            <th class="border p-2 text-left">Bandeiras</th>
            <th class="border p-2 text-left">Criado em</th>
            <th class="border p-2 text-center">Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($groups as $group)
            <tr class="border-t">
                <td class="p-2">{{ $group->name }}</td>
                <td class="p-2">{{ $group->brands_count }}</td>
                <td class="p-2">{{ $group->created_at->format('d/m/Y') }}</td>
                <td class="p-2 text-center space-x-2">
                    <a href="{{ route('groups.show', $group) }}" class="text-blue-600 hover:underline">Ver</a>
                    <a href="{{ route('groups.edit', $group) }}" class="text-yellow-600 hover:underline">Editar</a>
                    <a href="{{ route('groups.delete', $group) }}" class="text-red-600 hover:underline">Excluir</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $groups->links() }}
    </div>
</div>
