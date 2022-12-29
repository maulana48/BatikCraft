<!-- component -->
<!-- This is an example component -->
<div class="max-w-full bg-gray-100">
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
                    Nama Produk
                </th>
                <th scope="col"
                    class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                    Harga
                </th>
                <th scope="col"
                    class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                    Foto Product
                </th>
                <th scope="col"
                    class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                    Stok
                </th>
                <th scope="col"
                    class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                    Kategori
                </th>
                <th scope="col"
                    class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                    Rating
                </th>
                <th scope="col" class="p-4">Edit
                </th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
            @foreach ($batik as $b)
                <tr class="hover:bg-gray-200 dark:hover:bg-gray-700">
                    <td class="p-4 w-4">
                        <div class="flex items-center">
                            <input id="checkbox-table-1" type="checkbox"
                                class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox-table-1" class="sr-only">checkbox</label>
                        </div>
                    </td>
                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $b->nama }}</td>
                    <td class="py-4 px-6 text-sm font-medium text-gray-500 whitespace-nowrap dark:text-white">
                        Rp.{{ $b->harga }}</td>
                    <td class="py-6 px-8 text-sm font-medium text-gray-500 whitespace-nowrap dark:text-white">
                        <img src="{{ asset($b->media) }}" alt="kosong">
                    </td>
                    <td class="py-4 px-6 text-sm font-medium text-gray-500 whitespace-nowrap dark:text-white">
                        {{ $b->stok }}</td>
                    <td class="py-4 px-6 text-sm font-medium text-gray-500 whitespace-nowrap dark:text-white">
                        {{ $b->kategoriproduct->nama }}</td>
                    <td class="py-4 px-6 text-sm font-medium text-gray-500 whitespace-nowrap dark:text-white">
                        @foreach ($b->reviewproduct as $r)
                            {{ $r->rating }}
                        @endforeach
                    </td>
                    <td class="mt-5 py-4 px-6 text-sm font-medium text-right whitespace-nowrap">
                        <div class="flex flex-col gap-2 items-center justify-center">
                            <button wire:click="edit({{ $b->id }})"
                                class="text-blue-600 dark:text-blue-500 hover:underline">Edit</button>
                            <button wire:click=""
                                class="text-red-600 dark:text-red-500 hover:underline">Delete</button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
