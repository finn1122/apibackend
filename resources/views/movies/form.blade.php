  
    
    <h1 class="mb-5">{{ $title }}</h1>


    <form class="w-full max-w-lg " method="POST" action="{{ $route }}"> 
    @csrf
    @isset($update)
        @method("PUT")
    @endisset
    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
            {{ __("Crear nueva pelicula") }}
            </label>
            <input  type="text" required id="name" name="name" value="{{ old("name") ?? $movie->name }}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leadind.tight focus:outline-none focus:bg-white focus:border-gray-500 h-12 resize-none"> {{ old("name") ?? $movie->name }} </input>
            <p class="text-gray-600 text-xs italic"> {{  __("Nombre de la pelicula")  }} </p>
            @error("name")
            <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
                {{ $message }}
            </div>
            @enderror
            <div class="antialiased sans-serif">
                <div class="flex items-center justify-center">
                    <div class="datepicker relative form-floating mb-3 xl:w-96">
                        <input type="text"
                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        id="publication_date"
                        name="publication_date"
                        required
                        placeholder="Select a date" />
                        <label for="floatingInput" class="text-gray-700">Select a date</label>
                    </div>
                </div>
            </div>
            @error("date")
            <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
                {{ $message }}
            </div>
            @enderror
            <div class="mb-3 w-96">
            <label for="formFile" class="form-label inline-block mb-2 text-gray-700">Default file input example</label>
            <input class="form-control
            block
            w-full
            px-3
            py-1.5
            text-base
            font-normal
            text-gray-700
            bg-white bg-clip-padding
            border border-solid border-gray-300
            rounded
            transition
            ease-in-out
            m-0
            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" required type="file" id="image" name="image">
        </div>
        </div>
        
        <br>

        <div class="mt-3 md:flex md:items-center">
            <div class="md:w-1/3">
                <button class="shadow bg-black-400 hover;bg-teal-400 focus:shadow-outline focus:outline-none text-black font-bold py-2 px-4 rounded" type="submit">
                    {{ $textButton }}
                </button>
            </div>
        </div>
    </div>        
      
    </form>

 

    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>