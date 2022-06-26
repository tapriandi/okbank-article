<?php

namespace App\Http\Controllers;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\ArticleRequest as StoreRequest;
use App\Http\Requests\ArticleRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class ArticleCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class ArticleCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Article');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/article');
        $this->crud->setEntityNameStrings('article', 'articles');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        // $this->crud->setFromDb();

        // COLUMNS

        $this->crud->addColumn([
            'name' => 'title',
            'label' => 'Title',
            'type' => 'text',
        ]);

        $this->crud->addColumn([
            'name' => 'meta_tag',
            'label' => 'Meta Tag',
            'type' => 'text',
        ]);

        $this->crud->addColumn([
            'name' => 'image',
            'label' => 'Image',
            'type' => 'image',
        ]);

        $this->crud->addColumn([
            'name' => 'category_id',
            'label' => 'Category',
            'type' => 'text',
        ]);

        $this->crud->addColumn([
            'name' => 'sub_category',
            'label' => 'Sub Category',
            'type' => 'text',
        ]);

        $this->crud->addColumn([
            'name' => 'content',
            'label' => 'Content',
            'type' => 'text',
        ]);

        // FIELDS

        $this->crud->addField([
            'name' => 'title',
            'label' => 'Article',
            'type' => 'text'
        ]);

        $this->crud->addField([
            'name' => 'meta_tag',
            'label' => 'Meta Tag',
            'type' => 'text'
        ]);

        $this->crud->addField([
            'label'     => "Category",
            'type'      => "select",
            'name'      => 'category_id',
            'entity'    => 'category',
            'model'     => "App\Models\Category",
            'attribute' => 'name',
        ]);

        $this->crud->addField([
            'name'      => "sub_category",
            'label'     => "Sub Category",
            'type'      => 'text',
        ]);

        $this->crud->addField([
            'name' => 'image',
            'label' => 'Image',
            'type' => 'image',
            'upload' => true,
        ]);

        $this->crud->addField([
            'name' => 'content',
            'label' => 'Content',
            'type' => 'ckeditor',
            'options' => [
                'autoGrow_minHeight' => 200,
                'autoGrow_bottomSpace' => 50,
                'removePlugins' => 'resize,maximize',
            ]
        ]);

        // add asterisk for fields that are required in ArticleRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
    }

    public function store(StoreRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }
}
