<x-app-layouts title="Category">
    <x-navbar-admin title="Category"></x-navbar-admin>
        
        <h3 class="mt-20 text-center text-2xl text-purple-600 font-bold">Detail Pesanan</h3>
        <a href="/admin-category/create" class="btn btn-primary ml-4">Tambah Category</a>
        <div class="mx-5">
            <small>Note : Jika kamu menghapus kategori maka menu yang terhubung dengan katagori akan terhapus otomatis</small>
            <div class="overflow-x-auto">
                <table class="table w-full">
                  <thead>
                    <tr>
                      <th>No</th> 
                      <th>Nama Category</th> 
                      <th>Aksi</th>
                    </tr>
                  </thead> 
                  <tbody>
                  @foreach ($categories as $category)
                  <tr>
                    <th>{{$loop->iteration}}</th> 
                   <td>{{$category->name}}</td>
                   <td><div x-data="{ initial: true, deleting: false, hide: true }" class="text-sm flex items-center">
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
      
                    <a href="/admin-category/{{ $category->id}}/edit" x-show="hide" class="btn btn-sm btn-accent mx-1">Ubah Data</a>
                  
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
                        <span class="dark:text-white">Anda Yakin Ingin Menghapus Kategori ini?</span>
                  
                        <form x-on:submit="" method="post" action="/admin-category/{{$category->id}}">
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

                  @endforeach
                  
                  </tbody>
                </table>
              </div>
        </div>

  
</x-app-layouts>