<x-app-layout>
    <div class="w-2/4 container mx-auto my-5 px-4">
        <livewire:choose-nickname :isSigningUp="(url()->previous() === route('register')) ? true : false" />
    </div>
</x-app-layout>
