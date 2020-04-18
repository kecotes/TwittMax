@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        
                    <p>Mis Entradas</p>

                    <ul>
                        @foreach ($entries as $entry)
                            <li>
                            <a href="{{ $entry->getUrl() }}">{{ $entry->title }}</a>
                            </li> 
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
