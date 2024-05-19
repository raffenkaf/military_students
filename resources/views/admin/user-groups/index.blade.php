<x-admin-layout>
    <div class="p-3">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <h1 class="text-2xl">Групи користувачів</h1>
            </h2>
        </x-slot>
        <header class="p-2 w-full flex justify-end">
            <div>
                <a href="{{ route('admin.user-group.create') }}" class="py-3 px-4 rounded-3xl bg-blue-100 hover:bg-blue-200">
                    Створити групу
                </a>
            </div>
        </header>
        @if($userGroups->count() > 0)
            <form action="{{ route('admin.user-groups') }}" method="get" class="flex flex-col p-2">
                @csrf
                <label for="searchParam">Пошук по id або по імені</label>
                <div>
                    <input type="text" name="searchByIdOrName" value="{{ $searchParam }}"/>
                    <button class="py-2 px-3 my-1 mx-3 rounded-3xl bg-blue-100 hover:bg-blue-200 text-base">
                        Знайти
                    </button>
                    @if($searchParam)
                        <a href="{{ route('admin.user-groups') }}"
                           class="py-2.5 px-3 my-1 mx-3 rounded-3xl bg-blue-100 hover:bg-blue-200 text-base">
                            Скинути
                        </a>
                    @endif
                </div>
            </form>
            <table class="w-full text-center border-2 border-collapse">
                <tr class="flex flex-row border-2 border-collapse">
                    <th class="flex-1 border-2 border-collapse">id</th>
                    <th class="flex-1 border-2 border-collapse">Назва</th>
                    <th class="flex-1 border-2 border-collapse">Опис</th>
                    <th class="flex-1 border-2 border-collapse">Дата створення</th>
                    <th class="flex-1 border-2 border-collapse">Редагувати</th>
                    <th class="flex-1 border-2 border-collapse">Видалення</th>
                </tr>
                @foreach($userGroups as $userGroup)
                    <tr class="flex flex-row border-2 border-collapse">
                        <td class="flex-1 border-2 border-collapse">
                            <div class="flex h-full align-middle justify-center items-center">
                                {{ $userGroup->id }}
                            </div>
                        </td>
                        <td class="flex-1 border-2 border-collapse">
                            <div class="flex h-full align-middle justify-center items-center">
                                {{ $userGroup->name }}
                            </div>
                        </td>
                        <td class="flex-1 border-2 border-collapse">
                            <div class="flex h-full align-middle justify-center items-center">
                                {{ $userGroup->shortDescription() }}
                            </div>
                        </td>
                        <td class="flex-1 border-2 border-collapse">
                            <div class="flex h-full align-middle justify-center items-center">
                                {{ $userGroup->created_at->format('Y-m-d') }}
                            </div>
                        </td>
                        <td class="flex-1 border-2 border-collapse">
                            <div class="flex h-full align-middle justify-center items-center">
                                <a
                                    href="{{ route('admin.user-group.edit', ['userGroup' => $userGroup]) }}"
                                    class="py-1 px-3 my-1 rounded-3xl bg-blue-100 hover:bg-blue-200">
                                    Редагувати
                                </a>
                            </div>
                        </td>
                        <td class="flex-1 border-2 border-collapse">
                            <form
                                action="{{ route('admin.user-group.delete', ['userGroup' => $userGroup]) }}"
                                method="POST"
                                class="flex h-full align-middle justify-center items-center"
                            >
                                @csrf
                                {{ method_field('DELETE') }}
                                <button class="py-1 px-3 my-1 rounded-3xl bg-red-600 hover:bg-red-700 text-white">
                                    Видалити
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        @else
            <div class="p-3">
                <p>Груп користувачів не знайдено</p>
            </div>
        @endif
    </div>
</x-admin-layout>
