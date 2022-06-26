<?php

namespace App\Http\Controllers;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\LinkRequest as StoreRequest;
use App\Http\Requests\LinkRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class LinkCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class LinkCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Link');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/link');
        $this->crud->setEntityNameStrings('link', 'links');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        // $this->crud->setFromDb();

        // Columns
        $this->crud->addColumn([
            'name' => 'title',
            'label' => 'Title',
            'type' => 'text',
        ]);

        $this->crud->addColumn([
            'name' => 'link',
            'label' => 'Url',
            'type' => 'text',
        ]);

        $this->crud->addColumn([
            'name' => 'sub_text',
            'label' => 'Sub Text',
            'type' => 'text',
        ]);

        $this->crud->addColumn([
            'name' => 'category',
            'label' => 'Category',
            'type' => 'text',
        ]);
        
        // fields
        $this->crud->addField([
            'name' => 'title',
            'label' => 'Title',
            'type' => 'text'
        ]);

        $this->crud->addField([
            'name' => 'link',
            'label' => 'Url',
            'type' => 'text'
        ]);

        $this->crud->addField([
            'name' => 'sub_text',
            'label' => 'Sub Text',
            'type' => 'text'
        ]);

        $this->crud->addField([
            'name' => 'category',
            'label' => 'Category',
            'type' => 'text'
        ]);


        // add asterisk for fields that are required in LinkRequest
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
