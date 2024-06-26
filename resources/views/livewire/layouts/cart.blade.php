<div x-data="{
    batik_list: {{ json_encode($batik_list) }},
    cartProducts: {{ json_encode($cartProducts) }}
}">
    {{-- Because she competes with no one, no one can compete with her. --}}
    @livewire('component.breadcumb', [$pageName])

    <!-- wrapper -->
    <div class="container grid grid-cols-12 items-start gap-6 pt-4 pb-16">
        @livewire('component.sidebar', [$user])

        <!-- wishlist -->
        <div class="col-span-9 space-y-4">
            @if (count($batik_list) != 0)
                <div class="flex justify-end">
                    <button wire:click="checkOut" class="py-[10px] px-[20px] rounded-lg bg-blue-600 text-white">Check
                        out</button>
                </div>
                @foreach ($batik_list as $key => $b)
                    <div class="flex items-center justify-between border gap-6 p-4 border-gray-200 rounded">
                        <div class="w-28">
                            <img src="{{ $b->main_media }}" alt="product {{ $key + 1 }}" class="w-full">
                        </div>
                        <div class="w-1/3">
                            <h2 class="text-gray-800 text-xl font-medium uppercase">{{ $b->name }}</h2>
                            <p class="text-gray-500 text-sm">Stok :
                                {!! $b->stock != 0
                                    ? '<span class="text-green-600">Tersedia</span>'
                                    : '<span class="text-red-600">Maaf produk ini sudah habis</span>' !!}
                            </p>
                            <p class="text-gray-500 text-sm">
                                Jumlah : <span class="text-gray-500">{{ $cartProducts[$key]->amount }}</span>
                            </p>
                        </div>
                        <div class="text-[#6B4226] text-lg font-semibold">{{ 'Rp.' . $b->price }} </div>
                        <button wire:click="checking({{ $key }})"
                            class="px-6 py-2 text-center text-sm text-white bg-[#6B4226] border border-[#120a1b] rounded hover:bg-transparent hover:text-[#6B4226] transition uppercase font-roboto font-medium">
                            {{ $b->status == 1 ? 'Tekan untuk Check-out' : 'Checked-out' }}
                        </button>

                        <div @click="deleted = confirm('Pindahkan produk dari keranjang?'); if(deleted) await $wire.delete({{ $key }});"
                            class="text-gray-600 cursor-pointer hover:text-[#6B4226]">
                            <i class="fa-solid fa-trash"></i>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="flex items-center justify-between border gap-6 p-4 border-gray-200 rounded">
                    <div class="w-full text-center">
                        <p>Anda belum menambahkan produk</p>
                    </div>
                </div>
            @endif
        </div>
        <!-- ./wishlist -->

    </div>
    <!-- ./wrapper -->
</div>
