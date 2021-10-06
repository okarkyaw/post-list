@extends('layouts.app')

@section('content')
    <div>
        <form method="POST" action="/post/{{ $post->id}}/">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <input type="text" name="title" value="{{ $post->title}}" class="form-control"/>
            </div>
            <div class="mb-3">
                <textarea class="form-control" type=" text" name="content">{{ $post->content}}</textarea>
            </div>
            <button type=" submit">Update</button>
        </form>
    </div>
@endsection