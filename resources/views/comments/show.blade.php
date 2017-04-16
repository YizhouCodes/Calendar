<li class="list-group-item">
	<strong>
		{{ $comment->user->name }} {{ $comment->created_at->diffForHumans() }}
	</strong>
		{{ $comment->body }}
</li>