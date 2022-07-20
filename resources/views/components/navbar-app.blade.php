    <!-- navbar -->
    <nav x-data="{show:false}"
        class="flex items-center justify-between flex-wrap bg-zinc-100 drop-shadow-md py-2 fixed top-0 w-full"
        style="z-index: 9999;">
        <div class="flex items-center flex-shrink-0">
            <h3 class="text-3xl font-bold ml-3 text-purple-700 font-mono">CafeAl</h3>
           </div>
        <div class="block mr-4 md:hidden">
            <button @click="show=!show"
                class="flex items-center px-3 py-2 border rounded text-purple-900 border-purple-900 hover:text-purple-900 hover:border-purple-900">
                <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <title>Menu</title>
                    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                </svg>
            </button>
        </div>

        <div @click.away="show = true" :class="{ 'block': show, 'hidden': !show }"
            class="w-full block flex-grow md:flex md:justify-end md:w-auto">
            <div class="flex flex-col md:flex-row ">
                <a href="/"
                    class="text-purple-900 font-semibold text-lg ml-3 mb-2 md:mb-2 md:ml-0 md:mr-5 mt-5 md:mt-3 hover:underline underline-offset-8 hover:text-purple-600 @if ($title == 'Menu') underline underline-offset-8 text-purple-600
                      
                    @endif"><svg
                    xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 inline -mt-1" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                    <path fill-rule="evenodd"
                        d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                        clip-rule="evenodd" />
                </svg>Menu</a>
                <a href="/pesanan"
                    class="text-purple-900 font-semibold text-lg ml-3 mb-2 md:mb-2 md:ml-0 md:mr-5 mt-2 md:mt-3 relative hover:underline underline-offset-8 hover:text-purple-600 @if ($title == 'Pesanan') underline underline-offset-8 text-purple-600
                      
                    @endif">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 inline -mt-1" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                        <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm9.707 5.707a1 1 0 00-1.414-1.414L9 12.586l-1.293-1.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                      </svg>@if ($count ?? '')<span class="absolute -left-1 -top-1 rounded-full bg-red-600 w-5 h-5 p-0 m-0 text-white font-semibold text-sm text-center">{{$count}}
                    </span>
                    @endif Pesanan</a>

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
                            href="/dashboard">Admin</a>
                            @endif
                           <form action="/logout" method="post"  class="block px-4 py-2 mt-2 rounded-lg hover:bg-gray-200">
                  @csrf
                  <button type="submit" class="text-sm font-semibold text-purple-900">Logout</button>
              </form>

              

                        </div>
                    </div>
                </div>
                <form action="/search-pesanan" class="mx-2">
                <div class="form-control ml-3 mb-2 md:mb-2 md:ml-0 md:mr-5 mt-2 md:mt-3">
                    <div class="flex space-x-2">
                      <input type="text" name="searchOrdering" placeholder="Cari Pesanan" class="w-full input input-sm input-primary input-bordered"> 
                      <button type="submit" class="btn btn-primary btn-sm"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16l2.879-2.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242zM21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                      </svg></button>
                    </div>
                  </div>
                </form>
            </div>
        </div>
        </div>
    </nav>