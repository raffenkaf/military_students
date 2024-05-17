<x-admin-layout>
    <div class="p-3">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <h1 class="text-2xl">Користувач створений</h1>
            </h2>
        </x-slot>
        <header class="p-2 w-full flex justify-start">
            <div>
                <a
                    href="{{ route('admin.users') }}"
                    @class(['py-2', 'px-4', 'rounded-2xl', 'bg-gray-200', 'hover:bg-gray-300'])
                >
                    Повернутися назад
                </a>
            </div>
        </header>
        <div @class(['p-3', 'text-center', 'text-xl'])>
            <h2>Увага. Пароль буде показаний тільки один раз!</h2>
        </div>
        <table class="w-full text-center border-2 border-collapse">
            <tr class="flex flex-row border-2 border-collapse">
                <th class="flex-1 border-2 border-collapse">id</th>
                <th class="flex-1 border-2 border-collapse">Логін</th>
                <th class="flex-1 border-2 border-collapse">Пароль</th>
            </tr>
            <tr class="flex flex-row border-2 border-collapse">
                <td class="flex-1 border-2 border-collapse">{{ $user->id }}</td>
                <td class="flex-1 border-2 border-collapse">{{ $user->login }}</td>
                <td class="flex-1 border-2 border-collapse">{{ $password }}</td>
            </tr>
        </table>
    </div>
</x-admin-layout>
