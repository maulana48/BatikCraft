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
    <div class="container grid grid-cols-12 items-start gap-6 pt-4 pb-16">
        @livewire('component.sidebar')
        <!-- info -->
        <div class="col-span-9 shadow rounded px-6 pt-5 pb-7">
            <h4 class="text-lg font-medium capitalize mb-4">
                Profile information
            </h4>
            <div class="space-y-4">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="nama">Nama lengkap</label>
                        <input x-model="user.nama" type="text" name="nama" id="nama" class="input-box">
                    </div>
                    <div>
                        <label for="username">Username</label>
                        <input x-model="user.nama" type="text" name="username" id="username" class="input-box">
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="tanggal_lahir">Tanggal lahir</label>
                        <input x-model="user.tanggal_lahir" type="date" name="tanggal_lahir" id="tanggal_lahir" class="input-box">
                    </div>
                    <div>
                        <label for="gender">Gender</label>
                        <select x-model="user.gender" name="gender" id="gender" class="input-box">
                            <option value="" selected disabled>--jenis kelamin--</option>
                            <option value="M">Laki-laki</option>
                            <option value="F">Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="email">Email Address</label>
                        <input x-model="user.email" type="email" name="email" id="email" class="input-box">
                    </div>
                    <div>
                        <label for="phone">Phone number</label>
                        <input x-model="user.no_telepon" type="text" name="phone" id="phone" class="input-box">
                    </div>
                </div>
            </div>
    
            <div class="mt-4">
                <button type="submit"
                    class="py-3 px-4 text-center bg-[#6B4226] border border-[#6B4226] rounded-md hover:bg-transparent hover:text-[#6B4226] transition font-medium">simpan perubahan</button>
            </div>
        </div>
        <!-- ./info -->
    
    </div>
    <!-- ./wrapper -->
</div>
