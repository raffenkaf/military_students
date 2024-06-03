<div class="p-10 bg-white mt-3 text-center ">
    <div class="text-2xl">
        <h1>{{ $knowledgeEntity->name }}</h1>
    </div>
    <div class="pt-5">
        <a
            href="{{ route(
                'download-knowledge-entity',
                 ['knowledgeEntityGroup' => $knowledgeEntityGroup, 'knowledgeEntity' => $knowledgeEntity]
            ) }}"
            download="{{ $knowledgeEntity->studyable->original_name }}"
        >
            Скачати файл
        </a>
    </div>
</div>
