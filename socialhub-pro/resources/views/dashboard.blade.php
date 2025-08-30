<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (Auth::user()->role === 'admin')
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold">Admin Panel</h3>
                    <a href="{{ route('admin.users.index') }}" class="text-indigo-500 hover:underline">Manage Users</a>
                </div>
            </div>
            <div class="mt-8"></div>
            @endif
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    Welcome to your SocialHub Pro dashboard!
                </div>
            </div>

            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold">Connected Accounts</h3>
                    <ul class="mt-4">
                        @forelse (Auth::user()->socialAccounts as $account)
                            <li class="flex items-center justify-between py-2 border-b">
                                <span>{{ ucfirst($account->provider_name) }}</span>
                                {{-- <x-danger-button>Disconnect</x-danger-button> --}}
                            </li>
                        @empty
                            <li>You have not connected any social media accounts yet.</li>
                        @endforelse
                    </ul>
                </div>
            </div>

            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold">AI Content Assistant</h3>
                    <div class="mt-4">
                        <x-input-label for="ai_topic" :value="__('Topic')" />
                        <x-text-input id="ai_topic" type="text" class="block mt-1 w-full" placeholder="e.g., The future of space travel" />
                        <x-primary-button id="generate_ai_content" class="mt-2">
                            {{ __('Generate with AI') }}
                        </x-primary-button>
                    </div>
                </div>
            </div>

            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold">Schedule a New Post</h3>
                    <form action="{{ route('posts.store') }}" method="POST" class="mt-4 space-y-4">
                        @csrf
                        <div>
                            <x-input-label for="content" :value="__('Post Content')" />
                            <textarea id="content" name="content" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" required></textarea>
                        </div>

                        <div>
                            <x-input-label for="social_account_id" :value="__('Post to Account')" />
                            <select id="social_account_id" name="social_account_id" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" required>
                                @foreach (Auth::user()->socialAccounts as $account)
                                    <option value="{{ $account->id }}">{{ ucfirst($account->provider_name) }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <x-input-label for="scheduled_at" :value="__('Schedule for')" />
                            <x-text-input id="scheduled_at" name="scheduled_at" type="datetime-local" class="block mt-1 w-full" required />
                        </div>

                        <div>
                            <x-primary-button>
                                {{ __('Schedule Post') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
    document.getElementById('generate_ai_content').addEventListener('click', function() {
        const topic = document.getElementById('ai_topic').value;
        const button = this;
        button.disabled = true;
        button.textContent = 'Generating...';

        axios.post('/api/ai/generate', { topic: topic })
            .then(function(response) {
                document.getElementById('content').value = response.data.content;
                button.disabled = false;
                button.textContent = 'Generate with AI';
            })
            .catch(function(error) {
                console.error(error);
                alert('Failed to generate AI content. Please check the console for details.');
                button.disabled = false;
                button.textContent = 'Generate with AI';
            });
    });
    </script>
    @endpush
</x-app-layout>
