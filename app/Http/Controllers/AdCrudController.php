<?php

namespace App\Http\Controllers;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\AdRequest as StoreRequest;
use App\Http\Requests\AdRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class AdCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class AdCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Ad');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/ads');
        $this->crud->setEntityNameStrings('ad', 'ads');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        // $this->crud->setFromDb();

        // Custom columnt
        
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
            'name' => 'image_desktop',
            'label' => 'Desktop Image',
            'type' => 'image',
        ]);

        $this->crud->addColumn([
            'name' => 'image_mobile',
            'label' => 'Mobile Image',
            'type' => 'image',
        ]);

       

        //fields
        $this->crud->addField([
            'name' => 'title',
            'label' => 'Title',
            'type' => 'text',
        ]);

        $this->crud->addField([
            'name' => 'link',
            'label' => 'Url',
            'type' => 'text',
        ]);
        
        $this->crud->addField([
            'name' => 'image_mobile',
            'label' => 'Mobile Image (Landscape)',
            'type' => 'image',
            'upload' => true
        ]);

        $this->crud->addField([
            'name' => 'image_desktop',
            'label' => 'Desktop Image (Potrait)',
            'type' => 'image',
            'upload' => true
        ]);

        
        // add asterisk for fields that are required in AdRequest
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
