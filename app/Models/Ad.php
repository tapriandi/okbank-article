<?php

namespace App\Models;

use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'ad';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['title', 'link', 'image_desktop', 'image_mobile' ];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESORS
    |--------------------------------------------------------------------------
    */
    public function getImageMobileAttribute($value)
    {
        if ($value) {
            return url(config('filesystems.disks.uploads.path') . $value);
        }
    }

    public function getImageDesktopAttribute($value)
    {
        if ($value) {
            return url(config('filesystems.disks.uploads.path') . $value);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */

    public function setImageMobileAttribute($value)
    {
        $attribute_name = "image_mobile";
        $disk = "uploads";
        $destination_path = "image/ad";

        $this->storeImage($value, $attribute_name, $disk, $destination_path);
    }

    public function setImageDesktopAttribute($value)
    {
        $attribute_name = "image_desktop";
        $disk = "uploads";
        $destination_path = "image/ad";

        $this->storeImage($value, $attribute_name, $disk, $destination_path);
    }

    public function storeImage($value, $attribute_name, $disk, $destination_path){
        // if the image was erased
        if ($value==null) {
            // delete the image from disk
            \Storage::disk($disk)->delete($this->{$attribute_name});

            // set null in the database column
            $this->attributes[$attribute_name] = null;
        }

        // if a base64 was sent, store it in the db
        if (starts_with($value, 'data:image'))
        {
            // 0. Make the image
            $image = \Image::make($value);
            // 1. Generate a filename.
            $filename = md5($value.time()).'.jpg';
            // 2. Store the image on disk.
            \Storage::disk($disk)->put($destination_path.'/'.$filename, $image->stream());
            // 3. Save the path to the database
            $this->attributes[$attribute_name] = $destination_path.'/'.$filename;
        }
    }
}
