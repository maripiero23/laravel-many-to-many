@extends('layouts.app')

@section('content')
    <div class="container">

        <h1 class="text-center my-2">My Projects</h1>

        <div class="row">

            <div class="col">

                <div class="row row-cols-1 row-cols-md-2 g-4">
                    @foreach($projects as $project)
                    <div class="col">
                        <div class="card">
                            <img src="{{$project->cover_img}}" class="card-img-top" alt="..." style="widows: 60px">
                            <div class="card-body">
                                <h5 class="card-title">{{$project->name}}</h5>
                                <p class="card-text">{{$project->description}}</p>
                                <p class="card-text">{{$project->user_id}}</p>
                                <p class="card-text">{{$project->github_link}}</p>
                            </div>
                            <div>
                                <a href="{{route('admin.projects.edit', $project->id)}}" class="btn btn-primary"><i class="fas fa-pencil"></i>
                                </a>
                                <a href="{{route('admin.projects.show', $project->id)}}" class="btn btn-warning"><i class="fas fa-eye"></i>
                                </a>
                                <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST">
                                    @csrf()
                                    @method('delete')
                                    
                                    <div>

                                        <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class=" text-center">
            <a href="{{route('admin.projects.create')}}" class="btn btn-primary my-5">Create  new Project</a>
        </div>




    </div>

    <h1>ciao</h1>
    
@endsection