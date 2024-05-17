<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Редагування теми тестів
        </h2>
    </x-slot>

    <div class="p-3">
        <x-admin-form
            action="{{ route('admin.question-topic.update', ['questionTopic' => $questionTopic]) }}"
            method="POST"
            route-back="{{ route('admin.question-topics') }}"
        >
            {{ method_field('PUT') }}
            <div class="flex flex-col">
                <label for="name" class="p-1">Назва теми тестів</label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    class="p-1 border-2 border-gray-200 rounded-2xl" value="{{ $questionTopic->name }}"
                    required
                >
                @error('name')
                <div class="text-red-400 ml-2 text-sm">{{ $message }}</div>
                @enderror
            </div>
            <div class="flex flex-col">
                <label for="description" class="p-1">Опис теми тестів</label>
                <textarea name="description" id="description" class="p-1 border-2 border-gray-200 rounded-2xl" rows="10" required>{{ $questionTopic->description }}</textarea>
            </div>
        </x-admin-form>
    </div>
</x-admin-layout>
