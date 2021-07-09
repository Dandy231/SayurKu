<x-app-layout title="Edit Transaksi">
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            <a href="/dashboard/products">{!! __('Transaction &raquo; Edit') !!}</a>
        </h2>

        <!-- General elements -->
        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            Edit Transaksi
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
            <form class="w-full" action="{{ route('transactions.update',$item->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <select name="status" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                    <option>Pilih Status</option>
                    <option value="PENDING">PENDING</option>
                    <option value="BERHASIL DIBAYAR">BERHASIL DIBAYAR</option>
                </select>
                <div class="flex flex-wrap -mx-3 mt-10 mb-6">
                    <div class="w-full px-3 text-right">
                        <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded">
                            Simpan Transaksi
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <!-- Inputs with buttons -->
    </div>
</x-app-layout>