<?php

namespace App\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class TemplateTransformers extends JsonResource
{
    public function toArray($request)
    {    
        return [
            'id' => $this->value,
        ];
    }
}