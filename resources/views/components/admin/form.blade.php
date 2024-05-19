<form
    action="{{ $action }}"
    method="{{ $method }}"
    enctype="{{ $enctype }}"
    @submit="buttonDisabled = true"
    x-data="{ buttonDisabled: false }"
>
    @csrf
    {{ $slot }}
    <div class="flex justify-center">
        <a href="{{ $routeBack }}" class="py-1 mr-2 px-10 mt-4 my-1 rounded-3xl bg-gray-200 hover:bg-gray-300">
            Назад
        </a>
        <button
            type="submit" class="py-1 px-10 mt-4 my-1 rounded-3xl bg-blue-100 hover:bg-blue-200"
            :disabled="buttonDisabled"
        >
            Зберегти
        </button>
    </div>
</form>
