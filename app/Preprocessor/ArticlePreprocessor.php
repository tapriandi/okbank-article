<?php

namespace App\Preprocessor;
use App\Models\Article;

class ArticlePreprocessor implements StaticPagePreprocessorInterface
{
    public function prepare($pageInfo = [], $meta = [])
    {
        $articles = Article::select('title', 'uri', 'image')->orderBy('created_at','desc')->limit(4)->get();

        return array(
            'articles' => $articles,
        );
    }
}
