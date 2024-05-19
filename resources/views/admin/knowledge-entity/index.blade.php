<x-admin-layout>
    <div class="p-3">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <h1 class="text-2xl">Група знань "{{ $knowledgeEntityGroup->name }}"</h1>
            </h2>
        </x-slot>
        <header class="p-2 w-full flex justify-end">
            <div>
                <a href="{{ route('admin.knowledge-entity-groups.knowledge-entities.create', ['knowledgeEntityGroup' => $knowledgeEntityGroup]) }}"
                   class="py-3 px-4 rounded-3xl bg-blue-100 hover:bg-blue-200"
                >
                    Створити учбовий матеріал
                </a>
            </div>
        </header>
        @if($knowledgeEntityGroup->knowledgeEntities->count() > 0)
            <form action="{{ route('admin.knowledge-entity-groups') }}" method="get" class="flex flex-col p-2">
                @csrf
                <label for="searchParam">Пошук по id або по імені</label>
                <div>
                    <input type="text" name="searchByIdOrName" value="{{ $searchParam }}"/>
                    <button class="py-2 px-3 my-1 mx-3 rounded-3xl bg-blue-100 hover:bg-blue-200 text-base">
                        Знайти
                    </button>
                    @if($searchParam)
                        <a href="{{ route('admin.knowledge-entity-groups') }}"
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
                    <th class="flex-1 border-2 border-collapse">Тип</th>
                    <th class="flex-1 border-2 border-collapse"></th>
                    <th class="flex-1 border-2 border-collapse"></th>
                </tr>
                @foreach($knowledgeEntityGroup->knowledgeEntities as $knowledgeEntity)
                    <tr class="flex flex-row border-2 border-collapse">
                        <td class="flex-1 border-2 border-collapse">
                            <div class="flex h-full align-middle justify-center items-center">
                                {{ $knowledgeEntity->id }}
                            </div>
                        </td>
                        <td class="flex-1 border-2 border-collapse">
                            <div class="flex h-full align-middle justify-center items-center">
                                {{ $knowledgeEntity->name }}
                            </div>
                        </td>
                        <td class="flex-1 border-2 border-collapse">
                            <div class="flex h-full align-middle justify-center items-center">
                                {{ $knowledgeEntity->getType() }}
                            </div>
                        </td>
                        <td class="flex-1 border-2 border-collapse">
                            <div class="flex h-full align-middle justify-center items-center">
                                <a
                                    href="{{ route('admin.knowledge-entity-groups.knowledge-entities.edit',
                                                 ['knowledgeEntityGroup' => $knowledgeEntityGroup, 'knowledgeEntity' => $knowledgeEntity]
                                             )
                                          }}"
                                    class="py-1 px-3 my-1 rounded-3xl bg-blue-100 hover:bg-blue-200">
                                    Редагувати
                                </a>
                            </div>
                        </td>
                        <td class="flex-1 border-2 border-collapse">
                            <form
                                action="{{ route('admin.knowledge-entity-groups.knowledge-entities.delete',
                                               ['knowledgeEntityGroup' => $knowledgeEntityGroup, 'knowledgeEntity' => $knowledgeEntity]
                                           )
                                        }}"
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
                <p>У даній групі учбових матеріалів ще нема жодних матеріалів</p>
            </div>
        @endif
    </div>
</x-admin-layout>
