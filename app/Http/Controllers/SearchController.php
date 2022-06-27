<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Link;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $articles = Article::query()
            ->where('title', 'LIKE', "%{$keyword}%")
            ->orderBy('created_at', 'DESC')
            ->paginate(10);

        $links = Link::query()
            ->where('title', 'LIKE', "%{$keyword}%")
            ->orderBy('created_at', 'DESC')
            ->paginate(8);

        $page_metadata['title'] = 'Search';

        return view('static/search-result', [
            'page' => $page_metadata,
            'articles' => $articles,
            'links' => $links,
            'keyword' => $keyword,
        ]);
    }
}
