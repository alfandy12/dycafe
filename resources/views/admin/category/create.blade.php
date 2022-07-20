<x-app-layouts title="Category">
    <x-navbar-admin title="Category"></x-navbar-admin>
        
        <h3 class="mt-20 text-center text-2xl text-purple-600 font-bold">Ubah Category</h3>

        <div class="h-full w-11/12 md:w-1/3 block mx-auto rounded-lg mb-24 shadow-lg">
            <form action="/admin-category" method="POST">
                @csrf
              <br>
                <div class="form-control mx-4">
                  <label class="label">
                    <span class="label-text">Nama Category</span>
                  </label> 
                    <input type="text" name="name" placeholder="Nama Category"class="input input-primary input-bordered" autocomplete="off">
                  @error('name')
                  <small class="text-red-500">{{$message}}</small>
                  @enderror
                </div> 
              
                <div class="modal-action mr-4 ">
                  <button type="submit" class="btn btn-primary mb-2">Add</button>
                </div>
              </form>
        </div>
  
</x-app-layouts>