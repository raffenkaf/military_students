<x-admin-layout>
    <div class="p-3">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <h1 class="text-2xl">Користувачі</h1>
            </h2>
        </x-slot>
        <header class="p-2 w-full flex justify-end">
            <div>
                <form method="POST" action="{{ route('admin.users.store') }}">
                    @csrf
                    <button type="submit" class="py-2 px-4 rounded-3xl bg-blue-100 hover:bg-blue-200">
                        Створити користувача
                    </button>
                </form>
            </div>
        </header>
        @if($users->count() > 0)
            <form action="{{ route('admin.users') }}" method="get" class="flex flex-col p-2">
                @csrf
                <label for="searchParam">Пошук по id або по логіну</label>
                <div>
                    <input type="text" name="searchByIdOrLogin" value="{{ $searchParam }}"/>
                    <button class="py-2 px-3 my-1 mx-3 rounded-3xl bg-blue-100 hover:bg-blue-200 text-base">
                        Знайти
                    </button>
                    @if($searchParam)
                        <a href="{{ route('admin.users') }}"
                           class="py-2.5 px-3 my-1 mx-3 rounded-3xl bg-blue-100 hover:bg-blue-200 text-base">
                            Скинути
                        </a>
                    @endif
                </div>
            </form>
            <table class="w-full text-center border-2 border-collapse">
                <tr class="flex flex-row border-2 border-collapse">
                    <th class="flex-1 border-2 border-collapse">id</th>
                    <th class="flex-1 border-2 border-collapse">Логін</th>
                    <th class="flex-1 border-2 border-collapse">Групи</th>
                    <th class="flex-1 border-2 border-collapse"></th>
                    <th class="flex-1 border-2 border-collapse"></th>
                </tr>
                @foreach($users as $user)
                    <tr class="flex flex-row border-2 border-collapse">
                        <td class="flex-1 border-2 border-collapse">
                            <div class="flex h-full align-middle justify-center items-center">
                                {{ $user->id }}
                            </div>
                        </td>
                        <td class="flex-1 border-2 border-collapse">
                            <div class="flex h-full align-middle justify-center items-center">
                                {{ $user->login }}
                            </div>
                        </td>
                        <td class="flex-1 border-2 border-collapse">
                            <div class="flex h-full align-middle justify-center items-center">
                                <a
                                    href="{{ route('admin.users.user-groups', ['user' => $user]) }}"
                                    class="py-1 px-3 my-1 rounded-3xl bg-blue-100 hover:bg-blue-200">
                                    Редагувати групи ({{ implode(', ', $user->userGroupIds()) }})
                                </a>
                            </div>
                        </td>
                        <td class="flex-1 border-2 border-collapse">
                            <form action="{{ route('admin.users.update', ['user' => $user]) }}" method="POST">
                                @csrf
                                {{ method_field('PUT') }}
                                <button class="py-1 px-3 my-1 rounded-3xl bg-blue-100 hover:bg-blue-200">
                                    Перестворити пароль
                                </button>
                            </form>
                        </td>
                        <td class="flex-1 border-2 border-collapse">
                            <form action="{{ route('admin.users.delete', ['user' => $user]) }}" method="POST">
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
                <p>Користувачів не знайдено</p>
            </div>
        @endif
    </div>
</x-admin-layout>
