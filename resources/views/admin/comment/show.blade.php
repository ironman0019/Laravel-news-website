@extends('admin.layouts.master')

@section('title', 'کامنت')

@section('content')
    <section class="pt-3 pb-1 mb-2 border-bottom">
        <h1 class="h5">Show Comment</h1>
    </section>
    <section class="row my-3">
        <section class="col-12">
            <h1 class="h4 border-bottom">Comment body</h1>
            <p class="text-secondary border-bottom">{{$comment->body}}</p>
            <h1 class="h4 border-bottom">Comment status</h1>
            <p class="text-secondary border-bottom">
                @if($comment->status == 0) unseen @endif
                @if($comment->status == 1) seen @endif
                @if($comment->status == 2) approved @endif
            </p>
            <h1 class="h4 border-bottom">Comment username</h1>
            <p class="text-secondary border-bottom">{{$comment->user->name}}</p>
            <h1 class="h4 border-bottom">Comment post title</h1>
            <p class="text-secondary border-bottom">{{$comment->post->title}}</p>
            @if($comment->status == 0 || $comment->status == 1)
            <a role="button" class="btn btn-sm btn-success text-white" href="{{ route('admin.comment.approve', $comment) }}">click to approved</a>
            @endif
            @if($comment->status == 2)
            <a role="button" class="btn btn-sm btn-warning text-white" href="{{ route('admin.comment.approve', $comment) }}">click not to approved</a>
            @endif
            <a role="button" class="btn btn-sm btn-primary text-white" href="{{ route('admin.comment.index') }}">back</a>

        </section>
    </section>

@endsection