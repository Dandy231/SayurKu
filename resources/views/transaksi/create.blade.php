<x-user-layout title="Beli Produk">
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            <a href="/home/transaksi">{!! __('Beli &raquo; Produk') !!}</a>
        </h2>

        <!-- General elements -->
        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            Beli Produk
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
            <form class="w-full" action="{{ route('transaksi.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <label class="block text-sm mt-4">
                    <span class="text-gray-700 dark:text-gray-400">Nama User</span>
                    <p value="{{ $user->id }}" name="user_id" class="text-gray-700 dark:text-gray-400"> - {{$user->name}}</p>
                    <input value="{{ $user->id }}" type="hidden" name="user_id" class="text-gray-700 dark:text-gray-400"></input>
                </label>

                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">
                        Produk
                    </span>
                    <select name="product_id" id="product_id" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                        <option>Pilih Produk</option>
                        @foreach($products as $product)
                        <option value="{{$product->id}}">{{ $product->title }} | Rp {{ $product->price }} </option>
                        @endforeach
                    </select>
                </label>

                <label class="block text-sm mt-4">
                    <span class="text-gray-700 dark:text-gray-400">Jumlah Pesanan</span>
                    <input value="{{ old('quantity') }}" type="text" name="quantity" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Jumlah Pesanan" />
                </label>

                <label class="block text-sm mt-4">
                    <span class="text-gray-700 dark:text-gray-400">Total Harga (Harga * Jumlah Pesanan)</span>
                    <input value="{{ old('total') }}" type="text" name="total" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Total Harga" />
                </label>

                <input value="PENDING" type="hidden" name="status" id="status">

                <div class="flex flex-wrap -mx-3 mt-10 mb-6">
                    <div class="w-full px-3 text-right">
                        <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded">
                            Beli Produk
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <!-- Inputs with buttons -->
    </div>
</x-user-layout>