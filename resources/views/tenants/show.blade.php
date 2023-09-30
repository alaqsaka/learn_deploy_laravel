<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <p class="text-lg font-bold mb-3">Detail Tenant: ID {{ $tenant->id}}</p>
                <div class="grid grid-cols-3">
                    <div class="border border-black">
                        <img
                            class="hidden mr-6 md:block h-w-96 w-96"
                            src="{{ asset('storage/'. $tenant->imageUrl) }}"
                        />
                    </div>
                    <div class="col-span-2 px-2 flex flex-col justify-between">
                        <p class="text-lg font-semibold">Nama Tenant: {{ $tenant->name }}</p>
                        <p class="text-lg font-semibold">Nama Pemilik Tenant: {{ $tenant->owner }}</p>
                        <p class="text-lg font-semibold">Deskripsi: {{ $tenant->description }}</p>
                        <p class="text-lg font-semibold">Dibuat pada: {{ $tenant->created_at }}</p>
                        <p class="text-lg font-semibold">Terakhir diperbarui pada: {{ $tenant->updated_at }}</p>
                       <div>
                        <a href={{ '/dashboard'}} class="text-white bg-gray-950 border-0 py-2 px-8 focus:outline-none hover:bg-gray-900 rounded text-base">Back</a>
                        <a href={{ '/tenant/edit/'.$tenant->id }} class="text-white bg-yellow-400 border-0 py-2 px-8 focus:outline-none hover:bg-yellow-500 rounded text-base">Edit</a>
                        <a href={{ '/tenant/delete/'.$tenant->id }} class="text-white bg-red-400 border-0 py-2 px-8 focus:outline-none hover:bg-red-500 rounded text-base">Hapus</a>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
