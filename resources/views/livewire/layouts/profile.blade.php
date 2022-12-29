<div>
    {{-- Success is as dangerous as failure. --}}
    <!-- breadcrumb -->
    <div class="container py-4 flex items-center gap-3">
        <a href="../index.html" class="text-[#6100c1] text-base">
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
                        <label for="first">First name</label>
                        <input type="text" name="first" id="first" class="input-box">
                    </div>
                    <div>
                        <label for="last">Last name</label>
                        <input type="text" name="last" id="last" class="input-box">
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="birthday">Birthday</label>
                        <input type="date" name="birthday" id="birthday" class="input-box">
                    </div>
                    <div>
                        <label for="gender">Gender</label>
                        <select name="gender" id="gender" class="input-box">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="email">Email Address</label>
                        <input type="email" name="email" id="email" class="input-box">
                    </div>
                    <div>
                        <label for="phone">Phone number</label>
                        <input type="text" name="phone" id="phone" class="input-box">
                    </div>
                </div>
            </div>
    
            <div class="mt-4">
                <button type="submit"
                    class="py-3 px-4 text-center text-white bg-[#6100c1] border border-[#6100c1] rounded-md hover:bg-transparent hover:text-[#6100c1] transition font-medium">save
                    changes</button>
            </div>
        </div>
        <!-- ./info -->
    
    </div>
    <!-- ./wrapper -->
</div>
