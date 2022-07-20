<x-app-layouts title="Account">
    <x-navbar-admin title="Account"></x-navbar-admin>
    
    <h3 class="mt-20 text-center text-2xl text-purple-600 font-bold">Account</h3>

    <div class="flex flex-wrap overflow-hidden mb-5">

        <div class="w-full overflow-hidden sm:w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/2 mb-2 md:mb-0">
          <!-- Column Content -->
             <a href="/admin-account/create" class="btn btn-primary ml-5">Tambah Account</a>
          </div>
        <div class="w-full overflow-hidden sm:w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/2">
          <!-- Column Content -->
          <form action="/admin-account">
            @csrf
      <div class="flex justify-end mx-4 md:mr-4">
          <div class="form-control w-full md:w-1/2">
            <div class="flex space-x-2">
              <input name="search" type="text" placeholder="Cari Nama Account" class="w-full input input-primary input-bordered" value="{{request('search')}}"> 
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
<x-alert-guest successMessage="doneDelete"></x-alert-guest>
    <div class="mx-5">
        <div class="overflow-x-auto">
            <table class="table w-full">
              <thead>
                <tr>
                  <th></th> 
                  <th>Level</th> 
                  <th>Name</th> 
                  <th>Username</th> 
                  <th>Dibuat</th>
                  <th>Aksi</th>
                </tr>
              </thead> 
              <tbody>
              @foreach ($accounts as $account)
              <tr>
                <th>1</th> 
                <td>{{$account->level}}</td>
                <td>{{$account->name}}</td> 
                <td>{{$account->username}}</td> 
                <td>{{date('D, M d, Y. h:i A', strtotime($account->created_at))}}</td>
                <td>           <div x-data="{ initial: true, deleting: false, hide: true }" class="text-sm flex items-center">
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

              <a href="/admin-account/{{ $account->id}}/edit" x-show="hide" class="btn btn-sm btn-accent mx-1">Ubah Data</a>
            
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
                  <span class="dark:text-white">Anda Yakin Ingin Menghapus Account ini?</span>
            
                  <form x-on:submit="" method="post" action="/admin-account/{{$account->id}}">
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
            </div></td>
              </tr>
              @endforeach
              
              </tbody>
            </table>
          </div>
    </div>
  <div class="mx-5">{{$accounts->links()}}</div>
</x-app-layouts>