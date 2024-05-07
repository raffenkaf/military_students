<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Створення теми тестів
        </h2>
    </x-slot>

    <div class="p-3">
        <form action="{{ route('admin.question-topic.store') }}" method="POST">
            @csrf
            <div class="flex flex-col">
                <label for="name" class="p-1">Назва теми тестів</label>
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
                <label for="description" class="p-1">Опис теми тестів</label>
                <textarea name="description" id="description" class="p-1 border-2 border-gray-200 rounded-2xl"
                          value="{{ old('description') }}" rows="10" required></textarea>
            </div>
            <div class="flex justify-center">
                <a href="{{ route('admin.question-topics') }}"
                   class="py-1 mx-2 px-10 mt-4 rounded-3xl bg-gray-200 hover:bg-gray-300">
                    Назад
                </a>
                <button type="submit" class="py-1 px-10 mr-2 mt-4 rounded-3xl bg-blue-100 hover:bg-blue-200">
                    Створити
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>