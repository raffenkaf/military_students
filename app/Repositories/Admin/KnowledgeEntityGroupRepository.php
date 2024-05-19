<?php

namespace App\Repositories\Admin;

use App\Models\KnowledgeEntityGroup;

class KnowledgeEntityGroupRepository
{

    public function lastCreated()
    {
        return KnowledgeEntityGroup::lastCreated();
    }
}
