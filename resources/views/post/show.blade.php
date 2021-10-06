@extends("layouts.app")
@section('content')
    <post-detail
      
      edit_url="{{route('post.edit',$post->id)}}">
        <template slot="title">{{$post->title}}</template>
        <template slot="author_name">{{$post->author->name}}</template>
        <template slot="created_at">{{$post->created_at}}</template>
        <template slot="content">{{$post->content}}</template>
    </post-detail>
@endsection