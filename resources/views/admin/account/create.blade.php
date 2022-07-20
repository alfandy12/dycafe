<x-app-layouts title="Account">
    <x-navbar-admin title="Account"></x-navbar-admin>

    <h3 class="text-center text-purple-600 mt-16 text-2xl font-bold">Tambah Account</h3>

  <div class="h-full w-11/12 md:w-1/3 block mx-auto rounded-lg mb-24 shadow-lg">
      <form action="/admin-account" method="POST">
          @csrf
        <br>

            <div class="form-control mx-4">
            <label class="label">
            <span class="label-text">Nama</span>
            </label> 
            <input type="text" value="{{old('name')}}" name="name" placeholder="Nama User"class="input input-primary input-bordered" autocomplete="off">
            @error('name')
            <small class="text-red-500">{{$message}}</small>
            @enderror
          </div> 

          <div class="form-control mx-4">
            <label class="label">
            <span class="label-text">Username</span>
            </label> 
            <input type="text" value="{{old('username')}}" name="username" placeholder="Username"class="input input-primary input-bordered" autocomplete="off">
            @error('username')
            <small class="text-red-500">{{$message}}</small>
            @enderror
          </div> 

          <div class="form-control mx-4">
            <label class="label">
            <span class="label-text">Password</span>
            </label> 
            <input type="password" name="password" placeholder="Password User"class="input input-primary input-bordered" autocomplete="off">
            @error('password')
            <small class="text-red-500">{{$message}}</small>
            @enderror
          </div> 

          <div class="form-control mx-4 mt-4">
            <select class="select select-bordered select-primary w-full" name="level">
                <option disabled="disabled" selected="selected">Pilih Level</option> 
                <option value="admin" {{ old('level') == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="user" {{ old('level') == 'user' ? 'selected' : '' }}>User</option>
            </select>
              @error('level')
              <small class="text-red-500">{{$message}}</small>
              @enderror
            </div> 
        
        
          <div class="modal-action mr-4 ">
            <button type="submit" class="btn btn-primary mb-2">Add</button>
          </div>
        </form>
  </div>


</x-app-layouts>