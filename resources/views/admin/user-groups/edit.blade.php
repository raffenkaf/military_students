<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Редагування групи користувачів
        </h2>
    </x-slot>

    <div class="p-3">
        <x-admin-form
            action="{{ route('admin.user-group.update', ['userGroup' => $userGroup]) }}"
            method="POST"
            route-back="{{ route('admin.user-groups') }}"
        >
            {{ method_field('PUT') }}
            <div class="flex flex-col">
                <label for="name" class="p-1">Назва групи</label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    class="p-1 border-2 border-gray-200 rounded-2xl" value="{{ $userGroup->name }}"
                    required
                >
                @error('name')
                    <div class="text-red-400 ml-2 text-sm">{{ $message }}</div>
                @enderror
            </div>
            <div class="flex flex-col">
                <label for="description" class="p-1">Опис групи</label>
                <textarea
                    name="description"
                    id="description"
                    class="p-1 border-2 border-gray-200 rounded-2xl"
                    rows="10" required
                >
                    {{ $userGroup->description }}
                </textarea>
            </div>
        </x-admin-form>
    </div>
</x-admin-layout>
