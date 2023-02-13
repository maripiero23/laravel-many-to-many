@extends('layouts.app')

@section('content')
    <div class="container">

        <div>
            <h1 class="text-center text-primary">modifica Progetto # {{$project->id}}</h1>
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
            <div class="col-6">
    
                <form action="{{route('admin.projects.update', $project->id)}}" method="POST" enctype='multipart/form-data'>
                    @csrf
                    @method('PUT')
        
                    <label class="form-label">Title: </label>
                    {{-- L'unica differenza che la view edit ha con la view create è che i campi devono avere, al loro interno,
                    già il valore salvato nel database, userò quindi il VALUE --}}
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$errors->has('name') ? '' :old('name')}}">
                    @error('name') {{--se ho un errore nel campo name stampami un div con la classe invalid-feedback,un messaggio con errore--}}
                    <div class="invalid-feedback">
                    {{ $message }}
                    </div>
                    @enderror


                    <div class="my-3">
                        {{-- una checkbox per ogni tecnologia disponibile. L'utente sceglie quali e quanti associare a questo progetto --}}
                        @foreach ($technologies as $technology)
                            <div class="form-check form-check-inline @error('technologies') is-invalid @enderror">
                                <input class="form-check-input @error('technologies') is-invalid @enderror" type="checkbox" id="technologyCheckbox_{{$loop->index}}" value="{{$technology->id}}"
                                 name="technologies[]">
                                <label class="form-check-label" for="technologyCheckbox_{{$loop->index}}">{{$technology->name}}</label>
                          </div>
                        @endforeach
                        @error('github_link') 
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label class="form-label">Type</label>
                        <select name="type_id" class="form-select">
                            <option value=""></option>

                            @foreach($types as $type)
                            <option value="{{$type->id}}">{{$type->name}}</option>                   
                            @endforeach                            
                        </select>
                    </div>

        
                    <label class="form-label">Description: </label>
                    {{--Per le textare non c'è il VALUE ma bisogna scrivere dentro i tag--}}
                    <textarea type="text" name="description" class="form-control @error('description') is-invalid @enderror">{{$errors->has('description') ? '' :old('description')}}</textarea>
                    
                    <label class="form-label">Thumb: </label>
                    {{--Se ho un errore nel campo name mi stampi il valore prima dell'errore se non c'è nulla da stampare mi stampi il valore che c'è nel form create--}}
                    <input type="file" name="cover_img" class="form-control @error('cover_img') is-invalid @enderror" value="{{$errors->has('cover_img') ? '' :old('cover_img')}}">
                    
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