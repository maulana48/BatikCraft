<div>
    {{-- Success is as dangerous as failure. --}}
    <nav id="header" class="bg-gray-900 z-10 fixed w-full z-10 top-0 shadow">
        <div><input type="text" wire:model="url"></div>
        {{-- Care about people's approval and you will be their prisoner. --}}
        <div class="w-full container mx-auto flex flex-wrap items-center mt-0 pt-3 pb-3 md:pb-0">
    
            <div class="w-1/2 pl-2 md:pl-0">
                <a class="text-gray-100 text-base xl:text-xl no-underline hover:no-underline font-bold" href="#">
                    <i class="fas fa-moon text-blue-400 pr-3"></i> Admin Dark Mode
                </a>
            </div>

            @if($admin)
            <div class="w-1/2 pr-0">
                <div class="flex relative inline-block float-right">
    
                    <div class="relative text-sm text-gray-100">
                        <button id="userButton" class="flex items-center focus:outline-none mr-3">
                            <img class="w-8 h-8 rounded-full mr-4" src="http://i.pravatar.cc/300" alt="Avatar of User">
                            <span class="hidden md:inline-block text-gray-100">Hi, User</span>
                            <svg class="pl-2 h-2 fill-current text-gray-100" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 129 129"
                                xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 129 129">
                                <g>
                                    <path
                                        d="m121.3,34.6c-1.6-1.6-4.2-1.6-5.8,0l-51,51.1-51.1-51.1c-1.6-1.6-4.2-1.6-5.8,0-1.6,1.6-1.6,4.2 0,5.8l53.9,53.9c0.8,0.8 1.8,1.2 2.9,1.2 1,0 2.1-0.4 2.9-1.2l53.9-53.9c1.7-1.6 1.7-4.2 0.1-5.8z" />
                                </g>
                            </svg>
                        </button>
                        <div id="userMenu"
                            class="bg-gray-900 rounded shadow-md mt-2 absolute mt-12 top-0 right-0 min-w-full overflow-auto z-30 invisible">
                            <ul class="list-reset text-center">
                                <li><button wire:click="login"
                                        class="mx-auto py-2 block text-gray-100 hover:bg-gray-800 no-underline hover:no-underline">My profile</button>
                                <li>
                                    <hr class="border-t mx-2 border-gray-400">
                                </li>
                                <li><button wire:click="logout"
                                        class="mx-auto py-2 block text-gray-100 hover:bg-gray-800 no-underline hover:no-underline">Logout</button>
                                </li>
                            </ul>
                        </div>
                    </div>
    
    
                    <div class="block lg:hidden pr-4">
                        <button id="nav-toggle"
                            class="flex items-center px-3 py-2 border rounded text-gray-500 border-gray-600 hover:text-gray-100 hover:border-teal-500 appearance-none focus:outline-none">
                            <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <title>Menu</title>
                                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                            </svg>
                        </button>
                    </div>
                </div>
    
            </div>
    
    
            <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden lg:block mt-2 lg:mt-0 bg-gray-900 z-20"
                id="nav-content">
                <ul class="list-reset lg:flex flex-1 items-center px-4 md:px-0">
                    <li class="mr-6 my-2 md:my-0">
                        <button wire:click="$emit('home')"
                            class="block py-1 md:py-3 pl-1 align-middle @if($url == 'index') text-blue-400 border-blue-400 @else text-gray-500 border-gray-900  @endif no-underline hover:text-gray-100 border-b-2  hover:border-blue-400">
                            <i class="fas fa-home fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Home</span>
                        </button>
                    </li>
                    <li class="mr-6 my-2 md:my-0">
                        <button wire:click="product"
                            class="block py-1 md:py-3 pl-1 align-middle @if($url == 'product') text-pink-400 border-pink-400 @else text-gray-500 border-gray-900  @endif no-underline hover:text-gray-100 border-b-2  hover:border-pink-400">
                            <i class="fas fa-tasks fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Produk</span>
                        </button>
                    </li>
                    <li class="mr-6 my-2 md:my-0">
                        <button  wire:click="transaksi"
                            class="block py-1 md:py-3 pl-1 align-middle @if($url == 'transaksi') text-orange-400 border-orange-400 @else text-gray-500 border-gray-900  @endif no-underline hover:text-gray-100 border-b-2  hover:border-orange-400">
                            <i class="fa fa-clipboard-list fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Pemesanan</span>
                        </button>
                    </li>
                    <li class="mr-6 my-2 md:my-0">
                        <button  wire:click="footer"
                            class="block py-1 md:py-3 pl-1 align-middle @if($url == 'layouts.footer') text-blue-400 border-blue-400 @else text-gray-500 border-gray-900  @endif no-underline hover:text-gray-100 border-b-2  hover:border-purple-400">
                            <i class="fa fa-envelope fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Messages</span>
                        </button>
                    </li>
                </ul>
    
                <div class="relative pull-right pl-4 pr-4 md:pr-0">
                    <input type="search" placeholder="Search"
                        class="w-full bg-gray-900 text-sm text-gray-400 transition border border-gray-800 focus:outline-none focus:border-gray-600 rounded py-1 px-2 pl-10 appearance-none leading-normal">
                    <div class="absolute search-icon" style="top: 0.375rem;left: 1.75rem;">
                        <svg class="fill-current pointer-events-none text-gray-500 w-4 h-4"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path
                                d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z">
                            </path>
                        </svg>
                    </div>
                </div>
    
            </div>
            @else
                <div class="w-1/2 pr-0 flex justify-end items-center space-x-6 capitalize">
                    <button wire:click="" class=" text-gray-200 hover:text-white transition">Test</button>
                </div>
            @endif
    
        </div>
    </nav>
    <div class="py-[150px] px-[50px]" x-data="">
        @livewire('dashboard.' . $url, [], key($url . now()))
    </div>




    <script>
        /*Toggle dropdown list*/
        	/*https://gist.github.com/slavapas/593e8e50cf4cc16ac972afcbad4f70c8*/
        
        	var userMenuDiv = document.getElementById("userMenu");
        	var userMenu = document.getElementById("userButton");
        	
        	var navMenuDiv = document.getElementById("nav-content");
        	var navMenu = document.getElementById("nav-toggle");
        	
        	document.onclick = check;
        
        	function check(e){
        	  var target = (e && e.target) || (event && event.srcElement);
        
        	  //User Menu
        	  if (!checkParent(target, userMenuDiv)) {
        		// click NOT on the menu
        		if (checkParent(target, userMenu)) {
        		  // click on the link
        		  if (userMenuDiv.classList.contains("invisible")) {
        			userMenuDiv.classList.remove("invisible");
        		  } else {userMenuDiv.classList.add("invisible");}
        		} else {
        		  // click both outside link and outside menu, hide menu
        		  userMenuDiv.classList.add("invisible");
        		}
        	  }
        	  
        	  //Nav Menu
        	  if (!checkParent(target, navMenuDiv)) {
        		// click NOT on the menu
        		if (checkParent(target, navMenu)) {
        		  // click on the link
        		  if (navMenuDiv.classList.contains("hidden")) {
        			navMenuDiv.classList.remove("hidden");
        		  } else {navMenuDiv.classList.add("hidden");}
        		} else {
        		  // click both outside link and outside menu, hide menu
        		  navMenuDiv.classList.add("hidden");
        		}
        	  }
        	  
        	}
        
        	function checkParent(t, elm) {
        	  while(t.parentNode) {
        		if( t == elm ) {return true;}
        		t = t.parentNode;
        	  }
        	  return false;
        	}
        
        
    </script>
</div>