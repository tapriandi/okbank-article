@if (Auth::user()->hasPermissionTo('can_manage_users'))
<form method="POST" action="{{ url($crud->route.'/'.$entry->getKey().'/reset') }}">
	{{ csrf_field() }}
	<button class="btn btn-xs btn-default"><i class="fa fa-bullseye"></i> Reset 2FA Secret</button>
</form>
@endif