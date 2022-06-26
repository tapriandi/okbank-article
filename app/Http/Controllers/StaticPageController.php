<?php

namespace App\Http\Controllers;

use Route;
use Illuminate\Http\Request;
use App\StaticPageRepository;
use App\Preprocessor\StaticPagePreprocessorInterface;
use App\Preprocessor\InvalidStaticPagePreprocessorException;

class StaticPageController extends Controller
{
    private $repository;

    public function __construct(StaticPageRepository $repository)
    {
        $this->repository = $repository;
    }

    public function _default($locale = '')
    {
        if (empty($locale))
        {
            $locale = config('app.locale');
        }
        else
        {
            app()->setLocale($locale);
        }

        $currentUri = str_replace('{locale}', '/', str_replace('{locale}/', '', Route::current()->uri));
        $base_translate_uri = $currentUri;

        if ($currentUri == '/')
        {
            $currentUri = '__home__';
        }

        if ($base_translate_uri != '/') {
            $base_translate_uri = '/' . $base_translate_uri;
        }

        $pageInfo = config('static.pages.' . $currentUri);
        if (isset($pageInfo['translation']) && isset($pageInfo['translation'][$locale]))
        {
            foreach ($pageInfo['translation'][$locale] as $key => $translation)
            {
                $pageInfo[$key] = $translation;
            }
        }

        $pageInfo['locale'] = $locale;
        $pageInfo['id_uri'] = '/id' . $base_translate_uri;
        $pageInfo['en_uri'] = '/en' . $base_translate_uri;

        $data = $this->repository->getDataByUri($currentUri, $locale);
        $meta = $this->repository->getMetaByUri($currentUri, $locale);

        if (!empty($pageInfo['preprocessor']))
        {
            $pagePreprocessor = app()->make($pageInfo['preprocessor']);

            if (!$pagePreprocessor instanceof StaticPagePreprocessorInterface)
            {
                throw new InvalidStaticPagePreprocessorException;
            }

            $extraData = $pagePreprocessor->prepare($pageInfo, $meta);
            if (is_array($extraData))
            {
                $meta = array_merge($meta, $extraData);
            }
        }

        return view('static/' . $currentUri, array_merge($meta, [ 'data' => $data, 'page' => $pageInfo ]));
    }
}
