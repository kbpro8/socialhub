@props(['name' => 'cookie_consent'])

<div
    x-data="{
        shown: document.cookie.indexOf('{{ $name }}=') === -1,
        accept() {
            let date = new Date();
            date.setFullYear(date.getFullYear() + 1);
            document.cookie = '{{ $name }}=true; expires=' + date.toUTCString() + '; path=/';
            this.shown = false;
        }
    }"
    x-show="shown"
    x-transition
    class="fixed bottom-0 right-0 left-0 bg-gray-800 text-white p-4 flex items-center justify-between z-50"
    style="display: none;"
>
    <p class="mr-4">We use cookies to ensure you get the best experience on our website.</p>
    <button @click="accept()" class="px-4 py-2 bg-green-500 text-white rounded-md">
        Accept
    </button>
</div>
