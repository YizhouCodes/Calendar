<li class="list-group-item">
	<strong>
		{{ $comment->user->name }} {{ $comment->created_at->diffForHumans() }}
	</strong>
		{{ $comment->body }}
	@if (Auth::user()->id == $comment->user->id || Gate::allows('is-moderator'))
		<button class="btn btn-danger">Delete</button>
	@endif
</li>