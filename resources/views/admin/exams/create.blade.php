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
                <label for="name" class="p-1">Час початку екзамену</label>
                <input
                    type="time"
                    name="start_time"
                    id="start_time"
                    class="p-1 border-2 border-gray-200 rounded-2xl" value="{{ old('start_time') }}"
                    required
                >
                @error('start_time')
                    <div class="text-red-400 ml-2 text-sm">{{ $message }}</div>
                @enderror
            </div>
            <div class="flex flex-col max-w-64 m-auto">
                <label for="name" class="p-1">Час закінчення екзамену</label>
                <input
                    type="datetime-local"
                    name="end_time"
                    id="end_time"
                    class="p-1 border-2 border-gray-200 rounded-2xl" value="{{ old('end_time') }}"
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
                    Створити
                </button>
            </div>
        </form>
    </div>
    <script type="module">
        import { TempusDominus, Namespace } from '@eonasdan/tempus-dominus';
        import moment from 'moment/moment.js';

        const linkedPicker1Element = document.getElementById('start_time');
        const linked1 = new TempusDominus(linkedPicker1Element);
        const linked2 = new TempusDominus(document.getElementById('end_time'), {
            useCurrent: false,
        });
        linked1.dates.formatInput = date => moment(date).format('YYYY-MM-DD')
        linked2.dates.formatInput = date => moment(date).format('YYYY-MM-DD')
        //using event listeners
        linkedPicker1Element.addEventListener(Namespace.events.change, (e) => {
            linked2.updateOptions({
                restrictions: {
                    minDate: e.detail.date,
                },
            });
        });

        //using subscribe method
        const subscription = linked2.subscribe(Namespace.events.change, (e) => {
            linked1.updateOptions({
                restrictions: {
                    maxDate: e.date,
                },
            });
        });
    </script>
</x-admin-layout>
