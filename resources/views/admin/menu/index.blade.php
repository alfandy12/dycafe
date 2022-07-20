<x-app-layouts title="Menu">
<x-navbar-admin title="Menu"></x-navbar-admin>

<h3 class="mt-20 text-center text-2xl text-purple-600 font-bold">Menu List</h3>

<div class="flex flex-wrap overflow-hidden mb-5">
  
  <div class="w-full overflow-hidden sm:w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/2 mb-2 md:mb-0">
    <!-- Column Content -->
    <label for="my-modal-2" class="btn btn-primary modal-button ml-4">Tambah Menu</label> 
    <input type="checkbox" id="my-modal-2" class="modal-toggle"> 
    <div class="modal">
      <div class="modal-box">
        <form action="/admin-menu" method="POST" enctype="multipart/form-data">
          @csrf

          <div class="form-control">
          <select class="select select-bordered select-primary w-full" name="category">
              <option disabled="disabled" selected="selected">Pilih Jenis</option> 
              @foreach ($categories as $category)
              <option value="{{$category->id}}" {{ old("category") == $category->id ? "selected":"" }}>{{$category->name}}</option>
              @endforeach
          </select>
            @error('category')
            <small class="text-red-500">{{$message}}</small>
            @enderror
          </div> 

          <div class="form-control">
            <label class="label">
            <span class="label-text">Nama</span>
            </label> 
            <input type="text" name="name" placeholder="nama product" value="{{old('name')}}" class="input input-primary input-bordered" autocomplete="off">
            @error('name')
            <small class="text-red-500">{{$message}}</small>
            @enderror
          </div> 
      
          <div class="form-control">
            <label class="label">
            <span class="label-text">Harga</span>
            </label>   
            <input type="text" name="price" placeholder="harga product" class="input input-primary input-bordered" id="inputku" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" autocomplete="off">
            @error('price')
            <small class="text-red-500">{{$message}}</small>
            @enderror
          </div> 
          <img id="pic" height="100" width="100" class="mx-auto block my-1 md:my-5"/>
          <div class="flex justify-center">
            <div class="mb-3 w-96">
              <input name="image" oninput="pic.src=window.URL.createObjectURL(this.files[0])" type="file" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="file" id="formFile">
              @error('image')
                <small class="text-red-500">{{$message}}</small>
              @enderror
            </div>
          </div>
        
          <div class="modal-action">
            <button type="submit" class="btn btn-primary">Add</button>
            <label for="my-modal-2" class="btn">Close</label> 
          </div>
        </form>
        </div>
      </div>
    </div>
  <div class="w-full overflow-hidden sm:w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/2">
    <!-- Column Content -->
    <form action="/admin-menu">
      @csrf
<div class="flex justify-end mx-4 md:mr-4">
    <div class="form-control w-full md:w-1/2">
      <div class="flex space-x-2">
        <input name="search" type="text" placeholder="Cari Nama Menu" class="w-full input input-primary input-bordered" value="{{request('search')}}"> 
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
<div class="mx-4">

  <x-alert-guest successMessage="success"></x-alert-guest>
<div class="overflow-x-auto">
    <table class="table w-full">
      <thead>
        <tr>
          <th>No</th> 
          <th>Jenis</th>
          <th>Nama</th> 
          <th>Gambar</th>
          <th>Harga</th> 
          <th>Aksi</th>

        </tr>
      </thead> 
      <tbody>
          @foreach ($products as $product)    
          <tr>
          <th>{{$loop->iteration}}</th> 
          <td>{{$product->category->name}}</td> 
          <td>{{$product->name}}</td> 
          <td><img src="{{asset('assets/img/' .$product->image)}}" class="h-14 w-26 md:h-24 md:w-32 object-cover rounded-md" alt=""></td>
          <td>Rp. {{number_format($product->price,0,',','.')}}</td>
          <td>
            <div x-data="{ initial: true, deleting: false, hide: true }" class="text-sm flex items-center">
              <button
              @click="hide = !hide"
                  x-on:click.prevent="deleting = true; initial = false"
                  x-show="initial"
                  x-on:deleting.window="$el.disabled = true"
                  x-transition:enter="transition ease-out duration-150"
                  x-transition:enter-start="opacity-0 transform scale-90"
                  x-transition:enter-end="opacity-100 transform scale-100"
                  class="btn btn-sm btn-error">
                  Hapus
              </button>

              <a href="/admin-menu/{{ $product->id}}/edit" x-show="hide" class="btn btn-sm btn-accent mx-1">Ubah Data</a>
            
              <div
                  x-show="deleting"
                  x-transition:enter="transition ease-out duration-150"
                  x-transition:enter-start="opacity-0 transform scale-90"
                  x-transition:enter-end="opacity-100 transform scale-100"
                  x-transition:leave="transition ease-in duration-150"
                  x-transition:leave-start="opacity-100 transform scale-100"
                  x-transition:leave-end="opacity-0 transform scale-90"
                  class="flex items-center space-x-3"
              >
                  <span class="dark:text-white">Anda Yakin Ingin Menghapus Menu ini?</span>
            
                  <form x-on:submit="" method="post" action="/admin-menu/{{$product->id}}">
                      @csrf
                      @method('DELETE')
            
                      <button
                          x-on:click="$el.form.submit()"
                          x-on:deleting.window="$el.disabled = true"
                          type="submit"
                          class="btn btn-sm btn-error">
                          Iya
                      </button>
            
                      <button @click="hide = !hide"
                          x-on:click.prevent="deleting = false; setTimeout(() => { initial = true }, 150)"
                          x-on:deleting.window="$el.disabled = true"
                          class="btn btn-sm">
                          Tidak
                      </button>
                  </form>
               
              </div>
            </div>
           
          </td>

       
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>


<div class="mx-5">{{ $products->links() }}</div>


</x-app-layouts>