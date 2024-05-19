<?php

namespace App\Services;

use App\Models\KnowledgeEntityFile;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class KnowledgeEntityFileService
{
    public function storeFile(UploadedFile $file): string
    {
        $fileName = $file->getClientOriginalName()
            . '_' . time()
            . '.' . $file->getClientOriginalExtension();

        $file->storeAs('files', $fileName);

        return 'files/' . $fileName;
    }

    public function deleteFile(KnowledgeEntityFile $studyable): void
    {
        if ($studyable->path) {
            Storage::delete($studyable->path);
        }
    }
}
