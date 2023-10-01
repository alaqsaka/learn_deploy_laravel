<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <p class="text-lg font-bold mb-3">Tambah menu untuk Tenant: {{ $tenant->name }} </p>

               <form method="POST" action="/menu" enctype="multipart/form-data">
                @csrf
                <div class="mb-3 flex-col gap-5 hidden">
                    <label class="text-lg font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">Tenant ID</label>
                    <input type="number" name="tenant_id" value={{ $tenant->id}} class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-lg ring-offset-background file:border-0 file:bg-transparent file:text-lg file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"/>
                    @error('tenant_id')
                    <p class="text-red-500 text-xs-mt-1">{{ $message }}</p>
                    @enderror
                </div>

               <div class="mb-3 flex flex-col gap-5">
                <label class="text-lg font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">Nama Menu</label>
                <input name="name" class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-lg ring-offset-background file:border-0 file:bg-transparent file:text-lg file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"/>
                @error('name')
                <p class="text-red-500 text-xs-mt-1">{{ $message }}</p>
                @enderror
               </div>

               <div class="mb-3 flex flex-col gap-5">
                <label class="text-lg font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">Harga Menu</label>
                <input name="price" type="number" class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-lg ring-offset-background file:border-0 file:bg-transparent file:text-lg file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"/>
                @error('price')
                <p class="text-red-500 text-xs-mt-1">{{ $message }}</p>
            @enderror
               </div>

               <div class="mb-3 flex flex-col gap-5">
                <label class="text-lg font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">Deskripsi Menu</label>
                <textarea name="description" class="flex min-h-[80px] w-full rounded-md border border-input bg-background px-3 py-2 text-lg ring-offset-background placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50">

                </textarea>
                @error('description')
                    <p class="text-red-500 text-xs-mt-1">{{ $message }}</p>
                @enderror
               </div>

               <div class="mb-6">
                <label for="imageUrl" class="text-lg font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">
                    Foto Menu
                </label>
                <input
                    type="file"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="imageUrl"
                />

                @error('imageUrl')
                    <p class="text-red-500 text-xs-mt-1">{{ $message }}</p>
                @enderror
                </div>

                <div class="">
                    <button type="submit" class="text-white bg-gray-950 border-0 py-2 px-8 focus:outline-none hover:bg-gray-900 rounded text-lg">Simpan</button>
                </div>
               </form>
            </div>
        </div>
    </div>
</x-app-layout>
