<?php

namespace App\Repositories\Admin;

use App\Models\QuestionTopic;

class QuestionTopicRepository
{

    public function searchByIdOrName(string $searchParam)
    {
        $idSearch = QuestionTopic::where('id', $searchParam);

        return QuestionTopic::where('name', 'like', "$searchParam%")
            ->union($idSearch)
            ->get();
    }
}
