<?php

namespace App\Preprocessor;
use App\Models\Article;

class CareerPreprocessor implements StaticPagePreprocessorInterface
{
    public function prepare($pageInfo = [], $meta = [])
    {
        $articleCareers = Article::where('category_id', 2)->get();

        return array(
            'articleCareers' => $articleCareers,
        );
    }
}
