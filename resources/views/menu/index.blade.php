<x-app-layouts>
  <x-navbar-app title="Menu" count="{{$countOrders->count()}}"></x-navbar-app>

<h3 class="text-center text-2xl font-semibold text-purple-900 mt-20 mb-6">Menu</h3>

<div class="flex flex-wrap overflow-hidden mb-5">

  <div class="w-full overflow-hidden sm:w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/2 mb-2 md:mb-0">
    <!-- Column Content -->
    <div class="ml-4">
    <label for="my-modal-2" class="btn btn-primary modal-button">Kategori</label> 
    <input type="checkbox" id="my-modal-2" class="modal-toggle"> 
    <div class="modal">
      <div class="modal-box">
        @foreach ($categories as $category)
        <ul>
          
          <li><a href="/category/{{$category->id}}" class="text-xl hover:text-purple-500">{{$category->name}}</a></li>
        </ul>
        @endforeach
        <div class="modal-action">
          <label for="my-modal-2" class="btn">Close</label>
        </div>
      </div>
    </div>
  </div>


  </div>

  <div class="w-full overflow-hidden sm:w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/2 ">
    <!-- Column Content -->
    <form action="">
      @csrf
<div class="flex justify-end mx-4 md:mr-4">
    <div class="form-control w-full md:w-1/2">
      <div class="flex space-x-2">
        <input name="search" type="text" placeholder="Cari Menu" class="w-full input input-primary input-bordered" value="{{request('search')}}"> 
        <button class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16l2.879-2.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242zM21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg></button>
      </div>
    </div>
  </div>
</div>
</form>
  </div>

</div>


<!-- alert untuk adminonly atau memblokir selain admin masuk ke menu admin -->
<x-alert>
  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
    </svg>
  <x-slot name="flashmessage">adminOnly</x-slot>
</x-alert>

<!-- alert messeage menu berhasil di tambahin ke list
NOTE : Pakai Alert ini untuk alert sukses -->
<x-alert-guest>
  <x-slot name="successMessage">successOrder</x-slot>
</x-alert-guest>

<x-alert>
  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
  </svg>
  <x-slot name="flashmessage">emptyData</x-slot>
</x-alert>
    <div class="flex flex-wrap overflow-hidden">
  
      @foreach ($product as $item)
        <div class="w-full overflow-hidden sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/5 2xl:w-1/6">
          <!-- Column Content -->
        <form action="/get/{{$item->id}}" method="post">
            @csrf
          <div class="w-11/12 2xl:w-11/12 sm:w-60  overflow-hidden shadow-lg bg-lime-500 rounded-lg block mx-auto mb-4">
            <img class="w-full h-52 object-cover" src="{{ asset('assets/img/' . $item->image)}}">
            <div class="px-6 py-4">
              <div class="font-bold text-xl mb-2 text-white">{{ucwords($item->name)}}</div>
              <p class="text-base text-white">
                Rp. {{number_format($item->price,0,',','.')}}
              </p>
            </div>
            <div class="flex justify-end mr-4 mb-4">
              
                <button type="submit" class="btn btn-sm bg-lime-900 border-0 hover:bg-lime-700"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                    <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd" />
                  </svg> Beli</button>
            </div>
          </form>
          </div>
        </div>
        @endforeach
      
  </div>
<br>
<br>


</x-app-layouts>