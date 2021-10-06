@extends("layouts.app")
@section('content')

<div class="col s12 text-center">
    <h1 class="col s8">Post List</h1>
</div>
 
  
  @foreach($posts as $post)
    <post-list
      detail_url="{{route('post.show',$post->id)}}"
      edit_url="{{route('post.edit',$post->id)}}">
        <template slot="title">{{$post->title}}</template>
        <template slot="author_name">{{$post->author->name}}</template>
        <template slot="created_at">{{$post->created_at}}</template>
        <template slot="content">{{$post->content}}</template>
    </post-list>
  @endforeach
 

@endsection
