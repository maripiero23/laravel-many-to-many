@extends('layouts.app')

@section('content')
    <div class="container">

        <div>
            <h1 class="text-center text-primary">New Project</h1>
        </div>
    
        {{-- Se ci sono degli errori di validazione mostriamo un allert con questi errori --}}
        @if($errors->any())
        <div class="alert alert-danger">
            I dati inseriti non sono validi:
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
    
        <div class="row justify-content-center">
            <div class="col-6 mb-2">
    
                <form action="{{route('admin.projects.store')}}" method="POST" enctype='multipart/form-data'>
                    @csrf
                    
                    {{-- name-input --}}
                    <label class="form-label">Title: </label>
                    {{--se c'è un errore nel campo name stampa la classe is-ivalid(riquadro rosso)--}} {{--se c'è un errore nel name svuotami il campo, se è giusto tienimi il campo compilato--}}
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$errors->has('name') ? '' :old('name')}}">
                    @error('name') {{--se ho un errore nel campo name stampami un div con la classe invalid-feedback,un messaggio con errore--}}
                    <div class="invalid-feedback">
                    {{ $message }}
                    </div>
                    @enderror

                    <div class="mb-3">
                        <label class="form-label">Type</label>
                        <select name="type_id" class="form-select">
                            <option value=""></option>

                            @foreach($types as $type)
                            <option value="{{$type->id}}">{{$type->name}}</option>
                            @endforeach                          
                        </select>
                    </div>
        
                    {{-- dsecription-input --}}
                    <label class="form-label">Description: </label>
                    <textarea type="text" name="description" class="form-control @error('description') is-invalid @enderror" value="">{{$errors->has('description') ? '' :old('description')}}</textarea>
                    
                    {{-- cover_img-input --}}
                    <label class="form-label">Thumb: </label>
                    <input type="file" name="cover_img" class="form-control @error('cover_img') is-invalid @enderror" value="{{old('cover_img')}}">
                    
                    {{-- github_link-input --}}
                    <label class="form-label">GitHub: </label>
                    <input type="text" name="github_link" class="form-control @error('github_link') is-invalid @enderror" value="{{$errors->has('github_link') ? '' :old('github_link')}}">
                    @error('github_link') 
                    <div class="invalid-feedback">
                    {{ $message }}
                    </div>
                    @enderror
    
                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary me-3">Add</button>
                    </div>
                </form>
            </div>
            <div class="buttons-containr d-flex justify-content-center">

                <div class="mt-4">
                   <a href="{{route("admin.projects.index")}}"><button class="btn btn-danger">Back</button></a>
               </div>
            </div>           
        </div>
    </div>
@endsection