@extends('adozioni.base.layout')

@section('title', 'Seleziona un Grado')

@section('content')

    <div class="container mx-auto px-4 mt-4">
        <div class="flex">
            <input type="text" id="searchInput" onkeyup="filterGrades()" placeholder="Filtra Gradi" class="w-full px-3 py-2 placeholder-gray-500 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm mr-4" />
            <button class="px-5 py-2 border border-gray-300 rounded-md text-white bg-blue-500 flex items-center">
                <i class="fas fa-filter"></i>
            </button>
        </div>

        <div class="grid grid-cols-2 gap-4 mt-4" id="gradeList">
            @foreach ($grades as $grade)
                @php
                    $url = "/scuole/" . $city . "/" . $grade;
                @endphp

                <form action="{{ $url }}" method="get">
                    <button type="submit" class="w-full py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-white focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                        {{ $grade }}
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
        function filterGrades() {
            var input, filter, gradeList, grades, a, i;
            input = document.getElementById('searchInput');
            filter = input.value.toUpperCase();
            gradeList = document.getElementById("gradeList");
            grades = gradeList.getElementsByTagName('form');

            for (i = 0; i < grades.length; i++) {
                a = grades[i].getElementsByTagName("button")[0];
                if (a) {
                    if (a.textContent.toUpperCase().indexOf(filter) > -1) {
                        grades[i].style.display = "";
                    } else {
                        grades[i].style.display = "none";
                    }
                }
            }
        }
    </script>
@endpush
