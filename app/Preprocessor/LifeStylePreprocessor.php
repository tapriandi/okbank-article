<?php

namespace App\Preprocessor;
use App\Models\Article;

class LifeStylePreprocessor implements StaticPagePreprocessorInterface
{
    public function prepare($pageInfo = [], $meta = [])
    {
        $articleLifeStyles = Article::where('category_id', 3)->get();

        return array(
            'articleLifeStyles' => $articleLifeStyles,
        );
    }
}
