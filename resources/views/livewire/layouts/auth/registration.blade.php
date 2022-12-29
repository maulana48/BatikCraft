<div>
    {{-- Do your work, then step back. --}}
    <!-- login -->
    <div class="contain py-16">
        <div class="max-w-lg mx-auto shadow px-6 py-7 rounded overflow-hidden">
            <div class="text-center">
                <h2 class="text-2xl uppercase font-medium mb-1">Create an account</h2>
                <p class="text-gray-600 mb-6 text-sm">
                    Register for new cosutumer
                </p>
            </div>
            @if($errors->any())
                @foreach ($errors->all() as $e)
                    <div class="bg-red-500 w-full p-2 m-2">{{ $e }}</div>
                @endforeach
            @endif
            @if (session()->has('success'))
                <div class="bg-green-500 w-full p-2 m-2">
                    {{ session('success') }}
                </div>
            @endif
            <form wire:submit.prevent="registration" method="post">
                <div class="space-y-2">
                    <div>
                        <label for="nama" class="text-gray-600 mb-2 block">Nama Lengkap</label>
                        <input type="text" wire:model="nama" name="nama" id="nama"
                            class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-[#6100c1] placeholder-gray-400"
                            placeholder="fulan fulana">
                    </div>
                    <div>
                        <label for="gender" class="text-gray-600 mb-2 block">Gender</label>
                        <select wire:model="gender" name="gender" id="gender"
                            class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-[#6100c1] placeholder-gray-400">
                            <option disabled selected> -- Pilh gender anda -- </option>
                            <option value="M">Laki-Laki</option>
                            <option value="F">Perempuan</option>
                        </select>
                    </div>
                    <div>
                        <label for="email" class="text-gray-600 mb-2 block">Email</label>
                        <input type="email" wire:model="email" name="email" id="email"
                            class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-[#6100c1] placeholder-gray-400"
                            placeholder="email.@domain.com">
                    </div>
                    <div>
                        <label for="alamat" class="text-gray-600 mb-2 block">Alamat</label>
                        <input type="text" wire:model="alamat" name="alamat" id="alamat"
                            class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-[#6100c1] placeholder-gray-400"
                            placeholder="masukkan alamat anda">
                    </div>
                    <div>
                        <label for="no_telepon" class="text-gray-600 mb-2 block">No Telepon</label>
                        <input type="text" wire:model="no_telepon" name="no_telepon" id="no_telepon"
                            class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-[#6100c1] placeholder-gray-400"
                            placeholder="masukkan no telepon anda">
                    </div>
                    <div>
                        <label for="tanggal_lahir" class="text-gray-600 mb-2 block">Tanggal Lahir</label>
                        <input type="date" wire:model="tanggal_lahir" name="tanggal_lahir" id="tanggal_lahir"
                            class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-[#6100c1] placeholder-gray-400"
                            placeholder="masukkan tanggal lahir anda">
                    </div>
                    <div>
                        <label for="media" class="text-gray-600 mb-2 block">Foto</label>
                        <input type="file" wire:model="media" name="media" id="media"
                            class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-[#6100c1] placeholder-gray-400"
                            placeholder="masukkan foto anda">
                    </div>
                    <div>
                        <label for="password" class="text-gray-600 mb-2 block">Password</label>
                        <input type="password" wire:model="password" name="password" id="password"
                            class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-[#6100c1] placeholder-gray-400"
                            placeholder="*******">
                    </div>
                    <div>
                        <label for="confirm" class="text-gray-600 mb-2 block">Confirm password</label>
                        <input type="password" wire:model="confirm" name="confirm" id="confirm"
                            class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-[#6100c1] placeholder-gray-400"
                            placeholder="*******">
                    </div>
                </div>
                <div class="mt-6">
                    <div class="flex items-center">
                        <input type="checkbox" name="aggrement" id="aggrement"
                            class="text-[#6100c1] focus:ring-0 rounded-sm cursor-pointer">
                        <label for="aggrement" class="text-gray-600 ml-3 cursor-pointer">I have read and agree to the <a
                                href="#" class="text-[#6100c1]">terms & conditions</a></label>
                    </div>
                </div>
                <div class="mt-4">
                    <button type="submit"
                        class="block w-full py-2 text-center text-white bg-[#6100c1] border border-[#6100c1] rounded hover:bg-transparent hover:text-[#6100c1] transition uppercase font-roboto font-medium">Daftarkan</button>
                </div>
            </form>
    
            <p class="mt-4 text-center text-gray-600">Already have account? <a href="/login"
                    class="text-[#6100c1]">Login now</a></p>
        </div>
    </div>
    <!-- ./login -->
</div>
