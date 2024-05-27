<nav class="w-64 px-2">
    <div class="p-1 border-4 bg-white overflow-hidden shadow-sm sm:rounded-lg w-full text-sm">
        @can('manage', \App\Models\User::class)
            <ul class="p-1 border-2 mb-2 text-center align-middle">
                <li class="m-2 p-1 bg-gray-200 rounded-2xl hover:bg-gray-300">
                    <a href="{{ route('admin.users') }}">Користувачі</a>
                </li>
                <li class="m-2 p-1 bg-gray-200 rounded-2xl hover:bg-gray-300">
                    <a href="{{ route('admin.user-groups') }}">Групи користувачів</a>
                </li>
            </ul>
        @endcan
        @can('manage', \App\Models\QuestionTopic::class)
            <ul class="p-1 border-2 mb-2 text-center align-middle">
                <li class="m-2 p-1 bg-gray-200 rounded-2xl hover:bg-gray-300">
                    <a href="{{ route('admin.question-topics') }}">Теми питань до тестів</a>
                </li>
                {{--                    <li><a>Питання</a></li>--}}
                {{--                    <li><a>Відповіді</a></li>--}}
            </ul>
        @endcan
        @can('manage', \App\Models\Exam::class)
            <ul class="p-1 border-2 mb-2 text-center align-middle">
                <li class="m-2 p-1 bg-gray-200 rounded-2xl hover:bg-gray-300">
                    <a href="{{ route('admin.exams') }}">Екзамени</a>
                </li>
            </ul>
        @endcan
        @can('manage', \App\Models\KnowledgeEntity::class)
            <ul class="p-1 border-2 mb-2 text-center align-middle">
                <li class="m-2 p-1 bg-gray-200 rounded-2xl hover:bg-gray-300 hover:cursor-pointer">
                    <a href="{{ route('admin.knowledge-entity-groups') }}">Групи учбових матеріалів</a>
                </li>
            </ul>
        @endcan
        @can('manage', App\Models\Answer::class)
            <ul class="p-1 border-2 mb-2 text-center align-middle">
                <li class="m-2 p-1 bg-gray-200 rounded-2xl hover:bg-gray-300">
                    <a href="{{ route('admin.users') }}">Результати екзаменів</a>
                </li>
            </ul>
        @endcan
    </div>
</nav>
