<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Планування екзамену
        </h2>
    </x-slot>
    <div class="p-3">
        <header class="p-2 w-full flex justify-between">
            <h1 class="text-2xl">Список екзаменів</h1>
            <div>
                <a
                    href="{{ route('admin.exams.create') }}"
                    class="py-2 px-4 rounded-3xl bg-blue-100 hover:bg-blue-200"
                >
                    Запланувати екзамен
                </a>
            </div>
        </header>
        @if($exams->count() > 0)
            <form action="{{ route('admin.exams') }}" method="get" class="flex flex-col p-2">
                @csrf
                <label for="searchParam">Пошук по id</label>
                <div>
                    <input type="text" name="searchByIdOrName" value="{{ $searchParam }}"/>
                    <button class="py-2 px-3 my-1 mx-3 rounded-3xl bg-blue-100 hover:bg-blue-200 text-base">
                        Знайти
                    </button>
                    @if($searchParam)
                        <a href="{{ route('admin.exams') }}"
                           class="py-2.5 px-3 my-1 mx-3 rounded-3xl bg-blue-100 hover:bg-blue-200 text-base">
                            Скинути
                        </a>
                    @endif
                </div>
            </form>
            <table class="w-full text-center border-2 border-collapse">
                <tr class="flex flex-row border-2 border-collapse">
                    <th class="flex-1 border-2 border-collapse">id</th>
                    <th class="flex-1 border-2 border-collapse">Час початку</th>
                    <th class="flex-1 border-2 border-collapse">Час закінчення</th>
                    <th class="flex-1 border-2 border-collapse">Статус</th>
                    <th class="flex-1 border-2 border-collapse">Редагувати</th>
                    <th class="flex-1 border-2 border-collapse">Видалення</th>
                </tr>
                @foreach($exams as $exam)
                    <tr class="flex flex-row border-2 border-collapse">
                        <td class="flex-1 border-2 border-collapse">
                            <div class="flex h-full align-middle justify-center items-center">
                                {{ $exam->id }}
                            </div>
                        </td>
                        <td class="flex-1 border-2 border-collapse">
                            <div class="flex h-full align-middle justify-center items-center">
                                {{ $exam->start_time->format('Y-m-d H:i:s') }}
                            </div>
                        </td>
                        <td class="flex-1 border-2 border-collapse">
                            <div class="flex h-full align-middle justify-center items-center">
                                {{ $exam->end_time->format('Y-m-d H:i:s') }}
                            </div>
                        </td>
                        <td class="flex-1 border-2 border-collapse">
                            <div class="flex h-full align-middle justify-center items-center">
                                {{ $exam->created_at->format('Y-m-d') }}
                            </div>
                        </td>
                        <td class="flex-1 border-2 border-collapse">
{{--                            <div class="flex h-full align-middle justify-center items-center">--}}
{{--                                <a--}}
{{--                                    href="{{ route('admin.question-topics.edit', ['questionTopic' => $questionTopic]) }}"--}}
{{--                                    class="py-1 px-3 my-1 rounded-3xl bg-blue-100 hover:bg-blue-200">--}}
{{--                                    Редагувати--}}
{{--                                </a>--}}
{{--                            </div>--}}
                        </td>
                        <td class="flex-1 border-2 border-collapse">
{{--                            <form--}}
{{--                                action="{{ route('admin.question-topics.delete', ['questionTopic' => $questionTopic]) }}"--}}
{{--                                method="POST"--}}
{{--                                class="flex h-full align-middle justify-center items-center"--}}
{{--                            >--}}
{{--                                @csrf--}}
{{--                                {{ method_field('DELETE') }}--}}
{{--                                <button class="py-1 px-3 my-1 rounded-3xl bg-red-600 hover:bg-red-700 text-white">--}}
{{--                                    Видалити--}}
{{--                                </button>--}}
{{--                            </form>--}}
                        </td>
                    </tr>
                @endforeach
            </table>
        @else
            <div class="p-3">
                <p>Екзаменів не знайдено</p>
            </div>
        @endif
    </div>
</x-admin-layout>
