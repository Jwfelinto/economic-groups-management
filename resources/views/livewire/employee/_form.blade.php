<div class="space-y-4">
    <div>
        <label class="block text-sm font-medium mb-1">Nome</label>
        <input type="text" wire:model.defer="form.name" class="border rounded p-2 w-full"/>
        @error('form.name') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">E-mail</label>
        <input type="email" wire:model.defer="form.email" class="border rounded p-2 w-full"/>
        @error('form.email') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">CPF</label>
        <input type="text" wire:model.defer="form.cpf" class="border rounded p-2 w-full"/>
        @error('form.cpf') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Grupo</label>
        <select wire:model="group_id" class="border rounded p-2 w-full">
            <option value="">Selecione um grupo</option>
            @foreach($groups as $g)
                <option value="{{ $g->id }}">{{ $g->name }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Bandeira</label>
        <select wire:model="brand_id" class="border rounded p-2 w-full">
            <option value="">Selecione uma bandeira</option>
            @foreach($brands as $b)
                <option value="{{ $b->id }}">{{ $b->name }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Unidade</label>
        <select wire:model.defer="form.unit_id" class="border rounded p-2 w-full">
            <option value="">Selecione uma unidade</option>
            @foreach($units as $u)
                <option value="{{ $u->id }}">{{ $u->trade_name }}</option>
            @endforeach
        </select>
        @error('form.unit_id') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>
</div>
