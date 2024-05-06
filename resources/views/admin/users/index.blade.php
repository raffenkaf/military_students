<x-admin-layout>
    <div class="p-3">
        <header class="p-2 w-full flex justify-between">
            <h1 class="text-2xl">Користувачі</h1>
            <div>
                <form method="POST" action="{{ route('admin.user.create') }}">
                    @csrf
                    <button type="submit" class="py-2 px-4 rounded-3xl bg-blue-100 hover:bg-blue-200">
                        Створити користувача
                    </button>
                </form>
            </div>
        </header>
        <form action="{{ route('admin.users') }}" method="get" class="flex flex-col p-2">
            @csrf
            <label for="searchParam">Пошук по id або по логіну</label>
            <div>
                <input type="text" name="searchByIdOrLogin" value="{{ $searchParam }}"/>
                <button class="py-2 px-3 my-1 mx-3 rounded-3xl bg-blue-100 hover:bg-blue-200 text-base">
                    Знайти
                </button>
                @if($searchParam)
                    <a href="{{ route('admin.users') }}" class="py-2.5 px-3 my-1 mx-3 rounded-3xl bg-blue-100 hover:bg-blue-200 text-base">
                        Скинути
                    </a>
                @endif
            </div>
        </form>
        <table class="w-full text-center border-2 border-collapse">
            <tr class="flex flex-row border-2 border-collapse">
                <th class="flex-1 border-2 border-collapse">id</th>
                <th class="flex-1 border-2 border-collapse">Логін</th>
                <th class="flex-1 border-2 border-collapse">Дата створення</th>
                <th class="flex-1 border-2 border-collapse">Перестворення паролю</th>
                <th class="flex-1 border-2 border-collapse">Видалення</th>
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
                            {{ $user->created_at->format('Y-m-d') }}
                        </div>
                    </td>
                    <td class="flex-1 border-2 border-collapse">
                        <form action="{{ route('admin.user.update', ['userId' => $user->id]) }}" method="POST">
                            @csrf
                            {{ method_field('PATCH') }}
                            <button class="py-1 px-3 my-1 rounded-3xl bg-blue-100 hover:bg-blue-200">
                                Перестворити пароль
                            </button>
                        </form>
                    </td>
                    <td class="flex-1 border-2 border-collapse">
                        <form action="{{ route('admin.user.delete', ['userId' => $user->id]) }}" method="POST">
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
    </div>
</x-admin-layout>
