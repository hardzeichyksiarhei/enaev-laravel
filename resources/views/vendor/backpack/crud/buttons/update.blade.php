@if ($crud->hasAccess('update'))
	<a href="{{ route('crud.order.edit', $entry->getKey()) }}" class="btn btn-xs btn-default"><i class="fa fa-edit"></i> {{ trans('backpack::crud.edit') }}</a>
@endif