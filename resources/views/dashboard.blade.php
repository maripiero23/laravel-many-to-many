@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                </div>
                
                <div>
                    <h3 class="text-center">List Projects</h3>
                    <div class="text-center">
                        <a href="{{route('admin.projects.index')}}" class="btn btn-primary">Go</a>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
