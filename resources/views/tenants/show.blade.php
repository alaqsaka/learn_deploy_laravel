<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <p class="text-2xl font-extrabold mb-3">Detail Tenant: ID {{ $tenant->id}}</p>
                <div class="grid grid-cols-3">
                    <div class="">
                        <img
                            class="hidden mr-6 md:block h-w-96 w-96"
                            src="{{ asset('storage/'. $tenant->imageUrl) }}"
                        />
                    </div>
                    <div class="col-span-2 px-2 flex flex-col justify-between">
                        <p class="text-base font-semibold">Nama Tenant: {{ $tenant->name }}</p>
                        <p class="text-base font-semibold">Nama Pemilik Tenant: {{ $tenant->owner }}</p>
                        <p class="text-base font-semibold">Deskripsi: {{ $tenant->description }}</p>
                        <p class="text-base font-semibold">Dibuat pada: {{ $tenant->created_at }}</p>
                        <p class="text-base font-semibold">Terakhir diperbarui pada: {{ $tenant->updated_at }}</p>
                       <div>
                        <a href={{ '/dashboard'}} class="text-white bg-gray-950 border-0 py-2 px-8 focus:outline-none hover:bg-gray-900 rounded text-base">Back</a>
                        <a href={{ '/tenant/edit/'.$tenant->id }} class="text-white bg-yellow-400 border-0 py-2 px-8 focus:outline-none hover:bg-yellow-500 rounded text-base">Edit</a>
                        <a href={{ '/tenant/delete/'.$tenant->id }} class="text-white bg-red-400 border-0 py-2 px-8 focus:outline-none hover:bg-red-500 rounded text-base">Hapus</a>
                       </div>
                    </div>
                </div>
                @if (session()->has('message'))
                <div class="mt-6 bg-green-100 border border-green-400 mb-5 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Mantap!</strong>
                    <span class="block sm:inline">    {{ session('message') }}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                      <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                    </span>
                  </div>
                <div>
                @endif
                <div class="flex justify-between items-center mt-6">
                    <p class="text-2xl font-extrabold mb-3">Menu</p>
                    <a href={{ '/tenant/'.$tenant->id.'/menu/create' }} class="text-white bg-gray-950 border-0 py-2 px-8 focus:outline-none hover:bg-gray-900 rounded text-base">Tambah Menu</a>
                </div>
                {{-- Menu's card --}}
               @unless (count($menus) === 0)
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-5">
                        @foreach ($menus as $menu)
                            <div>
                                <section class="text-gray-600 body-font">
                                    <div class="container mt-3 mx-auto">
                                    <div class="-m-4">
                                        <div class="p-4">
                                        <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                                            <img class="lg:h-48 md:h-36 w-full object-cover object-center" src="{{asset('storage/'.$menu->imageUrl)}}" alt="blog">
                                            <div class="p-6">
                                            {{-- <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">CATEGORY</h2> --}}
                                            <h1 class="title-font text-lg font-medium text-gray-900 mb-3">{{ $menu->name }}</h1>
                                            <p class="leading-relaxed mb-3">Deskripsi: <span class="font-semibold">{{ $menu->description }}</span></p>
                                            <p class="leading-relaxed mb-3">Harga: Rp. <span class="font-semibold">{{ $menu->price }}</span></p>
                                            <div class="flex items-center flex-wrap ">
                                                <a href="{{'/menu/'.$menu->id . '/edit'}}" class="text-indigo-500 inline-flex items-center md:mb-2 lg:mb-0">Edit
                                                <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M5 12h14"></path>
                                                    <path d="M12 5l7 7-7 7"></path>
                                                </svg>
                                                </a>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                </section>
                            </div>
                        @endforeach
                    </div>
               @endunless
            </div>
        </div>
    </div>
</x-app-layout>
