@extends('adozioni.base.layout')

@section('title', 'Pagina non trovata')

@section('content')
    <div class="flex flex-col justify-center items-center py-16">
        @if(isset($exception->getMessage()[0]))
            <h2 class="text-4xl font-bold text-gray-800 mb-8">{{ $exception->getMessage() }}</h2>
        @else
            <h2 class="text-4xl font-bold text-gray-800 mb-8">Spiacenti, la pagina che stai cercando non esiste.</h2>
        @endif
        <a href="{{ url('/') }}" class="bg-blue-500 text-white p-4 rounded">Torna alla home</a>
    </div>
@endsection
