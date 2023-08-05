@extends('adozioni.base.layout')

@section('title', 'Metodo non consentito')

@section('content')
    <div class="flex flex-col justify-center items-center py-16">
        <h2 class="text-4xl font-bold text-gray-800 mb-8">Spiacenti, il metodo utilizzato non è consentito per la richiesta attuale.</h2>
        <a href="{{ url('/') }}" class="bg-blue-500 text-white p-4 rounded">Torna alla home</a>
    </div>
@endsection
