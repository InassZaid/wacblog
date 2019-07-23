@extends('layout.admin')
@section('content')
<div class="content-wrapper">
<style>
	.text-bold {
		font-weight: bold;
	}
</style>

<h2>Notifications</h2>

<ul id="notifications">
	@foreach ($notifications as $notification)
	<li>{{ $notification->read_at? '' : 'class=text-bold' }}><a href="{{ $notification->data['url'] }}">{{ $notification->data['message'] }}</a>
	<time>{{ $notification->created_at->diffForHumans() }}</time>
	</li>
	{{ $notification->markAsRead() }}
	@endforeach
</ul>


</div>
@endsection
