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
                    <div class="border border-black">
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
                <div class="flex justify-between items-center mt-6">
                    <p class="text-2xl font-extrabold mb-3">Menu</p>
                    <a href={{ '/tenant/'.$tenant->id.'/menu/create' }} class="text-white bg-gray-950 border-0 py-2 px-8 focus:outline-none hover:bg-gray-900 rounded text-base">Tambah Menu</a>
                </div>
                {{-- Menu's card --}}
                <div>
                    <section class="text-gray-600 body-font">
                        <div class="container mt-3 mx-auto">
                          <div class="flex flex-wrap -m-4">
                            <div class="p-4 md:w-1/3">
                              <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                                <img class="lg:h-48 md:h-36 w-full object-cover object-center" src="https://dummyimage.com/720x400" alt="blog">
                                <div class="p-6">
                                  <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">CATEGORY</h2>
                                  <h1 class="title-font text-lg font-medium text-gray-900 mb-3">The Catalyzer</h1>
                                  <p class="leading-relaxed mb-3">Photo booth fam kinfolk cold-pressed sriracha leggings jianbing microdosing tousled waistcoat.</p>
                                  <div class="flex items-center flex-wrap ">
                                    <a class="text-indigo-500 inline-flex items-center md:mb-2 lg:mb-0">Learn More
                                      <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M5 12h14"></path>
                                        <path d="M12 5l7 7-7 7"></path>
                                      </svg>
                                    </a>
                                    <span class="text-gray-400 mr-3 inline-flex items-center lg:ml-auto md:ml-0 ml-auto leading-none text-sm pr-3 py-1 border-r-2 border-gray-200">
                                      <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                      </svg>1.2K
                                    </span>
                                    <span class="text-gray-400 inline-flex items-center leading-none text-sm">
                                      <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                        <path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"></path>
                                      </svg>6
                                    </span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
