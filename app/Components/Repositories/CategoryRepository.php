<?php

namespace App\Components\Repositories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class CategoryRepository extends BaseRepository
{

    public function getModel(): Model
    {
        return new Category();
    }

    public function getTree(): array
    {
        $categories = $this->find()->get()->toArray();
        return $this->buildTree($categories);
    }

    private function buildTree(array $elements, $parentId = null): array
    {

        $branch = [];
        foreach ($elements as $element) {
            if ($element['parent_id'] == $parentId) {
                $parent = $this->buildTree($elements, $element['id']);
                if ($parent) {
                    $element['children'] = $parent;
                }
                $branch[] = $element;
            }
        }

        return $branch;
    }

}
