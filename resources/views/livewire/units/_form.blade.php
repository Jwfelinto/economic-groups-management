<div class="space-y-4">
    <div>
        <label class="block text-sm font-medium mb-1">Nome Fantasia</label>
        <input type="text" wire:model.defer="form.trade_name" class="border rounded p-2 w-full"/>
        @error('form.trade_name') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Razão Social</label>
        <input type="text" wire:model.defer="form.legal_name" class="border rounded p-2 w-full"/>
        @error('form.legal_name') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">CNPJ</label>
        <input type="text" wire:model.defer="form.cnpj" class="border rounded p-2 w-full"/>
        @error('form.cnpj') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Bandeira</label>
        <select wire:model.defer="form.brand_id" class="border rounded p-2 w-full">
            <option value="">Selecione uma bandeira</option>

            @php
                $brandsForSelect = $form->brands ?? ($brands ?? collect());
            @endphp

            @foreach($brandsForSelect as $b)
                <option value="{{ $b->id }}">{{ $b->name }}</option>
            @endforeach
        </select>
        @error('form.brand_id') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>
</div>
