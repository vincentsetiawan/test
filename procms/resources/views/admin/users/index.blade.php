@extends('layouts.admin')

@section('content')

	<h1>Users</h1>

<table class="table">
	<thead>
		<tr>
			<th>ID</th>
			<th>Photo</th>
			<th>Name</th>
			<th>E-Mail</th>
			<th>Role</th>
			<th>Active</th>
			<th>Created</th>
			<th>Updated</th>
		</tr>
	</thead>
	<tbody>
	@if($users)
		@foreach($users as $user)

		<tr>
			<td>{{$user->id}}</td>
			<td><img height="50" src="{{$user->photo ? $user->photo->file : 'No User Photo'}}"/></td>
			<td>{{$user->name}}</td>
			<td>{{$user->email}}</td>
			<td>{{$user->role ? $user->role->name : 'No Role'}}</td>
			<td>{{$user->is_active == 1 ? 'Active' : 'Not Active'}}</td>
			<td>{{$user->created_at->diffForHumans()}}</td>
			<td>{{$user->updated_at->diffForHumans()}}</td>
		</tr>

		@endforeach
	@endif
	</tbody>
</table>

@stop