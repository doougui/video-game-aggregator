<x-app-layout>
    <div class="app-container">
        <livewire:popular-games />

        <div class="flex flex-col lg:flex-row my-10">
            <livewire:recently-published />

            <div class="lg:w-1/4 mt-12 lg:mt-0">
                <livewire:most-anticipated />

                <livewire:coming-soon />
            </div>
        </div>
    </div>
</x-app-layout>
