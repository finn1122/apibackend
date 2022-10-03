@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">

    <div class="w-full sm:px-6">

        @if (session('status'))
            <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

            <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                Dashboard
            </header>

            <div class="w-full p-6">
                <p class="text-gray-700">
                    You are logged in!
                </p>
            </div>
        </section>
    </div>

    <body class="bg-gray-100 text-gray-700">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-3 my-10">
                @foreach($movies as $movie)
                    <div class="bg-white hover:bg-blue-100 border border-gray-200 p-5">
                        <h2 class="font-bold text-lg mb-4">{{$movie->name}}</h2>
                        <p class="text-xs">{{$movie->publication_date}}</p>
                        <p class="text-xs text-right">{{$movie->created_at}}</p>
                    </div>
                @endforeach
            </div>
            <div class="mb-10">
                {{ $movies->links() }}
            </div>

        </div>
        
    </body>
</main>
@endsection
