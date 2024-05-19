@vite(['resources/js/date-time-picker.js', 'resources/js/create-exam.js', 'resources/css/date-time-picker.css', 'resources/css/select2.css'])
<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Планування екзамену
        </h2>
    </x-slot>

    <div
        class="p-3 text-center"
        x-data="createFormData()"
    >
        <div class="flex justify-start">
            <a href="{{ route('admin.exams') }}"
               class="py-1 mx-2 px-10 mt-4 rounded-3xl bg-gray-200 hover:bg-gray-300"
            >
                Назад
            </a>
        </div>
        <form action="{{ route('admin.exam.store') }}" method="POST">
            <div class="flex text-center justify-center border-2 mt-2"
                 :class="{ ['bg-gray-400']: formStage !== 1 }"
            >
                @csrf
                <div class="p-3 mt-2 w-1/2" id="first-stage-div">
                    <div class="flex m-auto justify-between items-center">
                        <label for="name" class="p-1 mr-2">Дата екзамену</label>
                        <input
                            type="text"
                            name="exam_date"
                            id="exam_date"
                            class="p-1 border-2 border-gray-200 rounded-2xl datepicker-date"
                            :disabled="formStage !== 1"
                            autocomplete="off"
                            value="{{ old('exam_date') }}"
                            required
                        >
                        @error('exam_date')
                        <div class="text-red-400 ml-2 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex m-auto justify-between items-center pt-2">
                        <label for="name" class="p-1 mr-2">Час початку екзамену</label>
                        <input
                            type="text"
                            name="start_time"
                            id="start_time"
                            class="p-1 border-2 border-gray-200 rounded-2xl datepicker-time"
                            value="{{ old('start_time') }}"
                            required
                        >
                        @error('start_time')
                        <div class="text-red-400 ml-2 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex m-auto justify-between items-center pt-2">
                        <label for="name" class="p-1">Час закінчення екзамену</label>
                        <input
                            type="text"
                            name="end_time"
                            id="end_time"
                            class="p-1 border-2 border-gray-200 rounded-2xl datepicker-time"
                            value="{{ old('end_time') }}"
                            required
                        >
                        @error('end_time')
                        <div class="text-red-400 ml-2 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <h2 x-show="formStage !== 1" class="text-2xl text-white">Час зафіксований</h2>
                    <div class="flex justify-center">
                        <button
                            type="button"
                            class="py-1 px-10 mr-2 mt-4 rounded-3xl bg-blue-100 hover:bg-blue-200"
                            x-show="formStage !== 1"
                            @click="moveToFirstStage()"
                        >
                            Перевизначити дату та час
                        </button>
                        <button
                            type="button"
                            class="py-1 px-10 mr-2 mt-4 rounded-3xl bg-blue-100 hover:bg-blue-200"
                            x-show="formStage === 1"
                            @click="moveToSecondStage()"
                        >
                            Зафіксувати та перейти далі
                        </button>
                    </div>
                </div>
            </div>
            <div class="flex text-center justify-center border-2 mt-2"
                 x-show="formStage === 2"
            >
                @csrf
                <div class="p-3 mt-2 w-3/4" id="second-stage-div">
                    <div class="flex m-auto justify-between items-center">
                        <label for="name" class="p-1 mr-2 flex-1 flex items-center">
                            <span class="flex-2 pr-3">Теми питань для екзамену</span>
                            <select
                                name="question_topics[]"
                                id="question_topics"
                                multiple="multiple"
                                required
                            >
                                @foreach($questionTopics as $questionTopic)
                                    <option value="{{ $questionTopic->id }}">{{ $questionTopic->name }}</option>
                                @endforeach
                            </select>
                        </label>
                        @error('question_topics')
                            <div class="text-red-400 ml-2 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex m-auto justify-between items-center">
                        <label for="name" class="p-1 mr-2 flex-1 flex items-center">
                            <span class="flex-2 pr-3">Групи користувачів</span>
                            <select
                                name="exam_user_groups[]"
                                id="exam_user_groups"
                                multiple="multiple"
                                required
                            >
                            </select>
                        </label>
                        @error('exam_user_groups')
                            <div class="text-red-400 ml-2 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex justify-center">
                        <button
                            type="submit"
                            class="py-1 px-10 mr-2 mt-4 rounded-3xl bg-blue-100 hover:bg-blue-200"
                            :disabled="formStage !== 2"
                        >
                            Зберегти
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-admin-layout>
