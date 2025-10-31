<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Subscription') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold">Your Current Plan</h3>
                    <p class="mt-4">You are currently on the <strong>{{-- User's current plan --}}</strong> plan.</p>
                </div>
            </div>

            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold">Available Plans</h3>
                    <div class="mt-4 grid grid-cols-1 md:grid-cols-3 gap-8">
                        @foreach (config('plans') as $plan)
                            <div class="border p-4 rounded-lg">
                                <h4 class="text-xl font-bold">{{ $plan['name'] }}</h4>
                                <ul class="mt-4 space-y-2">
                                    @foreach ($plan['features'] as $feature)
                                        <li>{{ $feature }}</li>
                                    @endforeach
                                </ul>
                                <div class="mt-4">
                                    {{-- Subscription button will go here --}}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
