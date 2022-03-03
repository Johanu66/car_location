<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cars') }}
        </h2>
    </x-slot>
    @auth
    @if(Auth::user()->admin)
        <div class="pt-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-wrap justify-center">
                <a href="{{ route('create_car') }}">
                    <button type="button" class="m-2 inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Add new car</button>
                </a>
            </div>
        </div>
    @endif
    @endauth
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-wrap justify-center">
            @foreach ($cars as $car)
                <div class="flex justify-center m-2">
                    <div class="rounded-lg shadow-lg bg-white max-w-sm flex flex-column">
                        <a href="#!" data-mdb-ripple="true" data-mdb-ripple-color="light">
                            <img class="rounded-t-lg" src="{{ asset('images/'.$car->image_name) }}" alt="{{ $car->image_name }}"/>
                        </a>
                        <div class="p-6 flex grow flex-column justify-between">
                            <h5 class="text-gray-900 text-xl font-medium mb-4">{{ $car->mark }}</h5>
                            <h6 class="text-gray-900 text-xl font-medium mb-4">{{ $car->price_per_day }}$ per day</h6>
                            <p class="text-gray-700 text-base mb-4">
                                Plate number : {{ $car->plate_number }}
                            </p>
                            <p class="text-gray-700 text-base mb-4">
                                {{ $car->description }}
                            </p>
                            <div class="flex justify-between">
                                @auth
                                    <a href="{{ route('create_location', [ 'car'=>$car ]) }}">
                                        <button type="button" class="inline-block px-6 py-2.5 border border-success hover:text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-700 hover:shadow-lg focus:bg-green-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-800 active:shadow-lg transition duration-150 ease-in-out">Rent</button>
                                    </a>
                                    @if(Auth::user()->admin)
                                        <a href="{{ route('edit_car', [ 'car'=>$car ]) }}">
                                            <button type="button" class="inline-block px-6 py-2.5 border border-info hover:text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Edit</button>
                                        </a>
                                        <a href="{{ route('destroy_car', [ 'car'=>$car ]) }}">
                                            <button type="button" class="inline-block px-6 py-2.5 border border-danger hover:text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out">Delete</button>
                                        <a>
                                    @endif
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>