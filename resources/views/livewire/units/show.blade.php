<div class="p-6">
    <h1 class="text-2xl font-semibold mb-4">{{ $unit->trade_name }}</h1>
    <p class="text-gray-600 mb-2"><strong>Bandeira:</strong> {{ $unit->brand->name ?? '-' }}</p>

    <h2 class="text-lg font-medium mb-2">Colaboradores</h2>

    <ul class="list-disc ml-6">
        @foreach($unit->employees as $employee)
            <li>{{ $employee->name }}</li>
        @endforeach
    </ul>

    <div class="mt-4">
        <a href="{{ route('units.index') }}" class="text-blue-600">← Voltar</a>
    </div>
</div>
