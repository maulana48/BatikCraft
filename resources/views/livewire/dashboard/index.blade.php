<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
        <!--Container-->
        <div class="container w-full mx-auto pt-20">
    
            <div class="w-full px-4 md:px-0 md:mt-8 mb-16 text-gray-800 leading-normal">
    
                <!--Console Content-->
    
                <div class="flex flex-wrap">
                    <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                        <!--Metric Card-->
                        <div class="bg-gray-900 border border-gray-800 rounded shadow p-2">
                            <div class="flex flex-row items-center">
                                <div class="flex-shrink pr-4">
                                    <div class="rounded p-3 bg-green-600"><i
                                            class="fa fa-wallet fa-2x fa-fw fa-inverse"></i></div>
                                </div>
                                <div class="flex-1 text-right md:text-center">
                                    <h5 class="font-bold uppercase text-gray-400">Total Revenue</h5>
                                    <h3 class="font-bold text-3xl text-gray-600">$3249 <span class="text-green-500"><i
                                                class="fas fa-caret-up"></i></span></h3>
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
                                    <h5 class="font-bold uppercase text-gray-400">Total Users</h5>
                                    <h3 class="font-bold text-3xl text-gray-600">249 <span class="text-pink-500"><i
                                                class="fas fa-exchange-alt"></i></span></h3>
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
                                    <h5 class="font-bold uppercase text-gray-400">New Users</h5>
                                    <h3 class="font-bold text-3xl text-gray-600">2 <span class="text-yellow-600"><i
                                                class="fas fa-caret-up"></i></span></h3>
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
                                    <div class="rounded p-3 bg-blue-600"><i
                                            class="fas fa-server fa-2x fa-fw fa-inverse"></i></div>
                                </div>
                                <div class="flex-1 text-right md:text-center">
                                    <h5 class="font-bold uppercase text-gray-400">Server Uptime</h5>
                                    <h3 class="font-bold text-3xl text-gray-600">152 days</h3>
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
                                    <div class="rounded p-3 bg-indigo-600"><i
                                            class="fas fa-tasks fa-2x fa-fw fa-inverse"></i></div>
                                </div>
                                <div class="flex-1 text-right md:text-center">
                                    <h5 class="font-bold uppercase text-gray-400">To Do List</h5>
                                    <h3 class="font-bold text-3xl text-gray-600">7 tasks</h3>
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
                                    <h5 class="font-bold uppercase text-gray-400">Issues</h5>
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
    
                    <div class="w-full md:w-1/2 p-3">
                        <!--Graph Card-->
                        <div class="bg-gray-900 border border-gray-800 rounded shadow">
                            <div class="border-b border-gray-800 p-3">
                                <h5 class="font-bold uppercase text-gray-600">Graph</h5>
                            </div>
                            <div class="p-5">
                                <canvas id="chartjs-0" class="chartjs" width="undefined" height="undefined"></canvas>
                                <script>
                                    new Chart(document.getElementById("chartjs-0"), {
                                        "type": "line",
                                        "data": {
                                            "labels": ["January", "February", "March", "April", "May", "June", "July"],
                                            "datasets": [{
                                                "label": "Views",
                                                "data": [65, 59, 80, 81, 56, 55, 40],
                                                "fill": false,
                                                "borderColor": "rgb(75, 192, 192)",
                                                "lineTension": 0.1
                                            }]
                                        },
                                        "options": {}
                                    });
                                </script>
                            </div>
                        </div>
                        <!--/Graph Card-->
                    </div>
    
                    <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                        <!--Graph Card-->
                        <div class="bg-gray-900 border border-gray-800 rounded shadow">
                            <div class="border-b border-gray-800 p-3">
                                <h5 class="font-bold uppercase text-gray-600">Graph</h5>
                            </div>
                            <div class="p-5">
                                <canvas id="chartjs-1" class="chartjs" width="undefined" height="undefined"></canvas>
                                <script>
                                    new Chart(document.getElementById("chartjs-1"), {
                                        "type": "bar",
                                        "data": {
                                            "labels": ["January", "February", "March", "April", "May", "June", "July"],
                                            "datasets": [{
                                                "label": "Likes",
                                                "data": [65, 59, 80, 81, 56, 55, 40],
                                                "fill": false,
                                                "backgroundColor": ["rgba(255, 99, 132, 0.2)", "rgba(255, 159, 64, 0.2)", "rgba(255, 205, 86, 0.2)", "rgba(75, 192, 192, 0.2)", "rgba(54, 162, 235, 0.2)", "rgba(153, 102, 255, 0.2)", "rgba(201, 203, 207, 0.2)"],
                                                "borderColor": ["rgb(255, 99, 132)", "rgb(255, 159, 64)", "rgb(255, 205, 86)", "rgb(75, 192, 192)", "rgb(54, 162, 235)", "rgb(153, 102, 255)", "rgb(201, 203, 207)"],
                                                "borderWidth": 1
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
    
                    <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                        <!--Graph Card-->
                        <div class="bg-gray-900 border border-gray-800 rounded shadow">
                            <div class="border-b border-gray-800 p-3">
                                <h5 class="font-bold uppercase text-gray-600">Graph</h5>
                            </div>
                            <div class="p-5"><canvas id="chartjs-4" class="chartjs" width="undefined"
                                    height="undefined"></canvas>
                                <script>
                                    new Chart(document.getElementById("chartjs-4"), {
                                        "type": "doughnut",
                                        "data": {
                                            "labels": ["P1", "P2", "P3"],
                                            "datasets": [{
                                                "label": "Issues",
                                                "data": [300, 50, 100],
                                                "backgroundColor": ["rgb(255, 99, 132)", "rgb(54, 162, 235)", "rgb(255, 205, 86)"]
                                            }]
                                        }
                                    });
                                </script>
                            </div>
                        </div>
                        <!--/Graph Card-->
                    </div>
    
                    <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                        <!--Template Card-->
                        <div class="bg-gray-900 border border-gray-800 rounded shadow">
                            <div class="border-b border-gray-800 p-3">
                                <h5 class="font-bold uppercase text-gray-600">Template</h5>
                            </div>
                            <div class="p-5">
    
                            </div>
                        </div>
                        <!--/Template Card-->
                    </div>
    
                    <div class="w-full p-3">
                        <!--Table Card-->
                        <div class="bg-gray-900 border border-gray-800 rounded shadow">
                            <div class="border-b border-gray-800 p-3">
                                <h5 class="font-bold uppercase text-gray-600">Table</h5>
                            </div>
                            <div class="p-5">
                                <table class="w-full p-5 text-gray-700">
                                    <thead>
                                        <tr>
                                            <th class="text-left text-gray-600">Name</th>
                                            <th class="text-left text-gray-600">Side</th>
                                            <th class="text-left text-gray-600">Role</th>
                                        </tr>
                                    </thead>
    
                                    <tbody>
                                        <tr>
                                            <td>Obi Wan Kenobi</td>
                                            <td>Light</td>
                                            <td>Jedi</td>
                                        </tr>
                                        <tr>
                                            <td>Greedo</td>
                                            <td>South</td>
                                            <td>Scumbag</td>
                                        </tr>
                                        <tr>
                                            <td>Darth Vader</td>
                                            <td>Dark</td>
                                            <td>Sith</td>
                                        </tr>
                                    </tbody>
                                </table>
    
                                <p class="py-2"><a href="#" class="text-white">See More issues...</a></p>
    
                            </div>
                        </div>
                        <!--/table Card-->
                    </div>
    
    
                </div>
    
                <!--/ Console Content-->
    
            </div>
    
    
        </div>
        <!--/container-->
    
    
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
