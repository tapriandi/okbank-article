<?php

namespace App;

use DB;

class StaticBlockRepository
{
    public function __construct()
    {

    }

    public function getBlockByKey($key, $locale)
    {
        return optional(
            DB::table('static_blocks')
                ->where('key', $key)
                ->where('locale', $locale)
                ->first()
        )->content;
    }

    public function getLocalesBlockByKey($key)
    {
        $blockContents = [];
        $allContents = DB::table('static_blocks')->where('key', $key)->get();
        foreach ($allContents as $contentObj)
        {
            $blockContents[$contentObj->locale] = $contentObj->content;
        }

        return $blockContents;
    }

    public function updateBlock($key, $locale,  $value)
    {
        $table = DB::table('static_blocks');
        $attributes = [ 'key' => $key, 'locale' => $locale ];
        $values = [ 'content' => $value, 'updated_at' => \Carbon\Carbon::now()->toDateTimeString() ];

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
