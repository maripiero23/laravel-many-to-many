@extends('layouts.app')

@section('content')
<div class="text-center my-3">
    <h1 class="text-dark">Pogetto #{{ $project->id }}</h1>
</div>
<div class="card" style="width: 18rem;">
    <img src="{{$project->cover_img}}" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">{{$project->name}}</h5>
      <p class="card-text">{{$project->description}}</p>
      <p class="card-text">{{$project->user_id}}</p>
      <p class="card-text">{{$project->github_link}}</p>
      <p class="card-text">{{$project->Type->name}}</p>



      <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
  </div>
<div class="text-center mt-3">
    <a href="{{route('admin.projects.index')}}"><button class="btn btn-secondary fw-semibold">All Projects</button></a>
</div>
@endsection