<div class="container p-12 mx-auto bg-white">
    <div class="flex flex-col w-full px-0 mx-auto md:flex-row">
        <div class="flex flex-col md:w-full">
            <h2 class="mb-4 font-bold md:text-xl text-heading ">Shipping Address
            </h2>
            <form class="justify-center w-full mx-auto" method="post" action>
                <div class="">
                    <div class="space-x-0 lg:flex lg:space-x-4">
                        <div class="w-full lg:w-1/2">
                            <label for="nama" class="block mb-3 text-sm font-semibold text-gray-500">Nama Lengkap</label>
                            <input disabled value="{{ $detailUser->nama }}" name="nama" type="text" placeholder="Nama Lengkap"
                                class="w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
                        </div>
                        <div class="w-full lg:w-1/2 ">
                            <label for="username" class="block mb-3 text-sm font-semibold text-gray-500">Username</label>
                            <input disabled value="{{ $detailUser->nama }}" name="username" type="text" placeholder="Username"
                                class="w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="w-full">
                            <label for="Email" class="block mb-3 text-sm font-semibold text-gray-500">Email</label>
                            <input disabled value="{{ $detailUser->email }}" name="email" type="text" placeholder="Email"
                                class="w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="w-full">
                            <label for="alamat" class="block mb-3 text-sm font-semibold text-gray-500">Alamat</label>
                            <textarea
                                class="w-full px-4 py-3 text-xs border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600"
                                name="alamat" cols="20" rows="4" placeholder="alamat">{{ $detailUser->alamat }}</textarea>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="w-full">
                            <label for="tanggal_lahir" class="block mb-3 text-sm font-semibold text-gray-500">Tanggal Lahir</label>
                            <input disabled value="{{ $detailUser->tanggal_lahir }}" name="tanggal_lahir" type="date" placeholder="tanggal_lahir"
                                class="w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
                        </div>
                    </div>
                    <div class="space-x-0 lg:flex lg:space-x-4">
                        <div class="w-full lg:w-1/2">
                            <label for="no_telepon" class="block mb-3 text-sm font-semibold text-gray-500">Nomor Telepon</label>
                            <input disabled value="{{ $detailUser->no_telepon }}" name="no_telepon" type="text" placeholder="no_telepon"
                                class="w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
                        </div>
                        <div class="w-full lg:w-1/2 ">
                            <label for="gender" class="block mb-3 text-sm font-semibold text-gray-500">
                                Jenis Kelamin</label>
                            <input disabled value="{{ ($detailUser->gender == 'M') ? 'Laki-laki' : 'Perempuan' }}" name="gender" type="text" placeholder="Post Code"
                                class="w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
                        </div>
                    </div>
                    {{-- <div class="flex items-center mt-4">
                        <label class="flex items-center text-sm group text-heading">
                            <input disabled value="{{ $detailUser->email }}" type="checkbox"
                                class="w-5 h-5 border border-gray-300 rounded focus:outline-none focus:ring-1">
                            <span class="ml-2">Save this information for next time</span></label>
                    </div> --}}
                    <div class="relative pt-3 xl:pt-6"><label for="note"
                            class="block mb-3 text-sm font-semibold text-gray-500"> Notes
                            (Optional)</label><textarea disabled name="note"
                            class="flex items-center w-full px-4 py-3 text-sm border border-gray-300 rounded focus:outline-none focus:ring-1 focus:ring-blue-600"
                            rows="4" placeholder="Notes for delivery"></textarea>
                    </div>
                    <div class="mt-4">
                        <button class="w-full px-6 py-2 text-blue-200 bg-blue-600 hover:bg-blue-900">Process</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="flex flex-col w-full ml-0 lg:ml-12 lg:w-2/5">
            <div class="pt-12 md:pt-0 2xl:ps-4">
                <h2 class="text-xl font-bold">Detail Produk
                </h2>
                <div class="mt-8">
                    <div class="flex flex-col space-y-4">
                        @foreach ($detailTransaksi->productpesanan as $p)
                            <div class="flex space-x-4">
                                <div>
                                    <img src="{{ $p->productbatik->media }}" alt="image" class="w-60">
                                </div>
                                <div>
                                    <h2 class="text-xl font-bold">{{ $p->productbatik->nama }}</h2>
                                    <p class="text-sm">Merk : {{ $p->productbatik->merk }}</p>
                                    <p class="text-sm">Jumlah : {{ $p->jumlah }}</p>
                                    <span class="text-sm">Harga : </span> Rp.{{ (int)$p->productbatik->harga }}
                                </div>
                                <div>
                                    <svg xmlns="{{ $p->productbatik->media }}" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="flex p-4 mt-4">
                    <h2 class="text-xl font-bold">Pembayaran</h2>
                </div>
                <div
                    class="flex items-center w-full py-4 text-sm font-semibold border-b border-gray-300 lg:py-5 lg:px-3 text-heading last:border-b-0 last:text-base last:pb-0">
                    Total Harga<span class="ml-2">Rp. {{ (int)$detailTransaksi->total_harga }}</span></div>
                <div
                    class="flex items-center w-full py-4 text-sm font-semibold border-b border-gray-300 lg:py-5 lg:px-3 text-heading last:border-b-0 last:text-base last:pb-0">
                    Biaya pengiriman<span class="ml-2">gratis</span></div>
                <div
                    class="flex items-center w-full py-4 text-sm font-semibold border-b border-gray-300 lg:py-5 lg:px-3 text-heading last:border-b-0 last:text-base last:pb-0">
                Total<span class="ml-2">Rp. {{ (int)$detailTransaksi->total_harga }}</span></div>
                <div
                    class="flex items-center w-full py-4 text-sm font-semibold border-b border-gray-300 lg:py-5 lg:px-3 text-heading last:border-b-0 last:text-base last:pb-0">
                Status Pembayaran : <span class="ml-2">{{ $detailTransaksi->pembayaran->status == 2 ? 'Lunas' : 'Belum Lunas' }}</span></div>
            </div>
        </div>
    </div>
</div>