@vite(['resources/js/date-time-picker.js', 'resources/css/date-time-picker.css'])
<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Планування екзамену
        </h2>
    </x-slot>

    <div class="p-3 text-center">
        <form action="{{ route('admin.exams.store') }}" method="POST">
            @csrf
            <div class="flex flex-col max-w-64 m-auto">
                <label for="name" class="p-1">Дата екзамену</label>
                <input
                    type="text"
                    name="date"
                    value="{{ old('date') }}"
                    id="date"
                    class="p-1 border-2 border-gray-200 rounded-2xl datepicker-date"
                    required
                >
                @error('date')
                    <div class="text-red-400 ml-2 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex flex-col max-w-64 m-auto">
                <label for="name" class="p-1">Час початку екзамену</label>
                <input
                    type="text"
                    name="start_time"
                    id="start_time"
                    class="p-1 border-2 border-gray-200 rounded-2xl datepicker-time" value="{{ old('start_time') }}"
                    required
                >
                @error('start_time')
                    <div class="text-red-400 ml-2 text-sm">{{ $message }}</div>
                @enderror
            </div>
            <div class="flex flex-col max-w-64 m-auto">
                <label for="name" class="p-1">Час закінчення екзамену</label>
                <input
                    type="text"
                    name="end_time"
                    id="end_time"
                    class="p-1 border-2 border-gray-200 rounded-2xl datepicker-time" value="{{ old('end_time') }}"
                    required
                >
                @error('end_time')
                    <div class="text-red-400 ml-2 text-sm">{{ $message }}</div>
                @enderror
            </div>
            <div class="flex justify-center">
                <a href="{{ route('admin.question-topics') }}"
                   class="py-1 mx-2 px-10 mt-4 rounded-3xl bg-gray-200 hover:bg-gray-300">
                    Назад
                </a>
                <button type="submit" class="py-1 px-10 mr-2 mt-4 rounded-3xl bg-blue-100 hover:bg-blue-200">
                    Зафіксувати дату та перейти до наступного кроку
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>
