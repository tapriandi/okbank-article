<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request, $locale = '')
    {
        if (empty($locale)) {
            $locale = config('app.locale');
        }
        else {
            app()->setLocale($locale);
        }

        $keyword = $request->input('keyword');

        // Bail if no search keyword.  Just redirect to... home I guess?
        // FIXME: Set a better URL?
        if (empty($keyword)) {
            return redirect('/' . $locale . '/');
        }

        $results = DB::table('search_index')
            ->whereRaw('MATCH(title, keyword) AGAINST(? IN NATURAL LANGUAGE MODE)', [ $keyword ])
            ->where('locale', $locale)
            ->paginate(5);

        // Setting up manual pager.
        $original_prev_url = $results->previousPageUrl();
        $original_next_url = $results->nextPageUrl();

        $search_url = 'keyword=' . $keyword;

        $manual_pager = $this->prepareManualPager($results->currentPage(),
          $results->lastPage(), $original_prev_url, $original_next_url,
          $search_url);

        // Setting up manual ID and EN links because we don't benefit from
        // static pages multilingual features.  Also page title.
        $page = [];
        $page['title'] = 'Hasil Pencarian';
        $page['locale'] = $locale;
        $page['id_uri'] = '/id/search';
        $page['en_uri'] = '/en/search';

        return view('search', compact('locale', 'keyword', 'manual_pager',
          'page', 'results'));
    }

    private function prepareManualPager($current_page, $last_page,
        $prev_url = NULL, $next_url = NULL, $suffix_url = NULL)
    {
        $manual_pager = new \stdClass();

        // First, let's set the default properties.
        // Set the current and last page numbers...
        $manual_pager->current_page = $current_page;
        $manual_pager->last_page    = $last_page;

        // ... next, set render_from and render_to two pages before/after
        // current_page.
        $manual_pager->render_from = $current_page - 2;
        $manual_pager->render_to   = $current_page + 2;

        // ... and set the following properties by default.
        $manual_pager->from_ellipsis  = true;
        $manual_pager->to_ellipsis    = true;
        $manual_pager->has_previous   = false;
        $manual_pager->has_next       = false;

        if ($manual_pager->current_page <= 3) {
            $manual_pager->render_to = 5;
        }

        if ($manual_pager->render_to >= $manual_pager->last_page) {
            $manual_pager->render_to = $manual_pager->last_page;
            $manual_pager->to_ellipsis = false;
        }

        if ($manual_pager->current_page >= $manual_pager->last_page - 2) {
            $manual_pager->render_from = $manual_pager->last_page - 4;
        }

        if ($manual_pager->render_from <= 1) {
            $manual_pager->render_from = 1;
            $manual_pager->from_ellipsis = false;
        }

        if (isset($prev_url) && isset($suffix_url)) {
            $manual_pager->previous_url = $prev_url . '&' . $suffix_url;
        }
        else {
            $manual_pager->previous_url = $prev_url;
        }

        if (isset($next_url) && isset($suffix_url)) {
            $manual_pager->next_url = $next_url . '&' . $suffix_url;
        }
        else {
            $manual_pager->next_url = $next_url;
        }

        if (isset($suffix_url)) {
            $manual_pager->suffix_url = '&' . $suffix_url;
        }
        else {
            $manual_pager->suffix_url = '';
        }

        return $manual_pager;
    }
}
