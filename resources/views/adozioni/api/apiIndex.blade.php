@extends('adozioni.base.layout')

@section('title', 'Documentazione API')

@section('content')

    <body class="p-5">
    <h1 class="text-4xl font-bold mb-5"><i class="fas fa-book"></i> Documentazione API</h1>

    <div class="p-6 mt-6 shadow rounded-md text-white bg-gradient-to-r from-teal-600 to-blue-600">
        <p class="text-xl mb-2"><i class="fas fa-info-circle"></i> Info Rapide</p>
        <p class="text-lg mb-2">
            <i class="fas fa-globe"></i> <strong>URL di base:</strong> "https://libroclasse.it/api/"
        </p>
        <p class="text-lg mb-2">
            <i class="fas fa-tachometer-alt"></i> <strong>Rate limit:</strong> 5 requests per second
        </p>
    </div>

    <h2 class="text-2xl font-bold mb-2 mt-8"><i class="fas fa-route"></i> Rotte</h2>

    <div class="space-y-2">
        <div class="bg-blue-50 p-3 rounded-md">
            <div class="flex items-center mb-1">
                <span class="bg-red-500 text-white p-1 rounded"><i class="fas fa-arrow-right"></i> POST</span>
                <span class="ml-3 text-lg font-semibold">{codiceScuola}</span>
            </div>
            <p><i class="fas fa-school"></i> Ritorna la lista delle classi per la scuola specificata.</p>
        </div>

        <div class="bg-blue-50 p-3 rounded-md">
            <div class="flex items-center mb-1">
                <span class="bg-red-500 text-white p-1 rounded"><i class="fas fa-arrow-right"></i> POST</span>
                <span class="ml-3 text-lg font-semibold">{codiceScuola}/{classe}</span>
            </div>
            <p><i class="fas fa-book-open"></i> Ritorna la lista dei libri per la classe specificata nella scuola specificata.</p>
        </div>
    </div>
    </body>

@endsection
