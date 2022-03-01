<x-app-layout>

    <form method="POST" action="{{ route('store_location') }}" class="mx-auto max-w-7xl sm:px-6 sm:mt-5 lg:p-60">
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

            <x-input id="total_price" class="block mt-1 w-full" type="number" name="total_price" required readonly />
        </div>


        <div class="mt-4">
            <x-label for="plate_number" :value="__('Car plate number')" />

            <x-input id="plate_number" class="block mt-1 w-full" type="text" value="{{ $car->plate_number }}" readonly />
        </div>


        <x-input id="car_id" class="block mt-1 w-full" type="hidden" name="car_id" value="{{ $car->id }}" required />

        <div class="flex items-center justify-end mt-4">
            <x-button class="ml-4">
                {{ __('Rent the car') }}
            </x-button>
        </div>
    </form>
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