<x-app-layouts title="Menu">
    <x-navbar-admin title="Menu"></x-navbar-admin>

    <h3 class="text-center text-purple-600 mt-16 text-2xl font-bold">Ubah Menu</h3>

  <div class="h-full w-11/12 md:w-1/3 block mx-auto rounded-lg mb-24 shadow-lg">
      <form action="/admin-menu/{{$product->id}}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
        <br>
          <div class="form-control mx-4">
          <select class="select select-bordered select-primary w-full" name="category">
              <option disabled="disabled" selected="selected">Pilih Jenis</option> 
              @foreach ($categories as $category)
              
              <option value="{{$category->id}}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>{{$category->name}}</option>
              @endforeach
          </select>
            @error('category')
            <small class="text-red-500">{{$message}}</small>
            @enderror
          </div> 
      
          <div class="form-control mx-4">
            <label class="label">
            <span class="label-text">Nama</span>
            </label> 
            <input type="text" name="name" placeholder="nama product" value="{{$product->name}}" class="input input-primary input-bordered" autocomplete="off">
            @error('name')
            <small class="text-red-500">{{$message}}</small>
            @enderror
          </div> 
      
          <div class="form-control mx-4">
            <label class="label">
            <span class="label-text">Harga</span>
            </label>   
      
            <input type="text" name="price" value="{{$product->price}}" placeholder="harga product" class="input input-primary input-bordered" id="inputku" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" autocomplete="off">
            @error('price')
            <small class="text-red-500">{{$message}}</small>
            @enderror
          </div> 
      
          <img src="{{asset('assets/img/'.$product->image)}}" id="pic" height="300" width="300" class="object-cover mx-auto block my-1 md:my-5"/>
          <div class="flex justify-center">
            <div class="mb-3 w-96">
              <input type="hidden" name="deleteOldImage" value="{{$product->image}}">
              <input name="image" oninput="pic.src=window.URL.createObjectURL(this.files[0])" type="file" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="file" id="formFile">
              @error('image')
                <small class="text-red-500">{{$message}}</small>
              @enderror
            </div>
          </div>
        
          <div class="modal-action mr-4 ">
            <button type="submit" class="btn btn-primary mb-2">Add</button>
          </div>
        </form>
  </div>


</x-app-layouts>