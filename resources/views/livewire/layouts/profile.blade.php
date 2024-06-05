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
        @livewire('component.sidebar', [$user])
        <!-- info -->
        <div class="col-span-9 shadow rounded px-6 pt-5 pb-7">
            <h4 class="text-lg font-medium capitalize mb-4">
                Profile information
            </h4>
            @if ($errors->any())
                @foreach ($errors->all() as $e)
                    <div class="bg-red-500 w-full p-2 my-6">{{ $e }}</div>
                @endforeach
            @endif
            @if (session()->has('success'))
                <div class="bg-green-500 w-full p-2 my-6">
                    {{ session('success') }}
                </div>
            @endif
            <form wire:submit.prevent="update_profile" method="post">
                <div class="space-y-4">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="name">Nama lengkap</label>
                            <input wire:model.defer="name" type="text" name="name" id="name"
                                class="input-box">
                        </div>
                        <div>
                            <label for="email">Email Address</label>
                            <input wire:model.defer="email" type="email" name="email" id="email"
                                class="input-box">
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="birth_date">Tanggal lahir</label>
                            <input wire:model.defer="birth_date" type="date" name="birth_date" id="birth_date"
                                class="input-box">
                        </div>
                        <div>
                            <label for="gender">Gender</label>
                            <select wire:model.defer="gender" name="gender" id="gender" class="input-box">
                                <option value="" selected disabled>--jenis kelamin--</option>
                                <option value="M">Laki-laki</option>
                                <option value="F">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="phone">Phone number</label>
                            <input wire:model.defer="phone_number" type="text" name="phone" id="phone"
                                class="input-box">
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4 mb-4">
                        {{-- display old profile_picture --}}
                        <div>
                            <label for="profile_picture">Profile Picture</label>
                            <input wire:model="profile_picture" type="file" name="profile_picture"
                                id="profile_picture" class="input-box">
                        </div>
                        <div>
                            <label for="profile_picture">Profile Picture</label>
                            <img src="{{ asset($user->profile_picture) }}" alt="profile picture" class="w-20 h-20">
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit"
                        class="py-3 px-4 text-center bg-[#6B4226] border border-[#6B4226] rounded-md hover:bg-transparent hover:text-[#6B4226] transition font-medium"">simpan
                        perubahan</button>
                </div>
            </form>
        </div>
        <!-- ./info -->

    </div>
    <!-- ./wrapper -->
</div>
