<div>
    <h2 class="text-xl font-semibold mb-4">{{ $group->name }}</h2>
    <p class="text-gray-600 mb-4">Criado em: {{ $group->created_at->format('d/m/Y') }}</p>

    <h3 class="font-semibold mb-2">Bandeiras</h3>
    <ul class="list-disc ml-6">
        @forelse($brands as $brand)
            <li>{{ $brand->name }}</li>
        @empty
            <li>No brands registered.</li>
        @endforelse
    </ul>
</div>
