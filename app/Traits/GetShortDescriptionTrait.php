<?php

namespace App\Traits;

trait GetShortDescriptionTrait
{
    public function shortDescription()
    {
        if (!key_exists('description', $this->attributes)) {
            throw new \Exception('Current model does not have a description field');
        }

        if (strlen($this->description) < 100) {
            return $this->description;
        }
        return substr($this->description, 0, 97) . '...';
    }
}
