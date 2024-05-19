<?php

namespace App\Repositories\Admin;

use App\Models\Enums\KnowledgeEntityTypes;
use App\Models\KnowledgeEntity;
use App\Models\KnowledgeEntityArticle;
use App\Models\KnowledgeEntityFile;
use App\Services\KnowledgeEntityFileService;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class KnowledgeEntityRepository
{
    public function __construct(private KnowledgeEntityFileService $knowledgeEntityFileService)
    {
    }

    public function createStudyable(array $validated)
    {
        return match ($validated['type']) {
            KnowledgeEntityTypes::ARTICLE->value => $this->createArticle($validated),
            KnowledgeEntityTypes::FILE->value => $this->createFile($validated),
            default => throw new \Exception('Invalid knowledge entity type')
        };
    }

    private function createArticle(array $validated): KnowledgeEntityArticle
    {
        $article = new KnowledgeEntityArticle($validated);
        $article->save();

        return $article;
    }

    private function createFile(array $validated)
    {
        /** @var UploadedFile $file */
        $filePath = $this->knowledgeEntityFileService->storeFile($validated['current_file']);

        $file = new KnowledgeEntityFile([
            'path' => $filePath,
            'original_name' => $validated['current_file']->getClientOriginalName(),
        ]);
        $file->save();

        return $file;
    }

    public function createEntity(array $validated): KnowledgeEntity
    {
        $entity = new KnowledgeEntity();

        $entity->name = $validated['name'];
        $entity->type = $validated['type'];
        $entity->knowledge_entity_group_id = $validated['knowledge_entity_group_id'];
        $entity->studyable()->associate($validated['studyable']);

        $entity->save();

        return $entity;
    }

    public function deleteStudyable(KnowledgeEntity $entity): void
    {
        match ((string)$entity->type) {
            KnowledgeEntityTypes::ARTICLE->value => $this->deleteArticle($entity),
            KnowledgeEntityTypes::FILE->value => $this->deleteFile($entity),
            default => throw new \Exception('Invalid knowledge entity type')
        };
    }

    private function deleteArticle(KnowledgeEntity $entity)
    {
        $entity->studyable->delete();
    }

    private function deleteFile(KnowledgeEntity $entity)
    {
        $this->knowledgeEntityFileService->deleteFile($entity->studyable);

        $entity->studyable->delete();
    }
}
