<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Website Settings') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ route('admin.settings.update') }}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <x-input-label for="homepage_title" :value="__('Homepage Title')" />
                            <x-text-input id="homepage_title" name="homepage_title" type="text" class="block mt-1 w-full" :value="old('homepage_title', $settings['homepage_title'] ?? '')" />
                        </div>
                        <div>
                            <x-input-label for="homepage_subtitle" :value="__('Homepage Subtitle')" />
                            <textarea id="homepage_subtitle" name="homepage_subtitle" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">{{ old('homepage_subtitle', $settings['homepage_subtitle'] ?? '') }}</textarea>
                        </div>
                        <div>
                            <x-primary-button>
                                {{ __('Save Settings') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
