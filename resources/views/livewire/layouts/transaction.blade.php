<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    @livewire('component.breadcumb', [$pageName])

    <!-- wrapper -->
    <div class="container grid grid-cols-12 items-start gap-6 pt-4 pb-16">
        @livewire('component.sidebar', [
            'user' => $user,
        ])

        <!-- wishlist -->
        <div class="col-span-9 space-y-4">
            @if (count($order_list) != 0)
                @foreach ($order_list as $index => $item)
                    <div class="flex items-center justify-between border gap-6 p-4 border-gray-200 rounded">
                        <div class="w-28">
                            <p>order {{ $index + 1 }}</p>
                        </div>
                        <div class="w-1/3">
                            <h2 class="text-gray-800 text-xl font-medium uppercase">
                                {{ $item->order_timestamp->isoFormat('dddd, D MMMM Y') }}</h2>
                            <p class="text-gray-500 text-sm">
                                Total Produk : <span class="text-gray-500">{{ count($item->orderProduct) }}</span>
                            </p>
                            <p class="text-gray-500 text-sm">Status :
                                {!! $item->status == 3
                                    ? '<span class="text-green-600">Selesai</span>'
                                    : '<span class="text-red-600">Menunggu pembayaran</span>' !!}
                            </p>
                        </div>
                        <div class="text-[#6B4226] text-lg font-semibold">
                            Rp.{{ $item->total_amount }}
                        </div>
                        <button wire:click="detailOrder({{ $item->id }})"
                            class="px-6 py-2 text-center text-sm text-white bg-[#6B4226] border border-[#120a1b] rounded hover:bg-transparent hover:text-[#6B4226] transition uppercase font-roboto font-medium">Lihat
                            detail</button>
                    </div>
                @endforeach
            @else
                <div class="flex items-center justify-between border gap-6 p-4 border-gray-200 rounded">
                    <div class="w-full text-center">
                        <p>Anda belum melakukan transaksi</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <!-- ./wishlist -->

</div>
<!-- ./wrapper -->
</div>
