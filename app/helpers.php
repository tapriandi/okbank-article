<?php

if (! function_exists('render_static_block')) {
    function render_static_block($block_key)
    {
        $repository = new \App\StaticBlockRepository;

        return $repository->getBlockByKey($block_key, app()->getLocale());
    }
}

if (! function_exists('static_image_path')) {
    function static_image_path($image_key)
    {
        $repository = new \App\StaticImagesRepository;

        return url($repository->getImageByKey($image_key, app()->getLocale()));
    }
}
