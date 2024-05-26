@vite(['resources/js/auth-rights-index.js', 'resources/css/select2.css'])
<x-admin-layout>
    <div class="p-4">
        <div class="flex flex-col justify-start border-2 mt-2 p-4">
            <h2 class="pb-2">Можливі права для груп</h2>
            <ul>
                @foreach(\App\Models\Enums\AccessTypesDefinitions::cases() as $accessTypeDefinition)
                    <li>{{ $accessTypeDefinition->value }}</li>
                @endforeach
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
                                {{ $authRight->informationAboutAccess() }}
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
                                    class="mb-0"
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
                    route-back="{{ route('admin.user-groups', ['userGroup' => $userGroup]) }}"
                    buttonText="Додати"
                >
                    <div x-data="{accessType: 0}" class="w-full flex flex-col justify-center items-center">
                        <div class="flex w-1/2 justify-center items-center text-center">
                            <label for="access_type" class="p-2 mr-3">Додати право</label>
                            <select name="access_type" id="access_type" class="p-2 flex-1" x-model="accessType">
                                <option value="">Оберіть право</option>
                                @foreach($accessTypes as $accessType)
                                    <option value="{{ $accessType->value }}">{{ $accessType->value }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div
                            x-show="accessType==='{{ \App\Models\Enums\AccessTypes::SOME_STUDY_MATERIALS }}'"
                            class="flex flex-col justify-center items-center p-5"
                        >
                            <label for="knowledge_entity_groups" class="p-1 mr-2 flex-1 flex items-center">
                                <span class="flex-2 pr-3">Групи учбових знань</span>
                            </label>
                            <select
                                name="access_details[]"
                                id="access_details"
                                multiple="multiple"
                            >
                                <option>Виберіть групи учбових знань</option>
                            </select>
                            @error('exam_user_groups')
                            <div class="text-red-400 ml-2 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </x-admin-form>
            </div>
        </div>
    @endif
</x-admin-layout>
