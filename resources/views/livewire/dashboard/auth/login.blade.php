<div class="bg-white">
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="contain">
        <!-- login -->
            <div class="max-w-lg mx-auto shadow px-6 py-7 rounded overflow-hidden">
                <div class="text-center">
                    <h2 class="text-2xl uppercase font-medium mb-1">Login Admin</h2>
                    <p class="text-gray-600 mb-6 text-sm">
                        Login dengan email admin anda
                    </p>
                </div>
                <form wire:submit.prevent="login" method="post">
                @if($errors->any())
                    @foreach ($errors->all() as $e)
                        <div class="bg-red-500 w-full p-2 m-2">{{ $e }}</div>
                    @endforeach
                @endif
                @if (session()->has('success'))
                    <div class="bg-green-500 w-full p-2 m-2">
                        {{ session('success') }}
                    </div>
                @elseif (session()->has('loginError'))
                    <div class="bg-red-500 w-full p-2 m-2">
                        {{ session('loginError') }}
                    </div>
                @elseif(session()->has('warning'))
                    <div class="bg-yellow-500 w-full p-2 m-2">
                        {{ session('warning') }}
                    </div>
                @endif
                    <div class="space-y-2">
                        <div>
                            <label for="email" class="text-gray-600 mb-2 block">Email</label>
                            <input wire:model.defer="email" type="email" name="email" id="email"
                                class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-[#6B4226] placeholder-gray-400"
                                placeholder="Masukkan Email Anda">
                        </div>
                        <div>
                            <label for="password" class="text-gray-600 mb-2 block">Password</label>
                            <input wire:model.defer="password" type="password" name="password" id="password"
                                class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-[#6B4226] placeholder-gray-400"
                                placeholder="Masukkan Password Anda">
                        </div>
                    </div>
                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center">
                            <input type="checkbox" name="remember" id="remember"
                                class="text-[#6B4226] focus:ring-0 rounded-sm cursor-pointer">
                            <label for="remember" class="text-gray-600 ml-3 cursor-pointer">Remember me</label>
                        </div>
                        <a href="#" class="text-[#6B4226]">Lupa password</a>
                    </div>
                    <div class="mt-4">
                        <button type="submit"
                            class="block w-full py-2 text-center bg-[#6B4226] border border-[#6B4226] rounded hover:bg-transparent hover:text-[#6B4226] transition uppercase font-roboto font-medium">Login</button>
                    </div>
                </form>

            </div>
            <!-- ./login -->
    </div>
</div>
