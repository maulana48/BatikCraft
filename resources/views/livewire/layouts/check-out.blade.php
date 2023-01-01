<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    
    <!-- breadcrumb -->
    <div class="container py-4 flex items-center gap-3">
        <a href="../index.html" class="text-[#6100c1] text-base">
            <i class="fa-solid fa-house"></i>
        </a>
        <span class="text-sm text-gray-400">
            <i class="fa-solid fa-chevron-right"></i>
        </span>
        <p class="text-gray-600 font-medium">Checkout</p>
    </div>
    <!-- ./breadcrumb -->
    
    <!-- wrapper -->
    <div x-data="{
        checked: {{ json_encode($checked) }},
        batikDibeli: {{ json_encode($batik) }},
        user: {{ json_encode($user) }},
        total: 0,
        count(harga, jumlah){
            this.total += harga * jumlah;
        },
    }" class="container grid grid-cols-12 items-start pb-16 pt-4 gap-6">
    
        <div class="col-span-8 border border-gray-200 p-4 rounded">
            <h3 class="text-lg font-medium capitalize mb-4">Checkout</h3>
            <div class="space-y-4">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="nama" class="text-gray-600">Nama Lengkap<span
                                class="text-[#6100c1]">*</span></label>
                        <input x-bind:value="user.nama" type="text" name="nama" id="nama" class="input-box" disabled>
                    </div>
                    <div>
                        <label for="username" class="text-gray-600">Username<span class="text-[#6100c1]">*</span></label>
                        <input x-bind:value="user.nama" type="text" name="username" id="username" class="input-box" disabled>
                    </div>
                </div>
                <div>
                    <label for="email" class="text-gray-600">Email</label>
                    <input x-bind:value="user.email" type="email" name="email" id="email" class="input-box" disabled>
                </div>
                <div>
                    <label for="gender" class="text-gray-600">Jenis Kelamin</label>
                    <input x-bind:value="(user.gender == 'M') ? 'Laki-laki' : 'Perempuan'" type="text" name="gender" id="gender" class="input-box" disabled>
                </div>
                <div>
                    <label for="alamat" class="text-gray-600">Alamat</label>
                    <input x-bind:value="user.alamat" type="text" name="alamat" id="alamat" class="input-box" disabled>
                </div>
                <div>
                    <label for="no_telepon" class="text-gray-600">Nomor Telepon</label>
                    <input x-bind:value="user.no_telepon" type="text" name="no_telepon" id="no_telepon" class="input-box" disabled>
                </div>
                <div>
                    <label for="tanggal_lahir" class="text-gray-600">Tanggal Lahir</label>
                    <input x-bind:value="user.tanggal_lahir" type="date" name="tanggal_lahir" id="tanggal_lahir" class="input-box" disabled>
                </div>
            </div>
    
        </div>

        <div class="col-span-4 border border-gray-200 p-4 rounded">
            <h4 class="text-gray-800 text-lg mb-4 font-medium uppercase">Rincian Pemesanan</h4>
            <div class="space-y-2">
                <template x-for="(b, index) in batikDibeli">
                    <div class="flex justify-between">
                        <div>
                            <h5 x-text="b.nama" class="text-gray-800 font-medium"></h5>
                            <p x-text="'Merk : ' + b.merk" class="text-sm text-gray-600"></p>
                        </div>
                        <p x-text="checked[index].jumlah" class="text-gray-600"></p>
                        <p x-text="parseInt(b.harga)" class="text-gray-800 font-medium"></p>
                        <span x-init="count(b.harga, checked[index].jumlah)"></span>
                    </div>
                </template>
            </div>
    
            <hr>
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
    
            {{-- <div class="flex items-center mb-4 mt-2">
                <input type="checkbox" name="aggrement" id="aggrement"
                    class="text-[#6100c1] focus:ring-0 rounded-sm cursor-pointer w-3 h-3">
                <label for="aggrement" class="text-gray-600 ml-3 cursor-pointer text-sm">test<a href="#"
                        class="text-[#6100c1]">test</a></label>
            </div> --}}
    
            <button x-on:click="$wire.checkOut(true)"
                class="block w-full py-3 px-4 text-center text-white bg-[#6100c1] border border-[#6100c1] rounded-md hover:bg-transparent hover:text-[#6100c1] transition font-medium">Buat Pesanan</button>
        </div>
    
    </div>
    <!-- ./wrapper -->
</div>
