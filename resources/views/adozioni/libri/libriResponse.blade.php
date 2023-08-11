@extends('adozioni.base.layout')

@section('title', 'Libri adottati')

@section('content')

    <div class="container mx-auto px-4">
        @if (!empty($books) && count($books) > 0)
            <h1 class="text-2xl font-bold mb-4">Libri della classe {{ $classe }}</h1>
            <div class="flex flex-wrap -m-4">
                @foreach($books as $book)
                    <div class="p-4 lg:w-1/2">
                        <div class="h-full bg-white shadow-md rounded-lg px-8 pt-6 pb-8 mb-4">
                            <h2 class="text-xl font-bold mb-2">{{ $book->TITOLO }}</h2> <!-- Book Title -->
                            <p class="text-base">Autori: {{ $book->AUTORI }}</p> <!-- Book Authors -->
                            <p class="text-base">ISBN: {{ $book->CODICEISBN }}</p> <!-- Book ISBN -->
                            <p class="text-base">Editore: {{ $book->EDITORE }}</p> <!-- Book Publisher -->
                            <button class="mt-3 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                <a href="https://www.amazon.it/s?k={{ $book->CODICEISBN }}" class="text-white">Compralo su Amazon.it</a>
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <h1 class="text-2xl font-bold mb-4">Non ci sono libri disponibili per la classe {{ $classe }}.</h1>
        @endif
    </div>

@endsection

@section('footer')
    @parent
@endsection
