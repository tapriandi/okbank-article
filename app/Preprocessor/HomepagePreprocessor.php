<?php

namespace App\Preprocessor;
use App\Models\Article;
use App\Models\Link;
use App\Models\Ad;

class HomepagePreprocessor implements StaticPagePreprocessorInterface
{
    public function prepare($pageInfo = [], $meta = [])
    {
        $category = ['finansial'=> 1, 'karir'=>2, 'gaya hidup'=>3];

        $ads = Ad::select('title', 'link', 'image_desktop', 'image_mobile')->orderBy('created_at','desc')->limit(1)->get();
        $links = Link::select('title', 'link', 'sub_text', 'category', 'created_at')->orderBy('created_at','desc')->get();
        $articles = Article::orderBy('created_at','desc')->get();
        $articleFinances = Article::where('category_id', $category['finansial'])->get();
        $articleCareers = Article::where('category_id', $category['karir'])->get();
        $articleLifeStyles = Article::where('category_id', $category['gaya hidup'])->get();

        return array(
            'ads' => $ads,
            'links' => $links,
            'articles' => $articles,
            'articleFinances' => $articleFinances,
            'articleCareers' => $articleCareers,
            'articleLifeStyles' => $articleLifeStyles,
        );
    }
}
