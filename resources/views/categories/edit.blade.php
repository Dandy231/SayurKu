<x-app-layout title="Edit Kategori">
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            <a href="/dashboard/products">{!! __('Category &raquo; Edit') !!}</a>
        </h2>

        <!-- General elements -->
        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            Edit Kategori
        </h4>
        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            @if ($errors->any())
            <div class="mb-5" role="alert">
                <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                    There's something wrong!
                </div>
                <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                    <p>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    </p>
                </div>
            </div>
            @endif
            <form class="w-full" action="{{ route('categories.update',$item->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <label class="block text-sm mb-4">
                    <span class="text-gray-700 dark:text-gray-400">Nama Kategori</span>
                    <input value="{{ old('name') ?? $item->name }}" type="text" name="name" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Nama Kategori" />
                </label>

                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">
                        Gambar Kategori
                    </span>
                    <div class="relative text-gray-500 focus-within:text-purple-600">
                        <input name="iconPath" type="file" class="block w-full pr-20 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder="Gambar Kategori" />
                    </div>
                </label>
                <div class="flex flex-wrap -mx-3 mt-10 mb-6">
                    <div class="w-full px-3 text-right">
                        <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded">
                            Simpan Kategori
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <!-- Inputs with buttons -->
    </div>
</x-app-layout>