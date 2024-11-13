@extends('admin.layouts.master')

@section('title', 'ایندکس کامنت ها')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h5"><i class="fas fa-newspaper"></i> Comments</h1>
    </div>
    <section class="table-responsive">
        <table class="table table-striped table-sm">
            <caption>List of comments</caption>
            <thead>
                <tr>
                    <th>#</th>
                    <th>user ID</th>
                    <th>post ID</th>
                    <th>comment</th>
                    <th>status</th>
                    <th>setting</th>
                </tr>
            </thead>
            <tbody>
                @foreach($comments as $comment)
                    <tr>
                        <td>
                            {{$loop->iteration}}
                        </td>
                        <td>
                            {{$comment->user->name}}
                        </td>
                        <td>
                            {{Str::limit($comment->post->title, 20)}}
                        </td>
                        <td>
                            {{Str::limit($comment->body, 20)}}
                        </td>
                        <td>
                            @if($comment->status == 0) unseen @endif
                            @if($comment->status == 1) seen @endif
                            @if($comment->status == 2) approved @endif
                        </td>
                        <td>
                            @if($comment->status == 0 || $comment->status == 1)
                                <a role="button" class="btn btn-sm btn-success text-white" href="{{ route('admin.comment.approve', $comment) }}">click to approved</a>
                            @endif
                            @if($comment->status == 2)
                                <a role="button" class="btn btn-sm btn-warning text-white" href="{{ route('admin.comment.approve', $comment) }}">click not to approved</a>
                            @endif
                            <a role="button" class="btn btn-sm btn-primary text-white" href="{{ route('admin.comment.show', $comment) }}">show</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div>
            {{$comments->links()}}
        </div>
    </section>

@endsection