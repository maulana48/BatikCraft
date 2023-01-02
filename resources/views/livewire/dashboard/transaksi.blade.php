<div class="max-w-full bg-[#111827]" x-data="{
    transaksi: {{ json_encode($transaksi) }}
}">
    <!-- component -->
    <!-- This is an example component -->
    <div class="min-w-full p-5">
        <div class="text-center">
            <div class="d-flex my-4">
                <h1 class="text-center text-green-300 text-[30px] font-bold">Daftar Transaksi</h1>
            </div>
        </div>
        @if (session()->has('success'))
            <script>
                alert('{{ session('success') }}');
            </script>
        @endif
    </div>
    <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-700">
        <thead class="bg-gray-100 dark:bg-gray-700">
            <tr>
                <th scope="col" class="p-4">
                    <div class="flex items-center">
                        <input id="checkbox-all" type="checkbox"
                            class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-all" class="sr-only">checkbox</label>
                    </div>
                </th>
                <th scope="col"
                    class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                    Total Transaksi
                </th>
                <th scope="col"
                    class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                    Metode Pengiriman
                </th>
                <th scope="col"
                    class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                    Alamat Pengiriman
                </th>
                <th scope="col"
                    class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                    Estimasi Waktu
                </th>
                <th scope="col" class="p-4">Detail
                </th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
            <template x-for="(t, index) in transaksi">
                <tr class="hover:bg-gray-200 dark:hover:bg-gray-700">
                    <td class="p-4 w-4">
                        <div class="flex items-center">
                            <input id="checkbox-table-1" type="checkbox"
                                class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox-table-1" class="sr-only">checkbox</label>
                        </div>
                    </td>
                    <td x-text="t.total_harga" class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white"></td>
                    <td x-text="t.metode_pengiriman" class="py-4 px-6 text-sm font-medium text-gray-500 whitespace-nowrap dark:text-white"></td>
                    <td x-text="t.alamat_pengiriman" class="py-4 px-6 text-sm font-medium text-gray-500 whitespace-nowrap dark:text-white"></td>
                    <td x-text="t.estimasi_waktu" class="py-4 px-6 text-sm font-medium text-gray-500 whitespace-nowrap dark:text-white"></td>
                    {{-- <td x-text="t." class="py-6 px-8 text-sm font-medium text-gray-500 whitespace-nowrap dark:text-white">
                        <img src="{{ asset($t->media) }}" alt="kosong">
                    </td> --}}
                    <td class="mt-5 py-4 px-6 text-sm font-medium text-right whitespace-nowrap">
                        <div class="flex flex-col gap-2 items-center justify-center">
                            <button x-on:click="$wire.detail(t.id)"
                                class="text-blue-600 dark:text-blue-500 hover:underline">Detail</button>
                        </div>
                    </td>
                </tr>
            </template>
        </tbody>
    </table>
</div>