<div class="p-6">
    <h1 class="text-2xl font-semibold mb-4">{{ $brand->name }}</h1>
    <p class="text-gray-600 mb-2"><strong>Grupo:</strong> {{ $brand->group->name ?? '-' }}</p>

    <h2 class="text-lg font-medium mb-2">Unidades</h2>

    <ul class="list-disc ml-6">
        @foreach($brand->units as $unit)
            <li>{{ $unit->trade_name }}</li>
        @endforeach
    </ul>

    <div class="mt-4">
        <a href="{{ route('brands.index') }}" class="text-blue-600">← Voltar</a>
    </div>
</div>
