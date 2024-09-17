<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <!-- Display all food items -->
                    <div class="mt-6">
                        <h3 class="text-lg font-medium">Food Menu</h3>
                        <div class="mt-4">
                            @if($foods->isEmpty())
                                <p>No food items available.</p>
                            @else
                                <ul>
                                    @foreach($foods as $food)
                                        <li class="border-b py-2">
                                            <strong>{{ $food->name }}</strong> - ${{ $food->price }}
                                            <br>
                                            {{ $food->description }}
                                            @if($food->image)
                                                <div class="mt-2">
                                                    <img src="{{ asset('storage/' . $food->image) }}" alt="{{ $food->name }}" class="w-32 h-32 object-cover">
                                                </div>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
