<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\StaticPageRepository;

class AdminStaticPageController extends BaseController
{
    private $repository;

    public function __construct(StaticPageRepository $repository)
    {
        $this->repository = $repository;
    }

    public function list()
    {
        return view('admin/static-page/list', [
            'routes' => config('static.pages')
        ]);
    }

    public function edit($uri)
    {
        $uri = str_replace('___', '/', $uri);
        $pageInfo = config('static.pages.' . $uri);
        $meta = $this->repository->getLocalesMetaByUri($uri);
        $pageData = $this->repository->getLocalesDataByUri($uri);

        return view('admin/static-page/edit', [
            'fields' => $pageInfo['fields'] ?? [],
            'values' => $meta,
            'data' => $pageData
        ]);
    }

    public function update($uri, Request $request)
    {
        $uri = str_replace('___', '/', $uri);

        $pageInfo = config('static.pages.' . $uri);
        $availableFields = collect($pageInfo['fields'])->keys();
        $pageDataNameWithLocale = [];
        $inputFieldsWithLocale = $request->input('fields');

        foreach (config('app.supported_locale') as $locale)
        {
            $pageDataNameWithLocale = array_merge($pageDataNameWithLocale, [ 'title.' . $locale, 'description.' . $locale, 'keywords.' . $locale, 'robots.' . $locale ]);
        }

        $updatedPageDataAllLocales = [];
        $pageDataWithLocale = $request->only($pageDataNameWithLocale);
        foreach ($pageDataWithLocale as $pageDataName => $locales)
        {
            foreach ($locales as $locale => $val)
            {
                array_set($updatedPageDataAllLocales, implode('.', [ $locale, $pageDataName ]), $val);
            }
        }

        foreach ($updatedPageDataAllLocales as $locale => $rowData)
        {
            $this->repository->updateData($uri, $locale, $rowData);
        }

        if ($inputFieldsWithLocale)
        {
            foreach ($inputFieldsWithLocale as $locale => $inputFields)
            {
                if (!empty($availableFields) && !empty($inputFields))
                {
                    foreach ($inputFields as $inputFieldName => $inputValue)
                    {
                        if ($availableFields->contains($inputFieldName) && !empty($inputValue))
                        {
                            $this->repository->updateMeta($uri, $locale, $inputFieldName, $inputValue);
                        }
                    }
                }
            }
        }

        \Alert::success('Static page meta data updated')->flash();

        return redirect('admin/static-page');
    }
}
