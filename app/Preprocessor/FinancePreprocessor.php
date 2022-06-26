<?php

namespace App\Preprocessor;
use App\Models\Article;

class FinancePreprocessor implements StaticPagePreprocessorInterface
{
    public function prepare($pageInfo = [], $meta = [])
    {
        $articleFinances = Article::where('category_id', 1)->get();

        return array(
            'articleFinances' => $articleFinances,
        );
    }
}
