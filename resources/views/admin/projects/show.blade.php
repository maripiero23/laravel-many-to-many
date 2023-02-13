@extends('layouts.app')

@section('content')
<div class="text-center my-3">
    <h1 class="text-dark">Progetto #{{ $project->id }}</h1>
</div>
<div class="container">

  <li class="media">
    <img class="mr-3" src="{{asset('/storage/' . $project->cover_img)}}" alt="Generic placeholder image">
  <div class="media-body">
    <h5 class="card-title">{{$project->name}}</h5>
    <p class="card-text">{{$project->description}}</p>
    <p class="card-text">{{$project->user_id}}</p>
    <p class="card-text">{{$project->github_link}}</p>
    
  </div>
</li>
</ul>
</div>

<div class="text-center mt-3">
    <a href="{{route('admin.projects.index')}}"><button class="btn btn-secondary fw-semibold">All Projects</button></a>
</div>

<ul class="list-unstyled">
@endsection