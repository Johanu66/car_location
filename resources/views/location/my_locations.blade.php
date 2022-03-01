<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Location') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-wrap justify-center">
            @foreach ($locations as $location)
                <div class="flex justify-center m-2">
                    <div class="rounded-lg shadow-lg bg-white max-w-sm">
                        <a href="#!" data-mdb-ripple="true" data-mdb-ripple-color="light">
                            <img class="rounded-t-lg" src="https://mdbootstrap.com/img/new/standard/nature/182.jpg" alt=""/>
                        </a>
                        <div class="p-6">
                            <h5 class="text-gray-900 text-xl font-medium mb-4">{{ $location->car->mark }}</h5>
                            <p class="text-gray-700 text-base mb-4">Start date : {{ $location->start_at }}</p>
                            <p class="text-gray-700 text-base mb-4">End date : {{ $location->end_at }}</p>
                            <p class="text-gray-700 text-base mb-4">Total price : {{ $location->total_price }} $</p>
                            <p class="text-gray-700 text-base mb-4">
                                Plate number : {{ $location->car->plate_number }}
                            </p>
                            <p class="text-gray-700 text-base mb-4">
                                Description : {{ $location->car->description }}
                            </p>
                            <div class="flex justify-between">
                                <a href="{{ route('destroy_location', [ 'location'=>$location ]) }}">
                                    <button type="button" class="inline-block px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out">Cancel the location</button>
                                <a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>