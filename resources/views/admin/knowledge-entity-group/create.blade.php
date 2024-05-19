<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Створення групи cутностей бази знань
        </h2>
    </x-slot>

    <div class="p-3">
        <x-admin-form
            action="{{ route('admin.knowledge-entity-groups.store') }}"
            method="POST"
            route-back="{{ route('admin.knowledge-entity-groups') }}"
        >
            <div class="flex flex-col">
                <label for="name" class="p-1">Назва групи сутностей бази знань</label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    class="p-1 border-2 border-gray-200 rounded-2xl" value="{{ old('name') }}"
                    required
                >
                @error('name')
                <div class="text-red-400 ml-2 text-sm">{{ $message }}</div>
                @enderror
            </div>
            <div class="flex flex-col">
                <label for="description" class="p-1">Опис групи сутностей</label>
                <textarea name="description" id="description" class="p-1 border-2 border-gray-200 rounded-2xl" value="{{ old('description') }}" rows="10" required></textarea>
            </div>
        </x-admin-form>
    </div>
</x-admin-layout>
