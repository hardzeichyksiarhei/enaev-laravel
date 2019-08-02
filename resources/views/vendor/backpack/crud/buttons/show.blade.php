@if ($crud->hasAccess('show'))
	<a href="{{ route('crud.order.show', $entry->getKey()) }}" class="btn btn-xs btn-default"><i class="fa fa-eye"></i> {{ trans('backpack::crud.preview') }}</a>
@endif