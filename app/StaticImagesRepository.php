<?php

namespace App;

use DB;
use Storage;

class StaticImagesRepository
{
    public function __construct()
    {

    }

    public function getImageByKey($key, $locale)
    {
        return 'uploads/' . (optional(
                    DB::table('static_images')
                        ->where('key', $key)
                        ->where('locale', $locale)
                        ->first()
                )->path ?? '');
    }

    public function getLocalesImageByKey($key)
    {
        $images = [];
        $allContents = DB::table('static_images')->where('key', $key)->get();

        foreach ($allContents as $contentObj)
        {
            $images[$contentObj->locale] = 'uploads/' . $contentObj->path;
        }

        return $images;
    }

    public function removeImage($key, $locale)
    {
        $prevImage = $this->getImageByKey($key, $locale);
        if (isset($prevImage))
        {
            Storage::disk('uploads')->delete(str_replace('uploads/', '', $prevImage));
            DB::table('static_images')->where('key', $key)->where('locale', $locale)->delete();
        }
    }

    public function updateImage($key, $locale,  $value)
    {
        $this->removeImage($key, $locale);

        $table = DB::table('static_images');
        $attributes = [ 'key' => $key, 'locale' => $locale ];
        $values = [ 'path' => $value, 'updated_at' => \Carbon\Carbon::now()->toDateTimeString() ];

        if ($table->where($attributes)->exists())
        {
            $table->where($attributes)->take(1)->update($values);
        }
        else
        {
            $values['created_at'] = $values['updated_at'];
            $table->insert(array_merge($attributes, $values));
        }
    }
}
