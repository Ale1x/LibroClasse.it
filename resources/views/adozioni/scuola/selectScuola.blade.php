@extends('adozioni.base.layout')

@section('title', 'Seleziona una scuola')

@section('content')

    <div class="container mx-auto px-4 mt-4">
        <div class="grid grid-cols-2 gap-4">
            @foreach ($scuole as $school)
                @php
                    $url = "/classi/" . $school->id;
                @endphp

                <form action="{{ $url }}" method="get">
                    <button type="submit" class="w-full py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-white focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                        {{ $school->DENOMINAZIONEISTITUTORIFERIMENTO }}
                    </button>
                </form>
            @endforeach
        </div>
    </div>

@endsection

@section('footer')
    @parent
@endsection
