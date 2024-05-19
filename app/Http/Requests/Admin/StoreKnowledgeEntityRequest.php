<?php

namespace App\Http\Requests\Admin;


use App\Models\Enums\KnowledgeEntityTypes;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

class StoreKnowledgeEntityRequest extends BaseAdminFormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'type' => 'required|int',

            'content' => [
                Rule::excludeIf(function () {
                    return $this->type !== KnowledgeEntityTypes::ARTICLE->value;
                }),
                'required',
                'string'
            ],

            'current_file' => [
                Rule::excludeIf(function () {
                    return $this->type !== KnowledgeEntityTypes::FILE->value;
                }),
                'required',
                File::types(['pdf'])
                    ->min('1kb')
                    ->max('10mb'),
            ],
        ];
    }
}
