<x-user-layout title="Transaksi">
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            {{ __('Transactions') }}
        </h2>
        <!-- With actions -->
        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            Daftar Transaksi
        </h4>
        <h3 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            <a href="{{route('transaksi.create')}}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                + Tambah Transaksi
            </a>
        </h3>
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Order ID</th>
                            <th class="px-4 py-3">Produk</th>
                            <th class="px-4 py-3">Quantity</th>
                            <th class="px-4 py-3">Total</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Bukti Transfer</th>
                            <th class="px-4 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @forelse ($transaction as $item)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3 text-sm">
                                {{$item->id}}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{$item->product->title}}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{$item->quantity}}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{"Rp $item->total"}}
                            </td>
                            @if($item->status == "PENDING")
                            <td class="px-4 py-3 text-xs">
                                <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100">
                                    {{$item->status}}
                                </span>
                            </td>
                            @else
                            <td class="px-4 py-3 text-xs">
                                <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                    {{$item->status}}
                                </span>
                            </td>
                            @endif
                            @if($item->picturePayment == "/storage/")
                            <td class="px-4 py-3 text-xs">
                                <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100">
                                    Belum Upload Bukti Transfer
                                </span>
                            </td>
                            @else
                            <td class="px-4 py-3 text-sm">
                                <div class="flex items-center text-sm">
                                    <!-- Avatar with inset shadow -->
                                    <div class="relative hidden w-24 h-24 mr-3 md:block">
                                        <a href="{{$item->picturePayment}}" target="_blank">
                                            <img class="object-cover w-full h-full" src="{{$item->picturePayment}}" alt="" loading="lazy" />
                                            <div class="absolute inset-0 shadow-inner" aria-hidden="true"></div>
                                        </a>
                                    </div>
                                </div>
                            </td>
                            @endif
                            <td class="px-4 py-3">
                                <div class="flex items-center space-x-4 text-sm">
                                    <a href="{{ route('transaksi.edit', $item->id) }}">
                                        <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                </path>
                                            </svg>
                                            Edit
                                        </button>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="border text-center text-red-500 p-5">
                                Data Tidak Ditemukan
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                <span class="flex items-center col-span-3">
                    {{ $transaction->links('pagination::semantic-ui') }}
                </span>
                <span class="col-span-2"></span>
                <!-- Pagination -->
                <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                    <nav aria-label="Table navigation">
                        <ul class="inline-flex items-center">
                            {{ $transaction->links('vendor.pagination.simple-tailwind') }}
                        </ul>
                    </nav>
                </span>
            </div>
        </div>
    </div>
</x-user-layout>