<?php

namespace App;

use DB;

class StaticPageRepository
{
    public function __construct()
    {

    }

    public function getLocalesMetaByUri($uri)
    {
        if (is_array($uri))
        {
            return collect($uri)->mapWithKeys(function($item, $key) {
                return [ $item => $this->getLocalesMetaByUri($item) ];
            })->toArray();
        }
        else
        {
            return DB::table('static_pages_meta')->where([
                'uri' => $uri
            ])->get()->mapToGroups(function($item, $key) {
                return [ $item->locale => $item ];
            })->map(function($item, $key) {
                return $item->keyBy('key')->map(function($obj) {
                    return $obj->val;
                });
            })->toArray();
        }
    }

    public function getLocalesDataByUri($uri)
    {
        if (is_array($uri))
        {
            return collect($uri)->mapWithKeys(function($item, $key) {
                return [ $item => $this->getLocalesDataByUri($item) ];
            })->toArray();
        }
        else
        {
            return DB::table('static_pages')->where([
                'uri' => $uri
            ])->get()->keyBy('locale')->toArray();
        }

    }

    public function getDataByUri($uri, $locale)
    {
        return DB::table('static_pages')->where([ 'uri' => $uri, 'locale' => $locale ])->first();
    }

    public function getMetaByUri($uri, $locale)
    {
        return DB::table('static_pages_meta')->where([
            'uri' => $uri,
            'locale' => $locale
        ])->get()->keyBy('key')->map(function($obj) {
            return $obj->val;
        })->toArray();
    }

    public function getUriMetaUpdatedAfterTime($timestamp)
    {
        return DB::table('static_pages_meta')
                ->where('updated_at', '>', $timestamp)
                ->distinct()
                ->select([ 'uri' ])
                ->get();
    }

    public function updateMeta($uri, $locale, $key, $value)
    {
        $table = DB::table('static_pages_meta');
        $attributes = [ 'uri' => $uri, 'locale' => $locale, 'key' => $key ];
        $values = [ 'val' => $value, 'updated_at' => \Carbon\Carbon::now()->toDateTimeString() ];

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

    public function updateData($uri, $locale, $rowData)
    {
        $table = DB::table('static_pages');
        $attributes = [ 'uri' => $uri, 'locale' => $locale ];
        $values = array_merge($rowData, [ 'updated_at' => \Carbon\Carbon::now()->toDateTimeString() ]);

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
