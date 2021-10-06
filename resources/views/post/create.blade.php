@extends('layout')

@section('content')

    @if($errors->any)
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
<div class="text-center">
<form method="POST" action="/post/">
@csrf
  <div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" class="form-control" id="title" @error("title") class="error" @enderror value="{{ old('title') }}" name="title" placeholder="title"/>
  </div>
  <div class="mb-3">
    <label for="content" class="form-label">Content</label>
    <textarea type=" text" class="form-control" @error("content") class="error" @enderror id="content" value="{{ old('content') }}" name="content" placeholder="content"></textarea>
  </div>
  <button type="submit">Create</button>
</form>
</div>
@endsection