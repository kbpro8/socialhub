<x-guest-layout>
    <div class="p-6 text-center">
        <h1 class="text-2xl font-semibold text-gray-900 dark:text-white">
            Welcome to SocialHub Pro
        </h1>

        <p class="mt-4 text-gray-600 dark:text-gray-400">
            Your AI-Powered Social Media Management & Scheduling SaaS.
        </p>

        <div class="mt-8 flex items-center justify-center space-x-4">
            <a href="{{ route('login') }}" class="px-4 py-2 bg-gray-800 text-white rounded-md">
                Log in
            </a>
            <a href="{{ route('register') }}" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md">
                Register
            </a>
        </div>
    </div>
</x-guest-layout>
