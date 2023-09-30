<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class=" text-gray-900">
                    {{ __("Selamat Datang!") }}


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

                <div class="mt-5 mb-5">
                    <a href="/tenant/create" class="text-white bg-gray-950 border-0 py-2 px-8 focus:outline-none hover:bg-gray-900 rounded text-lg">Tambah Tenant</a>
                </div>

                <div class="mt-5">
                    <p class="text-xl font-bold mb-3">Daftar Tenants Tersedia:</p>
                    {{-- Table --}}
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-base text-gray-700 bg-gray-100 border border-black">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Id
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Nama Tenant
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Pemilik
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Deskripsi
                                    </th>
                                    <th>
                                        Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="border border-black">
                                @unless (count($tenants) ==0)
                                    @foreach ($tenants as $tenant)
                                        <tr class="">
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                                {{ $tenant->id }}
                                            </th>
                                            <td class="px-6 py-4 font-medium">
                                                {{ $tenant->name }}
                                            </td>
                                            <td class="px-6 py-4 font-medium">
                                                {{ $tenant->owner }}
                                            </td>
                                            <td class="px-6 py-4 font-medium">
                                                <img
                                                    class="hidden w-10 mr-6 md:block"
                                                    src="{{ asset('storage/'. $tenant->imageUrl) }}"
                                                />
                                            </td>
                                            <td class="px-6 py-4 font-medium">
                                                Action Buttons here
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>Tenant tidak tersedia</tr>
                                @endunless
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
