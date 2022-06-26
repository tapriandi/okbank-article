<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
  public function detail($uri){
    // Get article data.
    $data = Article::where('uri', $uri)->first();
    $other_data = Article::where('uri', '!=', $uri)->inRandomOrder()->limit(3)->get();

    if ($data == null) abort(404);

    // Build page metadata.
    $page_metadata['title'] = $data->title;

    return view ('static/article-detail', [
      'page' => $page_metadata,
    	'article' => $data,
      'other_articles' => $other_data,
    ]);
  }
}
