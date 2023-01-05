<div>
    {{-- Success is as dangerous as failure. --}}
    <!-- breadcrumb -->
    <div class="container py-4 flex items-center gap-3">
        <a href="../index.html" class="text-[#6B4226] text-base">
            <i class="fa-solid fa-house"></i>
        </a>
        <span class="text-sm text-gray-400">
            <i class="fa-solid fa-chevron-right"></i>
        </span>
        <p class="text-gray-600 font-medium">Profile</p>
    </div>
    <!-- ./breadcrumb -->

    <!-- wrapper -->
    <div x-data="{
        product_pesanan: {{ json_encode($product_pesanan) }},
        total: 0,
        showModal: [], 
        reviewData: [
            judul= null,
            komentar= null,
            rating= null
        ],
        reviewed: false,
        bayared: @if($pemesanan[0]->status == 3) true @else false @endif,
        count(harga, jumlah) {
            this.total += harga * jumlah;
        },
    }" class="container grid grid-cols-12 items-start gap-6 pt-4 pb-16">
        @livewire('component.sidebar', [$user])
        <!-- info -->
        <div class="col-span-9 shadow rounded px-6 pt-5 pb-7">
            <div class="col-span-4 border border-gray-200 p-4 rounded">
                <h4 class="text-gray-800 text-lg mb-4 font-medium uppercase">Rincian Pemesanan</h4>
                <div class="space-y-2 mb-4">
                    <template x-for="(p, index) in product_pesanan">
                        <div x-init="showModal[index] = false"  class="flex justify-between">
                            <div>
                                <h5 x-text="p.productbatik.nama" class="text-gray-800 font-medium"></h5>
                                <p x-text="'Merk : ' + p.productbatik.merk" class="text-sm text-gray-600"></p>
                            </div>
                            <p x-text="'x' + p.jumlah" class="text-gray-600"></p>
                            <p x-text="parseInt(p.productbatik.harga)" class="text-gray-800 font-medium"></p>
                            <span x-init="count(p.productbatik.harga, p.jumlah)" class="hidden"></span>
                            <button @click="showModal[index]=true" class="px-6 py-2 text-gray-600 bg-blue-600 rounded shadow-xl" type="button">Beri review</button>
                            
                            <!--Overlay-->
                            <div class="overflow-auto" style="background-color: rgba(0,0,0,0.5)" x-show="showModal[index]"
                                :class="{ 'fixed inset-0 z-10 flex items-center justify-center': showModal[index] }">
                                <!--Dialog-->
                                <div class="bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg py-4 text-left px-6" x-show="showModal[index]"
                                    @click.away="showModal[index] = false" x-transition:enter="ease-out duration-300"
                                    x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100">
                            
                                    <!--Title-->
                                    <div class="flex justify-between items-center pb-3">
                                        <div>
                                            <p class="text-2xl font-bold">Review Produk : </p>
                                            <p class="text-2xl font-bold" x-text="p.productbatik.nama"></p>
                                        </div>
                                        <div class="cursor-pointer z-50" @click="showModal[index] = false">
                                            <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                viewBox="0 0 18 18">
                                                <path
                                                    d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                            
                                    <!-- content -->
                                    <form class="space-y-6" x-on:submit.prevent="console.log(media); $wire.review(p.product_id, media, reviewData)" action="#">
                                        <div>
                                            <label for="judul" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Masukkan judul review</label>
                                            <input required x-model="reviewData[0]" type="text" name="judul" id="judul"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-50 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                placeholder="judul review">
                                        </div>
                                        @error('judul')
                                            <span class="mt-[5px] text-sm text-red-500">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                        <div>
                                            <label for="komentar" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Masukkan komentar anda</label>
                                            <textarea required x-model="reviewData[1]" type="text" name="komentar" id="komentar"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-50ror block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                placeholder="isi komentar"></textarea>
                                        </div>
                                        @error('komentar')
                                            <span class="mt-[5px] text-sm text-red-500">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                        <div>
                                            <label for="rating" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Berikan rating untuk produk ini</label>
                                            <input required x-model="reviewData[2]" type="number" name="rating" id="rating"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-50r block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                placeholder="berikan rating anda" min="1" max="5">
                                        </div>
                                        @error('rating')
                                            <span class="mt-[5px] text-sm text-red-500">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                        <div>
                                            <label for="media" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sertakan foto produk</label>
                                            <input required x-on:change="files = Object.values($event.target.files);
                                            @this.uploadMultiple('media', files,
                                                (uploadedFilename) => {}, () => {}, (event) => {}
                                            )" 
                                            type="file" name="media" id="media" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-50 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                placeholder="" multiple>
                                        </div>
                                        @error('media')
                                            <span class="mt-[5px] text-sm text-red-500">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                        

                                        <!--Footer-->
                                        <div class="flex justify-end pt-2">
                                            <button x-show="true" type="submit" class="px-4 bg-[#6B4226] p-3 rounded-lg text-white hover:bg-[#6B4226]">Submit review</button>
                                            <button @click="showModal[index] = false" class="modal-close px-4 bg-transparent p-3 rounded-lg text-indigo-500 hover:bg-gray-100 hover:text-indigo-400 mr-2">Batalkan</button>
                                        </div>
                                    </form>
                            
                            
                            
                                </div>
                                <!--/Dialog -->
                            </div>
                            <!-- /Overlay -->


                        </div>
                    </template>
                </div>


                <div class="flex justify-between border-b border-gray-200 mt-1 text-gray-800 font-medium py-3 uppercas">
                    <p>total harga</p>
                    <p x-text="'Rp. ' + total"></p>
                </div>

                <div class="flex justify-between border-b border-gray-200 mt-1 text-gray-800 font-medium py-3 uppercas">
                    <p>biaya pengiriman</p>
                    <p>gratis</p>
                </div>

                <div class="flex justify-between text-gray-800 font-medium py-3 uppercas">
                    <p class="font-semibold">Total</p>
                    <p x-text="'Rp. ' + total"></p>
                </div>

            </div>

            <div class="mt-4">
                <button x-on:click="bayared ? true : await $wire.bayar(true)"
                    class="w-full py-3 px-4 text-center text-white bg-[#6B4226] border border-[#6B4226] rounded-md hover:bg-transparent hover:text-[#6B4226] transition font-medium flex justify-center items-baseline gap-3">
                    <template x-if="bayared == true">
                        <p><i class="fa-solid fa-circle-check"></i> Transaksi Selesai</p>
                    </template>
                    <template x-if="bayared == false">
                        <p>Lakukan Pembayaran</p>
                    </template>
                </button>
            </div>
        </div>
        <!-- ./info -->

    </div>
    <!-- ./wrapper -->
</div>
