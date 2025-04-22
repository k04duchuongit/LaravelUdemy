<div>

    @foreach ($posts as $post)
        @can('updatePost', $post)
            <a href="{{ route('post.edit', $post->id) }}">{{ $post->title }}</a>
            <br>
        @endcan
    @endforeach
</div>
