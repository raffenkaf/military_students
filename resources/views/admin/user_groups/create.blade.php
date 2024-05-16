<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Створення групи користувачів
        </h2>
    </x-slot>

    <div class="p-3" x-data="{ submitButtonDisabled: false }">
        <form action="{{ route('admin.user-group.store') }}" method="POST" @submit="submitButtonDisabled=true">
            @csrf
            <div class="flex flex-col">
                <label for="name" class="p-1">Назва групи користувачів</label>
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
                <label for="description" class="p-1">Опис групи користувачів</label>
                <textarea name="description" id="description" class="p-1 border-2 border-gray-200 rounded-2xl" value="{{ old('description') }}" rows="10" required></textarea>
            </div>
            <div class="flex justify-center" >
                <a href="{{ route('admin.user-groups') }}" class="py-1 mx-2 px-10 mt-4 rounded-3xl bg-gray-200 hover:bg-gray-300">
                    Назад
                </a>
                <button
                    type="submit"
                    class="py-1 px-10 mr-2 mt-4 rounded-3xl bg-blue-100 hover:bg-blue-200"
                    :disabled="submitButtonDisabled"
                >
                    Створити
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>
