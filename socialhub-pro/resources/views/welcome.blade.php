@php
    $settings = \App\Models\Setting::pluck('value', 'key');
@endphp

<x-layouts.marketing>
    <!-- Hero Section -->
    <div class="relative bg-gray-800 text-white">
        <div class="absolute inset-0">
            {{-- Placeholder for a background image --}}
            <div class="absolute inset-0 bg-gray-900 opacity-75"></div>
        </div>
        <div class="relative max-w-7xl mx-auto py-24 px-4 sm:py-32 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl font-extrabold tracking-tight sm:text-5xl lg:text-6xl">{{ $settings['homepage_title'] ?? 'AI-Powered Social Media Management' }}</h1>
            <p class="mt-6 max-w-3xl mx-auto text-xl">{{ $settings['homepage_subtitle'] ?? 'Simplify your social media marketing. Automate tasks, schedule posts, and manage interactions all in one place.' }}</p>
            <div class="mt-10">
                <a href="{{ route('register') }}" class="px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">Get Started for Free</a>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-gray-900">All-in-One Social Media Toolkit</h2>
                <p class="mt-4 max-w-2xl mx-auto text-xl text-gray-500">Everything you need to level-up your social media presence.</p>
            </div>
            <div class="mt-12 grid gap-8 md:grid-cols-3">
                <div class="p-6 bg-gray-50 rounded-lg text-center">
                    {{-- Brain Icon SVG Placeholder --}}
                    <h3 class="mt-4 text-lg font-medium text-gray-900">AI-Generated Content</h3>
                    <p class="mt-2 text-base text-gray-500">Receive recommendations for images and videos tailored to your brand.</p>
                </div>
                <div class="p-6 bg-gray-50 rounded-lg text-center">
                    {{-- Calendar Icon SVG Placeholder --}}
                    <h3 class="mt-4 text-lg font-medium text-gray-900">Smart Post Scheduling</h3>
                    <p class="mt-2 text-base text-gray-500">Easily plan and schedule posts using an intuitive calendar interface.</p>
                </div>
                <div class="p-6 bg-gray-50 rounded-lg text-center">
                    {{-- Users Icon SVG Placeholder --}}
                    <h3 class="mt-4 text-lg font-medium text-gray-900">Team Collaboration</h3>
                    <p class="mt-2 text-base text-gray-500">Assign roles and use approval workflows to facilitate teamwork.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Pricing Section -->
    <div class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-gray-900">Choose the plan that's right for you</h2>
                <p class="mt-4 max-w-2xl mx-auto text-xl text-gray-500">Simple, transparent pricing.</p>
            </div>
            <div class="mt-12 grid gap-8 md:grid-cols-3">
                @foreach (config('plans') as $plan)
                    <div class="border p-8 rounded-lg bg-white shadow-md">
                        <h4 class="text-2xl font-bold text-gray-900">{{ $plan['name'] }}</h4>
                        <ul class="mt-6 space-y-4">
                            @foreach ($plan['features'] as $feature)
                                <li class="flex items-center">
                                    <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                    <span class="ml-3 text-gray-600">{{ $feature }}</span>
                                </li>
                            @endforeach
                        </ul>
                        <a href="{{ route('register') }}" class="mt-8 block w-full bg-indigo-600 border border-transparent rounded-md py-2 text-sm font-semibold text-white text-center hover:bg-indigo-700">Get Started</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Testimonials Section -->
    <div class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-gray-900">What our customers are saying</h2>
            </div>
            <div class="mt-12 grid gap-8 md:grid-cols-3">
                <div class="p-6 bg-gray-50 rounded-lg text-center">
                    <img class="h-20 w-20 rounded-full mx-auto" src="https://images.unsplash.com/photo-1554151228-14d9def656e4?q=80&w=250" alt="User avatar">
                    <p class="mt-4 text-base text-gray-500">"This is the best social media tool I've ever used. It has saved me so much time!"</p>
                    <p class="mt-4 text-lg font-medium text-gray-900">- Sarah J.</p>
                </div>
                <div class="p-6 bg-gray-50 rounded-lg text-center">
                    <img class="h-20 w-20 rounded-full mx-auto" src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?q=80&w=250" alt="User avatar">
                    <p class="mt-4 text-base text-gray-500">"I love the AI content generation feature. It's like having a marketing assistant on demand."</p>
                    <p class="mt-4 text-lg font-medium text-gray-900">- Michael B.</p>
                </div>
                <div class="p-6 bg-gray-50 rounded-lg text-center">
                    <img class="h-20 w-20 rounded-full mx-auto" src="https://images.unsplash.com/photo-1542345821-543119428d82?q=80&w=250" alt="User avatar">
                    <p class="mt-4 text-base text-gray-500">"The team collaboration features are a game-changer for our agency."</p>
                    <p class="mt-4 text-lg font-medium text-gray-900">- Emily R.</p>
                </div>
            </div>
        </div>
    </div>

</x-layouts.marketing>
