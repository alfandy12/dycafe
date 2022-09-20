<x-app-layouts title="Pesanan">
    <x-navbar-admin title="Pesanan"></x-navbar-admin>
        
        <h3 class="mt-20 text-center text-2xl text-purple-600 font-bold">Account</h3>
    
        <div class="flex flex-wrap overflow-hidden mb-5">
    
            <div class="w-full overflow-hidden sm:w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/2 mb-2 md:mb-0">
              <!-- Column Content -->
                
              </div>
            <div class="w-full overflow-hidden sm:w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/2">
              <!-- Column Content -->
              <form action="/admin-pesanan">
                @csrf
          <div class="flex justify-end mx-4 md:mr-4">
              <div class="form-control w-full md:w-1/2">
                <div class="flex space-x-2">
                  <input name="search" type="text" placeholder="Cari nomor pesanan" class="w-full input input-primary input-bordered" value="{{request('search')}}"> 
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
                      <th>No</th> 
                      <th>No Pesanan</th> 
                      <th>Harga Akhir</th> 
                      <th>Bayar</th> 
                      <th>Kembalian</th>
                      <th>Nama Kasir</th>
                      <th>Tanggal Dipesan</th>
                      <th>Aksi</th>
                    </tr>
                  </thead> 
                  <tbody>
                  @foreach ($orderings as $key => $ordering)
                      
                
                  <tr>
                    <th>{{$orderings->firstItem() + $key}}</th> 
                    <td>{{$ordering->no_pesanan}}</td>
                    <td>Rp. {{number_format($ordering->last_price,0,',','.')}}</td> 
                    <td>Rp. {{number_format($ordering->pay,0,',','.')}}</td>
                    <td>Rp. {{number_format($ordering->pay - $ordering->last_price,0,',','.')}}</td>
                    <td>{{$ordering->cashier_name}}</td> 
                    <td>{{date('D, M d, Y. h:i A', strtotime($ordering->date_order))}}</td>
                    <td><a href="/admin-pesanan/{{$ordering->id}}" x-show="hide" class="btn btn-sm btn-ghost mx-1">Detail</a></td>
                  </tr>
                  @endforeach
                  
                  </tbody>
                </table>
              </div>
        </div>
      <div class="mx-5">{{$orderings->links()}}</div>
  
</x-app-layouts>
