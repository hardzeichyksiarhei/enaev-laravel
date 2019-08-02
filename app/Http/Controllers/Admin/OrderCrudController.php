<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\OrderRequest as StoreRequest;
use App\Http\Requests\OrderRequest as UpdateRequest;

/**
 * Class OrderCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class OrderCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Order');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/order');
        $this->crud->setEntityNameStrings('заявку', 'заявки');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */
        $this->crud->removeButton('create');

        $this->crud->addFilter([
          'type' => 'dropdown',
          'name' => 'is_read',
          'label'=> 'Статус'
        ], [
            0 => 'Не прочитанные',
            1 => 'Прочитанные'
        ],
        function($value) {
            $this->crud->addClause('where', 'is_read', $value);
        });

        // TODO: remove setFromDb() and manually define Fields and Columns
        $this->crud->setFromDb();

        $this->crud->orderBy('created_at','desc');

        // Modify Column

        $this->crud->modifyColumn('name', [
            'label' => "Имя",
            'priority' => 1
        ]);

        $this->crud->modifyColumn('contact', [
            'label' => "Контакты",
            'priority' => 2
        ]);

        $this->crud->modifyColumn('caption', [
            'label' => "Заголовок",
            'priority' => 3
        ]);

        $this->crud->modifyColumn('message', [
            'label' => "Сообщение",
            'priority' => 6
        ]);

        $this->crud->modifyColumn('is_read', [
            'label' => "Статус",
            'type' => 'model_function',
            'function_name' => 'getIsReadLabel',
            'priority' => 4
        ]);

        $this->crud->addColumn([
          'name' => 'created_at',
          'label' => 'Дата',
          'type' => 'date',
          'priority' => 5
        ]);

        // Modify Filed

        $this->crud->modifyField('name', [
            'label' => "Имя"
        ]);

        $this->crud->modifyField('contact', [
            'label' => "Контакты"
        ]);

        $this->crud->modifyField('caption', [
            'label' => "Заголовок"
        ]);

        $this->crud->modifyField('message', [
            'label' => "Сообщение"
        ]);

        $this->crud->modifyField('is_read', [
            'label' => "Статус"
        ]);

        $this->crud->modifyField('is_read', [
            'label' => "Статус",
            'type' => 'select_from_array',
            'options' => [ 0 => 'Не прочитано', 1 => 'Прочитано'],
            'allows_null' => false,
            'default' => 0
        ]);

        $this->crud->allowAccess('show');

        // add asterisk for fields that are required in OrderRequest
        //$this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
    }

    public function show($id)
    {
        $content = parent::show($id);

        $order = \App\Models\Order::findOrFail($id)->read();

        return $content;
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
