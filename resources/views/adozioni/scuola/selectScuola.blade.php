@extends('adozioni.base.layout')

@section('title', 'Select a School')

@section('content')

    <div class="container mx-auto px-4 mt-4">
        <div class="flex">
            <input type="text" id="searchInput" onkeyup="filterSchools()" placeholder="Filtra scuola" class="w-full px-3 py-2 placeholder-gray-500 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm mr-4" />
            <button class="px-5 py-2 border border-gray-300 rounded-md text-white bg-blue-500 flex items-center">
                <i class="fas fa-filter"></i>
            </button>
        </div>

        <div class="grid grid-cols-2 gap-4 mt-4" id="schoolsList">
            @foreach ($scuole as $school)
                @php
                    $url = "/class/" . $school->id;
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

@push('scripts')
    <script>
        function filterSchools() {
            var input, filter, schoolsList, schools, a, i;
            input = document.getElementById('searchInput');
            filter = input.value.toUpperCase();
            schoolsList = document.getElementById("schoolsList");
            schools = schoolsList.getElementsByTagName('form');

            for (i = 0; i < schools.length; i++) {
                a = schools[i].getElementsByTagName("button")[0];
                if (a) {
                    if (a.textContent.toUpperCase().indexOf(filter) > -1) {
                        schools[i].style.display = "";
                    } else {
                        schools[i].style.display = "none";
                    }
                }
            }
        }
    </script>
@endpush
