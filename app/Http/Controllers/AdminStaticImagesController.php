<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\StaticImagesRepository;

class AdminStaticImagesController extends BaseController
{
    private $repository;

    public function __construct(StaticImagesRepository $repository)
    {
        $this->repository = $repository;
    }

    public function list()
    {
        return view('admin/static-images/list', [
            'images' => config('static.images')
        ]);
    }

    public function edit($key)
    {
        $content = $this->repository->getLocalesImageByKey($key);

        return view('admin/static-images/edit', [
            'content' => $content
        ]);
    }

    public function update($key, Request $request)
    {
        $allImages = config('static.images');
        if (is_int(array_search($key, $allImages)))
        {
            if ($request->input('remove_content'))
            {
                foreach ($request->input('remove_content') as $locale)
                {
                    $this->repository->removeImage($key, $locale);
                }
            }

            if ($request->hasFile('content'))
            {
                foreach ($request->file('content') as $locale => $content)
                {
                    if (!$content->isValid())
                    {
                        \Alert::error('Image is invalid')->flash();
                        continue;
                    }

                    $imagePath = $content->store('images', 'uploads');
                    $this->repository->updateImage($key, $locale, $imagePath);
                }
            }

            \Alert::success('Image path updated')->flash();
        }
        else
        {
            \Alert::error('Image name not found')->flash();
        }

        return redirect('admin/static-images');
    }
}
