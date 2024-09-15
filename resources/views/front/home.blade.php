<x-app-layout>

    <x-slot:header>
        <x-front.navbar />
    </x-slot:header>

    <section class="container">
        <div class="px-4 py-6 md:px-16">
            <div class="flex flex-col justify-between lg:items-center gap-y-3 md:flex-row">
                <h5 class="text-xl font-extrabold">Featured Projects</h5>

                <form class="w-full lg:w-1/3">
                    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 flex items-center pointer-events-none start-0 ps-3">
                            <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="search" id="default-search"
                            class="block w-full p-3 font-semibold text-gray-900 transition-all duration-200 ease-in-out border-transparent rounded-3xl ps-10 bg-gray-50 focus:ring-primary focus:border-primary"
                            placeholder="Search your jobs..." required />

                    </div>
                </form>
            </div>

            <div class="grid grid-cols-12 gap-4 mt-5">
                <div class="col-span-12 lg:col-span-3">
                    <a href="#">
                        <div
                            class="p-5 transition-all duration-300 ease-in-out bg-white border-2 border-transparent rounded-3xl hover:border-primary">
                            <img src="{{ asset('img/thumbnails/thumbnail-1.png') }}" alt=""
                                class="object-cover w-full h-36 aspect-video rounded-3xl">

                            <h4 class="my-4 text-lg font-bold">Education Ecommerce Website Development</h4>

                            <table class="text-sm">
                                <tr>
                                    <td class="pr-2">
                                        <svg class="w-6 h-6 p-1 text-white rounded-full bg-primary " aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                                d="M8 7V6a1 1 0 0 1 1-1h11a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1h-1M3 18v-7a1 1 0 0 1 1-1h11a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1Zm8-3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                                        </svg>

                                    </td>

                                    <td class="font-bold">
                                        Rp 17.928.887
                                    </td>
                                </tr>

                                <tr>
                                    <td class="pt-2 pr-2">
                                        <svg class="w-6 h-6 text-green-500" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd"
                                                d="M12 2c-.791 0-1.55.314-2.11.874l-.893.893a.985.985 0 0 1-.696.288H7.04A2.984 2.984 0 0 0 4.055 7.04v1.262a.986.986 0 0 1-.288.696l-.893.893a2.984 2.984 0 0 0 0 4.22l.893.893a.985.985 0 0 1 .288.696v1.262a2.984 2.984 0 0 0 2.984 2.984h1.262c.261 0 .512.104.696.288l.893.893a2.984 2.984 0 0 0 4.22 0l.893-.893a.985.985 0 0 1 .696-.288h1.262a2.984 2.984 0 0 0 2.984-2.984V15.7c0-.261.104-.512.288-.696l.893-.893a2.984 2.984 0 0 0 0-4.22l-.893-.893a.985.985 0 0 1-.288-.696V7.04a2.984 2.984 0 0 0-2.984-2.984h-1.262a.985.985 0 0 1-.696-.288l-.893-.893A2.984 2.984 0 0 0 12 2Zm3.683 7.73a1 1 0 1 0-1.414-1.413l-4.253 4.253-1.277-1.277a1 1 0 0 0-1.415 1.414l1.985 1.984a1 1 0 0 0 1.414 0l4.96-4.96Z"
                                                clip-rule="evenodd" />
                                        </svg>

                                    </td>

                                    <td class="pt-2 font-bold">
                                        Payment Verified
                                    </td>
                                </tr>

                                <tr>
                                    <td class="pt-2 pr-2">
                                        <svg class="w-6 h-6 text-amber-600" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M12 18.5A2.493 2.493 0 0 1 7.51 20H7.5a2.468 2.468 0 0 1-2.4-3.154 2.98 2.98 0 0 1-.85-5.274 2.468 2.468 0 0 1 .92-3.182 2.477 2.477 0 0 1 1.876-3.344 2.5 2.5 0 0 1 3.41-1.856A2.5 2.5 0 0 1 12 5.5m0 13v-13m0 13a2.493 2.493 0 0 0 4.49 1.5h.01a2.468 2.468 0 0 0 2.403-3.154 2.98 2.98 0 0 0 .847-5.274 2.468 2.468 0 0 0-.921-3.182 2.477 2.477 0 0 0-1.875-3.344A2.5 2.5 0 0 0 14.5 3 2.5 2.5 0 0 0 12 5.5m-8 5a2.5 2.5 0 0 1 3.48-2.3m-.28 8.551a3 3 0 0 1-2.953-5.185M20 10.5a2.5 2.5 0 0 0-3.481-2.3m.28 8.551a3 3 0 0 0 2.954-5.185" />
                                        </svg>



                                    </td>

                                    <td class="pt-2 font-bold">
                                        Intermediate
                                    </td>
                                </tr>
                            </table>

                        </div>
                    </a>
                </div>


            </div>
        </div>
    </section>

</x-app-layout>
