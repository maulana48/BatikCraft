<div class="max-w-full bg-[#111827]">
    <!-- component -->
    <!-- This is an example component -->
    <div class="min-w-full p-5">
        <div class="text-center">
            <div class="d-flex my-4">
                <h1 class="text-center text-green-300 text-[30px] font-bold">Dashboard Admin</h1>
            </div>
        </div>
    </div>

    <!--Container-->
    <div class="container w-full mx-auto">
    
        <div class="w-full px-4 md:px-0 md:mt-8 text-gray-800 leading-normal">
    
            <!--Console Content-->
    
            <div class="flex flex-wrap">
                <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                    <!--Metric Card-->
                    <div class="bg-gray-900 border border-gray-800 rounded shadow p-2">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded p-3 bg-green-600"><i class="fa fa-wallet fa-2x fa-fw fa-inverse"></i>
                                </div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h5 class="font-bold uppercase text-gray-400">Total Pendapatan</h5>
                                <h3 class="font-bold text-3xl text-gray-600">Rp.{{ $pembayaran->sum('jumlah_yang_dibayar')
                                    }} <span class="text-green-500"><i class="fas fa-caret-up"></i></span></h3>
                            </div>
                        </div>
                    </div>
                    <!--/Metric Card-->
                </div>
                <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                    <!--Metric Card-->
                    <div class="bg-gray-900 border border-gray-800 rounded shadow p-2">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded p-3 bg-pink-600"><i class="fas fa-users fa-2x fa-fw fa-inverse"></i>
                                </div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h5 class="font-bold uppercase text-gray-400">Total User</h5>
                                <h3 class="font-bold text-3xl text-gray-600">{{ $user->count() }} <span
                                        class="text-pink-500"><i class="fas fa-exchange-alt"></i></span></h3>
                            </div>
                        </div>
                    </div>
                    <!--/Metric Card-->
                </div>
                <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                    <!--Metric Card-->
                    <div class="bg-gray-900 border border-gray-800 rounded shadow p-2">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded p-3 bg-yellow-600"><i
                                        class="fas fa-user-plus fa-2x fa-fw fa-inverse"></i></div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h5 class="font-bold uppercase text-gray-400">Total Pemesanan</h5>
                                <h3 class="font-bold text-3xl text-gray-600">{{ $pemesanan }}<span
                                        class="text-yellow-600"><i class="fas fa-caret-up"></i></span></h3>
                            </div>
                        </div>
                    </div>
                    <!--/Metric Card-->
                </div>
                <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                    <!--Metric Card-->
                    <div class="bg-gray-900 border border-gray-800 rounded shadow p-2">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded p-3 bg-blue-600"><i class="fas fa-server fa-2x fa-fw fa-inverse"></i>
                                </div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h5 class="font-bold uppercase text-gray-400">Server Uptime</h5>
                                <h3 class="font-bold text-3xl text-gray-600">{{ round((time() - strtotime('2022-12-26')) / (60 * 60 * 24))  }} days</h3>
                            </div>
                        </div>
                    </div>
                    <!--/Metric Card-->
                </div>
                <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                    <!--Metric Card-->
                    <div class="bg-gray-900 border border-gray-800 rounded shadow p-2">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded p-3 bg-indigo-600"><i class="fas fa-tasks fa-2x fa-fw fa-inverse"></i>
                                </div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h5 class="font-bold uppercase text-gray-400">Total Produk</h5>
                                <h3 class="font-bold text-3xl text-gray-600">{{ $batik->count() }}</h3>
                            </div>
                        </div>
                    </div>
                    <!--/Metric Card-->
                </div>
                <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                    <!--Metric Card-->
                    <div class="bg-gray-900 border border-gray-800 rounded shadow p-2">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded p-3 bg-red-600"><i class="fas fa-inbox fa-2x fa-fw fa-inverse"></i>
                                </div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h5 class="font-bold uppercase text-gray-400">Permasalahan</h5>
                                <h3 class="font-bold text-3xl text-gray-600">3 <span class="text-red-500"><i
                                            class="fas fa-caret-up"></i></span></h3>
                            </div>
                        </div>
                    </div>
                    <!--/Metric Card-->
                </div>
            </div>
    
            
            <!--Divider-->
            <hr class="border-b-2 border-gray-600 my-8 mx-4">
    
            <div x-data="{
                terpopuler: {{ json_encode($terpopuler) }}
            }" class="flex flex-row flex-wrap flex-grow mt-2">
    
                <div class="w-full md:w-1/2 p-3">
                    <!--Graph Card-->

                    <template x-for="(populer, index) in terpopuler">
                        <div class="bg-gray-900 border border-gray-800 rounded shadow">
                            <div class="border-b border-gray-800 p-3">
                                <h5 x-text="'Tepopuler ' + (index + 1)" class="font-bold uppercase text-gray-600"></h5>
                            </div>
                            <div class="p-5">
                                <div class="bg-white shadow rounded overflow-hidden group">
                                    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
                                    <div class="relative">
                                        <img x-bind:src="populer.productbatik.media" src="" alt="product 1" class="w-full">
                                    </div>
                                    <div class="pt-4 pb-3 px-4">
                                        <a>
                                            <h4 x-text="populer.productbatik.nama" class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-[#6B4226] transition">
                                            </h4>
                                        </a>
                                        <div class="flex items-baseline mb-1 space-x-2">
                                            <p x-text="'Rp.' + populer.productbatik.harga"  class="text-xl text-[#6B4226] font-semibold"></p>
                                            {{-- <p class="text-sm text-gray-400 line-through">{{ $batik['']harga }}</p> --}}
                                        </div>
                                        <div class="flex items-center">
                                            <div x-text="populer.total" class="text-xs text-gray-500 ml-3"></div>
                                        </div>
                                    </div>
                                    <button x-text="populer.productbatik.nama"
                                        class="block w-full py-1 text-center text-white bg-[#6B4226] border border-[#6B4226] rounded-b hover:bg-transparent hover:text-[#6B4226] transition"></button>
                                </div>
                            </div>
                        </div>

                    </template>
                    
                    <!--/Graph Card-->
                </div>
    
            </div>
    
            <!--/ Console Content-->


            
            {{--
            <!--Divider-->
            <hr class="border-b-2 border-gray-600 my-8 mx-4">
    
            <div class="flex flex-row flex-wrap flex-grow mt-2">
    
                <div class="w-full md:w-1/2 p-3">
                    <!--Graph Card-->
                    <div class="bg-gray-900 border border-gray-800 rounded shadow">
                        <div class="border-b border-gray-800 p-3">
                            <h5 class="font-bold uppercase text-gray-600">Graph</h5>
                        </div>
                        <div class="p-5">
                            <canvas id="chartjs-7" class="chartjs" width="undefined" height="undefined"></canvas>
                            <script>
                                new Chart(document.getElementById("chartjs-7"), {
                                            "type": "bar",
                                            "data": {
                                                "labels": ["January", "February", "March", "April"],
                                                "datasets": [{
                                                    "label": "Page Impressions",
                                                    "data": [10, 20, 30, 40],
                                                    "borderColor": "rgb(255, 99, 132)",
                                                    "backgroundColor": "rgba(255, 99, 132, 0.2)"
                                                }, {
                                                    "label": "Adsense Clicks",
                                                    "data": [5, 15, 10, 30],
                                                    "type": "line",
                                                    "fill": false,
                                                    "borderColor": "rgb(54, 162, 235)"
                                                }]
                                            },
                                            "options": {
                                                "scales": {
                                                    "yAxes": [{
                                                        "ticks": {
                                                            "beginAtZero": true
                                                        }
                                                    }]
                                                }
                                            }
                                        });
                            </script>
                        </div>
                    </div>
                    <!--/Graph Card-->
                </div>
    
            </div>
    
            <!--/ Console Content--> --}}
    
        </div>
    
    
    </div>
    <!--/container-->


</div>
