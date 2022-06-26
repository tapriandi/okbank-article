<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\StaticBlockRepository;

class AdminStaticBlockController extends BaseController
{
    private $repository;

    public function __construct(StaticBlockRepository $repository)
    {
        $this->repository = $repository;
    }

    public function list()
    {
        return view('admin/static-block/list', [
            'blocks' => config('static.blocks')
        ]);
    }

    public function edit($key)
    {
        $content = $this->repository->getLocalesBlockByKey($key);

        return view('admin/static-block/edit', [
            'content' => $content
        ]);
    }

    public function update($key, Request $request)
    {
        $allBlocks = config('static.blocks');
        if (is_int(array_search($key, $allBlocks)))
        {
            foreach ($request->input('content') as $locale => $content)
            {
                $this->repository->updateBlock($key, $locale, $content);
            }

            \Alert::success('Static block content updated')->flash();
        }
        else
        {
            \Alert::error('Block name not found')->flash();
        }

        return redirect('admin/static-block');
    }
}
