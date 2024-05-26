<x-admin-layout>
    <div class="p-4">
        <div class="flex flex-col justify-start border-2 mt-2 p-4">
            <h2 class="pb-2">Можливі права для груп</h2>
            <ul>
                <li>1 - можливість керувати користувачами/групами(суперадмін)</li>
                <li>2 - можливість керувати питаннями до екзаменів(суперадмін)</li>
                <li>3 - можливість керувати екзаменами(суперадмін)</li>
                <li>4 - можливість керувати учбовими матеріалами(викладач)</li>
                <li>5 - можливість бачити результати екзаменів(викладач)</li>
                <li>6 - Можливість бачити всі учбові матеріали</li>
                <li>7 - Можливість бачити частину учбових матеріалів</li>
            </ul>
        </div>
    </div>
    @if($userGroup->authRights->count() > 0)
        <div class="p-4">
            <table class="w-full text-center border-2 border-collapse">
                <tr class="flex flex-row border-2 border-collapse">
                    <th class="flex-1 border-2 border-collapse">Тип права доступу</th>
                    <th class="flex-1 border-2 border-collapse"></th>
                </tr>

                @foreach($userGroup->authRights as $authRight)
                    <tr class="flex flex-row border-2 border-collapse">
                        <td class="flex-1 border-2 border-collapse">
                            <div class="flex h-full align-middle justify-center items-center">
                                {{ $authRight->access_type }}
                            </div>
                        </td>
                        <td class="flex-1 border-2 border-collapse">
                            @if($authRight)
                                <form
                                    action="{{ route(
                                    'admin.user-groups.auth-rights.delete',
                                    ['userGroup' => $userGroup, 'authRight' => $authRight]
                                ) }}"
                                    method="POST"
                                >
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button class="py-1 px-3 my-1 rounded-3xl bg-red-600 hover:bg-red-700 text-white">
                                        Видалити
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    @else
        <div class="p-3">
            <p>Ця група не має прав</p>
        </div>
    @endif
    @if($accessTypes->count() > 0)
        <div class="p-5">
            <div class="border-2 p-3">
                <x-admin-form
                    action="{{ route('admin.user-groups.auth-rights.store', ['userGroup' => $userGroup]) }}"
                    method="POST"
                    route-back="{{ route('admin.user-groups.auth-rights', ['userGroup' => $userGroup]) }}"
                    buttonText="Додати"
                >
                    <div class="w-full flex justify-center">
                        <div class="flex w-1/2 justify-center align-middle text-center">
                            <label for="access_type" class="p-2 mr-3">Додати право</label>
                            <select name="access_type" id="access_type" class="p-2 flex-1">
                                <option value="">Оберіть право</option>
                                @foreach($accessTypes as $accessType)
                                    <option value="{{ $accessType->value }}">{{ $accessType->value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </x-admin-form>
            </div>
        </div>
    @endif
</x-admin-layout>
