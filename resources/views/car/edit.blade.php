<x-app-layout>
<div style="height: calc(100vh - 65px);overflow:hidden;">
    <form method="POST" enctype="multipart/form-data" action="{{ route('update_car', [ 'car'=>$car ]) }}" class="mx-auto max-w-7xl sm:px-6 sm:mt-5 lg:p-60">
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        @csrf

        <!-- Mark -->
        <div>
            <x-label for="mark" :value="__('Mark')" />

            <x-input id="mark" class="block mt-1 w-full" type="text" name="mark" value="{{ $car->mark }}" required autofocus />
        </div>

        <!-- Description -->
        <div class="mt-4">
            <x-label for="description" :value="__('Description')" />

            <x-input id="description" class="block mt-1 w-full" type="text" name="description" value="{{ $car->description }}" required />
        </div>

        <!-- Plate number -->
        <div class="mt-4">
            <x-label for="plate_number" :value="__('Plate number')" />

            <x-input id="plate_number" class="block mt-1 w-full" type="text" name="plate_number" value="{{ $car->plate_number }}" required />
        </div>

        <!-- Price per day -->
        <div class="mt-4">
            <x-label for="price_per_day" :value="__('Price per day')" />

            <x-input id="price_per_day" class="block mt-1 w-full" type="number" name="price_per_day" value="{{ $car->price_per_day }}" required />
        </div>


        <div class="mt-4">
            <x-label for="price_per_day" :value="__('Price per day')" />

            <x-input type="file" class="block mt-1 w-full" name="image" placeholder="Choose image" id="image" required />
        </div>


        <div class="flex items-center justify-end mt-4">
            <x-button class="ml-4">
                {{ __('Update car') }}
            </x-button>
        </div>
    </form>
</div>
</x-app-layout>
