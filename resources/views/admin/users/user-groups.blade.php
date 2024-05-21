@vite(['resources/js/user-user-groups-edit.js', 'resources/css/select2.css'])
<x-admin-layout>
    <div class="p-3">
        <x-slot name="header">
            <div class="font-semibold text-xl text-gray-800 leading-tight">
                <h2 class="text-2xl">Реадагування користувацьких груп користувача з ід = {{ $user->id }}</h2>
            </div>
        </x-slot>

        <form action="{{ route('admin.users.user-groups.edit', ['user' => $user]) }}" method="POST" class="flex flex-col p-2">
            @csrf
            @method('PUT')
            <div class="flex text-center justify-center border-2 mt-2">
                <div class="p-3 mt-2 w-3/4" id="second-stage-div">
                    <div class="flex m-auto justify-between items-center">
                        <label for="user_groups" class="p-1 mr-2 flex-1 flex items-center">
                            <span class="flex-2 pr-3">Групи користувачів</span>
                        </label>
                        <select
                            name="user_groups[]"
                            id="user_groups"
                            multiple="multiple"
                            required
                        >
                            @foreach($user->userGroups as $userGroup)
                                <option value="{{ $userGroup->id }}" selected>{{ $userGroup->name }}</option>
                            @endforeach
                        </select>
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
