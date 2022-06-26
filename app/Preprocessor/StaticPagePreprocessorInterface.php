<?php

namespace App\Preprocessor;

interface StaticPagePreprocessorInterface
{
    /**
     * Prepare additional data required by static page
     *
     * @param  array  $pageInfo
     * @param  array  $meta
     * @return array
     */
    public function prepare($pageInfo = [], $meta = []);
}
