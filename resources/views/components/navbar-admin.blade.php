    <!-- navbar -->
    <nav x-data="{show:false}"
        class="flex items-center justify-between flex-wrap bg-white drop-shadow-md py-1 fixed top-0 w-full"
        style="z-index: 9999;">
        <div class="flex items-center flex-shrink-0">
         <h3 class="text-3xl font-bold ml-3 text-purple-700 font-mono">CafeAl</h3>
        </div>
        <div class="block mr-4 md:hidden">
            <button @click="show=!show"
                class="flex items-center px-3 py-2 border rounded text-purple-700 border-purple-700 hover:text-purple-700 hover:border-purple-700">
                <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <title>Menu</title>
                    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                </svg>
            </button>
        </div>

        <div @click.away="show = true" :class="{ 'block': show, 'hidden': !show }"
            class="w-full block flex-grow md:flex md:justify-end md:w-auto">
            <div class="flex flex-col md:flex-row ">
                <a href="/dashboard"
                    class="text-purple-700 font-semibold text-lg ml-3 mb-2 md:mb-2 md:ml-0 md:mr-5 mt-5 md:mt-3 hover:underline underline-offset-8 decoration-2 @if ($title == 'Dashboard') underline underline-offset-7
                      
                    @endif">Dashboard</a>
                    <a href="/admin-category"
                    class="text-purple-700 font-semibold text-lg ml-3 mb-2 md:mb-2 md:ml-0 md:mr-5 mt-2 md:mt-3 relative hover:underline underline-offset-8 decoration-2 @if ($title == 'Category') underline underline-offset-7
                      
                    @endif">Category</a>
                    <a href="/admin-menu"
                    class="text-purple-700 font-semibold text-lg ml-3 mb-2 md:mb-2 md:ml-0 md:mr-5 mt-2 md:mt-3 relative hover:underline underline-offset-8 decoration-2 @if ($title == 'Menu') underline underline-offset-7
                      
                    @endif">Menu</a>
                    
                    <a href="/admin-pesanan"
                    class="text-purple-700 font-semibold text-lg ml-3 mb-2 md:mb-2 md:ml-0 md:mr-5 mt-2 md:mt-3 relative hover:underline underline-offset-8 decoration-2 @if ($title == 'Pesanan') underline underline-offset-7
                      
                    @endif">Pesanan</a>

                <a href="/admin-account"
                    class="text-purple-700 font-semibold text-lg ml-3 mb-2 md:mb-2 md:ml-0 md:mr-5 mt-2 md:mt-3 relative hover:underline underline-offset-8 decoration-2 @if ($title == 'Account') underline underline-offset-7
                      
                    @endif">Account</a>


                <div @click.away="open = false" class="relative mt-2" x-data="{ open: false }">
                    <button @click="open = !open"
                        class="text-purple-900 font-semibold text-lg ml-3 mb-2 md:mb-2 md:ml-0 md:mr-2 mt-0 md:mt-1 inline">
                        <span>{{ Str::words(Auth::user()->name, 1, '')}}</span>
                        <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}"
                            class="inline w-4 h-4 mt-1 transition-transform duration-200 transform md:-mt-1">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <div x-show="open" x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="transform opacity-0 scale-95"
                        x-transition:enter-end="transform opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="transform opacity-100 scale-100"
                        x-transition:leave-end="transform opacity-0 scale-95"
                        class="absolute right-0 w-full md:w-40 mt-2 origin-top-right rounded-md shadow-lg z-50">
                        <div class="px-2 py-2 bg-white rounded-md shadow">
                            @if (Auth::user()->level == 'admin')
                            <a class="block px-4 py-2 mt-2 text-sm font-semibold rounded-lg hover:bg-gray-200 text-purple-900"
                            href="/">Home</a>
                            @endif
                           <form action="/logout" method="post"  class="block px-4 py-2 mt-2 rounded-lg hover:bg-gray-200">
                  @csrf
                  <button type="submit" class="text-sm font-semibold text-purple-900">Logout</button>
              </form>

              

                        </div>
                    </div>
                </div>

            </div>
        </div>
        </div>
    </nav>