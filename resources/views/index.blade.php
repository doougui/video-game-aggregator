@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h2 class="text-blue-400 uppercase tracking-wide font-semibold">Popular Games</h2>

        <div class="popular-games text-sm grid grid-cols-6 gap-12 border-b border-gray-800 pb-16">
            <div class="game mt-8">
                <div class="relative inline-block">
                    <a href="#">
                        <img src="{{ asset('/img/ff7.jpg') }}" alt="Game cover" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>

                    <div class="absolute -bottom-5 -right-5 w-16 h-16 bg-gray-800 rounded-full">
                        <div class="font-semibold text-xs flex justify-center items-center h-full">80%</div>
                    </div>
                </div>

                <a href="#"
                   class="block text-base font-semibold leading-tight hover:text-gray-400 mt-8"
                >
                    Final Fantasy 7 Remake
                </a>
                <div class="text-gray-400 mt-1">PlayStation 4</div>
            </div>

            <div class="game mt-8">
                <div class="relative inline-block">
                    <a href="#">
                        <img src="{{ asset('/img/ff7.jpg') }}" alt="Game cover" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>

                    <div class="absolute -bottom-5 -right-5 w-16 h-16 bg-gray-800 rounded-full">
                        <div class="font-semibold text-xs flex justify-center items-center h-full">80%</div>
                    </div>
                </div>

                <a href="#"
                   class="block text-base font-semibold leading-tight hover:text-gray-400 mt-8"
                >
                    Final Fantasy 7 Remake
                </a>
                <div class="text-gray-400 mt-1">PlayStation 4</div>
            </div>

            <div class="game mt-8">
                <div class="relative inline-block">
                    <a href="#">
                        <img src="{{ asset('/img/ff7.jpg') }}" alt="Game cover" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>

                    <div class="absolute -bottom-5 -right-5 w-16 h-16 bg-gray-800 rounded-full">
                        <div class="font-semibold text-xs flex justify-center items-center h-full">80%</div>
                    </div>
                </div>

                <a href="#"
                   class="block text-base font-semibold leading-tight hover:text-gray-400 mt-8"
                >
                    Final Fantasy 7 Remake
                </a>
                <div class="text-gray-400 mt-1">PlayStation 4</div>
            </div>

            <div class="game mt-8">
                <div class="relative inline-block">
                    <a href="#">
                        <img src="{{ asset('/img/ff7.jpg') }}" alt="Game cover" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>

                    <div class="absolute -bottom-5 -right-5 w-16 h-16 bg-gray-800 rounded-full">
                        <div class="font-semibold text-xs flex justify-center items-center h-full">80%</div>
                    </div>
                </div>

                <a href="#"
                   class="block text-base font-semibold leading-tight hover:text-gray-400 mt-8"
                >
                    Final Fantasy 7 Remake
                </a>
                <div class="text-gray-400 mt-1">PlayStation 4</div>
            </div>

            <div class="game mt-8">
                <div class="relative inline-block">
                    <a href="#">
                        <img src="{{ asset('/img/ff7.jpg') }}" alt="Game cover" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>

                    <div class="absolute -bottom-5 -right-5 w-16 h-16 bg-gray-800 rounded-full">
                        <div class="font-semibold text-xs flex justify-center items-center h-full">80%</div>
                    </div>
                </div>

                <a href="#"
                   class="block text-base font-semibold leading-tight hover:text-gray-400 mt-8"
                >
                    Final Fantasy 7 Remake
                </a>
                <div class="text-gray-400 mt-1">PlayStation 4</div>
            </div>

            <div class="game mt-8">
                <div class="relative inline-block">
                    <a href="#">
                        <img src="{{ asset('/img/ff7.jpg') }}" alt="Game cover" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>

                    <div class="absolute -bottom-5 -right-5 w-16 h-16 bg-gray-800 rounded-full">
                        <div class="font-semibold text-xs flex justify-center items-center h-full">80%</div>
                    </div>
                </div>

                <a href="#"
                   class="block text-base font-semibold leading-tight hover:text-gray-400 mt-8"
                >
                    Final Fantasy 7 Remake
                </a>
                <div class="text-gray-400 mt-1">PlayStation 4</div>
            </div>

            <div class="game mt-8">
                <div class="relative inline-block">
                    <a href="#">
                        <img src="{{ asset('/img/ff7.jpg') }}" alt="Game cover" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>

                    <div class="absolute -bottom-5 -right-5 w-16 h-16 bg-gray-800 rounded-full">
                        <div class="font-semibold text-xs flex justify-center items-center h-full">80%</div>
                    </div>
                </div>

                <a href="#"
                   class="block text-base font-semibold leading-tight hover:text-gray-400 mt-8"
                >
                    Final Fantasy 7 Remake
                </a>
                <div class="text-gray-400 mt-1">PlayStation 4</div>
            </div>
        </div>

        <div class="flex my-10">
            <div class="recent-reviews w-3/4 mr-32">
                <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Recently Reviewed</h2>

                <div class="recently-reviewed-container space-y-12 mt-8">
                    <div class="game bg-gray-800 rounded-lg shadow-md flex px-6 py-6">
                        <div class="relative flex-none">
                            <a href="#">
                                <img src="{{ asset('/img/ff7.jpg') }}" alt="Game cover" class="w-48 hover:opacity-75 transition ease-in-out duration-150">
                            </a>

                            <div class="absolute -bottom-5 -right-5 w-16 h-16 bg-gray-900 rounded-full">
                                <div class="font-semibold text-xs flex justify-center items-center h-full">80%</div>
                            </div>
                        </div>

                        <div class="ml-12">
                            <a href="#"
                               class="block text-lg font-semibold leading-tight hover:text-gray-400 mt-4"
                            >
                                Final Fantasy 7 Remake
                            </a>
                            <div class="text-gray-400 mt-1">PlayStation 4</div>
                            <p class="mt-6 text-gray-400">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni, soluta, ullam. A ab cum dicta libero minus reprehenderit sapiente soluta vero! A adipisci aliquam assumenda doloribus ea eaque eius enim et eveniet facere facilis iste laudantium, molestias numquam officia quaerat quibusdam quisquam reiciendis repellat repellendus similique suscipit tempore vel vero.
                            </p>
                        </div>
                    </div>

                    <div class="game bg-gray-800 rounded-lg shadow-md flex px-6 py-6">
                        <div class="relative flex-none">
                            <a href="#">
                                <img src="{{ asset('/img/ff7.jpg') }}" alt="Game cover" class="w-48 hover:opacity-75 transition ease-in-out duration-150">
                            </a>

                            <div class="absolute -bottom-5 -right-5 w-16 h-16 bg-gray-900 rounded-full">
                                <div class="font-semibold text-xs flex justify-center items-center h-full">80%</div>
                            </div>
                        </div>

                        <div class="ml-12">
                            <a href="#"
                               class="block text-lg font-semibold leading-tight hover:text-gray-400 mt-4"
                            >
                                Final Fantasy 7 Remake
                            </a>
                            <div class="text-gray-400 mt-1">PlayStation 4</div>
                            <p class="mt-6 text-gray-400">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni, soluta, ullam. A ab cum dicta libero minus reprehenderit sapiente soluta vero! A adipisci aliquam assumenda doloribus ea eaque eius enim et eveniet facere facilis iste laudantium, molestias numquam officia quaerat quibusdam quisquam reiciendis repellat repellendus similique suscipit tempore vel vero.
                            </p>
                        </div>
                    </div>

                    <div class="game bg-gray-800 rounded-lg shadow-md flex px-6 py-6">
                        <div class="relative flex-none">
                            <a href="#">
                                <img src="{{ asset('/img/ff7.jpg') }}" alt="Game cover" class="w-48 hover:opacity-75 transition ease-in-out duration-150">
                            </a>

                            <div class="absolute -bottom-5 -right-5 w-16 h-16 bg-gray-900 rounded-full">
                                <div class="font-semibold text-xs flex justify-center items-center h-full">80%</div>
                            </div>
                        </div>

                        <div class="ml-12">
                            <a href="#"
                               class="block text-lg font-semibold leading-tight hover:text-gray-400 mt-4"
                            >
                                Final Fantasy 7 Remake
                            </a>
                            <div class="text-gray-400 mt-1">PlayStation 4</div>
                            <p class="mt-6 text-gray-400">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni, soluta, ullam. A ab cum dicta libero minus reprehenderit sapiente soluta vero! A adipisci aliquam assumenda doloribus ea eaque eius enim et eveniet facere facilis iste laudantium, molestias numquam officia quaerat quibusdam quisquam reiciendis repellat repellendus similique suscipit tempore vel vero.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="most-anticipated w-1/4">
                <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Most Anticipated</h2>

                <div class="most-anticipated-container space-y-10 mt-8">
                    <div class="game flex">
                        <a href="#">
                            <img src="{{ asset('/img/cyberpunk.jpg') }}" alt="Game cover" class="w-16 hover:opacity-75 transition ease-in-out duration-150">
                        </a>

                        <div class="ml-4">
                            <a href="#" class="hover:text-gray-300">Cyberpunk 2077</a>
                            <div class="text-gray-400 text-sm mt-1">Sept 16, 2020</div>
                        </div>
                    </div>

                    <div class="game flex">
                        <a href="#">
                            <img src="{{ asset('/img/cyberpunk.jpg') }}" alt="Game cover" class="w-16 hover:opacity-75 transition ease-in-out duration-150">
                        </a>

                        <div class="ml-4">
                            <a href="#" class="hover:text-gray-300">Cyberpunk 2077</a>
                            <div class="text-gray-400 text-sm mt-1">Sept 16, 2020</div>
                        </div>
                    </div>

                    <div class="game flex">
                        <a href="#">
                            <img src="{{ asset('/img/cyberpunk.jpg') }}" alt="Game cover" class="w-16 hover:opacity-75 transition ease-in-out duration-150">
                        </a>

                        <div class="ml-4">
                            <a href="#" class="hover:text-gray-300">Cyberpunk 2077</a>
                            <div class="text-gray-400 text-sm mt-1">Sept 16, 2020</div>
                        </div>
                    </div>

                    <div class="game flex">
                        <a href="#">
                            <img src="{{ asset('/img/cyberpunk.jpg') }}" alt="Game cover" class="w-16 hover:opacity-75 transition ease-in-out duration-150">
                        </a>

                        <div class="ml-4">
                            <a href="#" class="hover:text-gray-300">Cyberpunk 2077</a>
                            <div class="text-gray-400 text-sm mt-1">Sept 16, 2020</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
