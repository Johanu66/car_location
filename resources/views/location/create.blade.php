<x-app-layout>
<div style="height: calc(100vh - 65px);overflow:hidden;">
    <form method="POST" action="{{ route('store_location') }}" class="mx-auto max-w-3xl p-5 lg:mt-20 rounded bg-white">

        <h1 style="font-size: 2em;font-weight: bold;" class="text-center">Rent a car</h1>
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        @csrf


        <div>
            <x-label for="start_at" :value="__('Begin date')" />

            <x-input id="start_at" onchange="get_total_price()" class="block mt-1 w-full" type="date" name="start_at" :value="old('start_at')" required />
        </div>


        <div class="mt-4">
            <x-label for="end_at" :value="__('End date')" />

            <x-input id="end_at" onchange="get_total_price()" class="block mt-1 w-full" type="date" name="end_at" :value="old('end_at')" required />
        </div>


        <div class="mt-4">
            <x-label for="total_price" :value="__('Total Price ($)')" />

            <x-input id="total_price" class="block mt-1 w-full" type="number" name="total_price" disabled />
        </div>


        <div class="mt-4">
            <x-label for="plate_number" :value="__('Car plate number')" />

            <x-input id="plate_number" class="block mt-1 w-full" type="text" value="{{ $car->plate_number }}" disabled />
        </div>


        <div class="mt-4">
            <x-label for="unavailable_dates" :value="__('Unavailable dates')" />

            <select id="unavailable_dates" class="block mt-1 w-full form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                <option>Click to see the list of unavailable dates</option>
                @foreach ($locations as $location)
                <option disabled>
                    {{ $location->start_at }} ______to______ {{ $location->end_at }}
                </option>
                @endforeach
            </select>
        </div>


        <x-input id="car_id" class="block mt-1 w-full" type="hidden" name="car_id" value="{{ $car->id }}" />

        <div class="flex items-center justify-end mt-4">
            <x-button class="ml-4">
                {{ __('Rent the car') }}
            </x-button>
        </div>
    </form>
</div>
</x-app-layout>
<script>
    function get_total_price(){
        var start_at = new Date($('#end_at').val());
        var end_at = new Date($('#start_at').val());
        var day_number = (start_at - end_at)/86400000 + 1;
        var car_price = {{ $car->price_per_day }};
        $('#total_price').val(car_price*day_number);
    }
</script>