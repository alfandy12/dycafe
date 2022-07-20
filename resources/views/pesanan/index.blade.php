<x-app-layouts title="Pesanan">
<x-navbar-app title="Pesanan" count="{{$orders->count()}}"></x-navbar-app>

     <!-- konten -->

     <h3 class="text-center text-2xl font-semibold text-purple-900 mt-20 mb-6">Pesanan</h3>
    
     <div class="flex flex-wrap overflow-hidden">
 
         <div class="w-full overflow-hidden md:w-1/2 lg:w-1/2 xl:w-2/3">
             <!-- Column Content -->
             <div class="overflow-x-auto mx-2">
                 <table class="table w-full">
                     <thead>
                         <tr>
                             <th></th>
                             <th>Nama</th>
                             <th>Harga</th>
                             <th>jumlah pesanan</th>
                             <th>Jumlah</th>
                             <th>Aksi</th>
                         </tr>
                     </thead>
                     <tbody>
                        @forelse ($orders as $order)
                        <tr>
                            <th>{{$loop->iteration}}</th>
                            <td>{{ucwords($order->product->name)}}</td>
                            <td>{{number_format($order->product->price,0,',','.')}}</td>         
                            <td>
                                <form action="/edit-order/{{$order->id}}" method="post" class="inline block">
                                    @csrf
                                    @method('PUT')
                                    
                                    <input type="number" name="quantity" class="w-16 shadow-md input input-sm input-primary input-bordered" value="{{$order->quantity}}">
                                    <button type="submit" class="btn btn-outline btn-error btn-sm inline">
                                       Ubah
                                    </button>
                                </form>                    
                            </td>
                            <td>{{number_format($order->total_price,0,',','.')}}</td>
                            <td>
                                <form action="/remove/{{$order->id}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline btn-error btn-sm ">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" /></svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <h3 class="text-center font-bold text-xl">Daftar Pesanan Kosong!</h3>
                        @endforelse
               </tbody>
                 </table>
             </div>
         </div>
 
         <div class="w-full overflow-hidden md:w-1/2 lg:w-1/2 xl:w-1/3">
             <!-- Column Content -->
             <div class="w-11/12 mx-auto overflow-hidden shadow-lg bg-lime-500 rounded-lg block mb-4">
 
                 <div class="px-6 py-4">
                     <table class="text-white font-bold">
                        
                         <tr>
                             <td>Total Harga</td>
                             <td>&nbsp;:&nbsp;{{number_format($lastPrice,0,',','.')}}</td>
                         </tr>
                        <tr>
                            <td>Bayar</td>
                            <td>&nbsp;:&nbsp;Rp.&nbsp;<input class="text-gray-800 rounded-sm pl-2 w-6/12 font-semibold outline-0" id="inputku" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);"></td>
                        </tr>
                     </table>
                     <div class="sm:flex grid justify-items-center sm:justify-end mr-4 my-4">
                         <form action="/removeAll">
                             @csrf
                             @method('DELETE')
                         <button type="submit" class="mb-3 sm:mb-0 btn btn-sm bg-lime-600 border-0 hover:bg-lime-900 mr-1"><svg
                                 xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                 fill="currentColor">
                                 <path fill-rule="evenodd"
                                     d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                     clip-rule="evenodd" />
                             </svg> Hapus semua</button>
                            </form>
                            <form action="/pesan-menu" method="post">
                            @csrf
                            <input type="hidden" name="lastprice" value="{{$lastPrice}}">
                            <input type="hidden" name="pay" id="demo">
                                <button onclick="myFunction()" type="submit" class="btn btn-sm bg-lime-900 border-0 hover:bg-lime-700"><svg
                                        xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                                        <path fill-rule="evenodd"
                                            d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                                            clip-rule="evenodd" />
                                    </svg> Pesan</button>
                            </form>
                     </div>
                 </div>
             </div>
         </div>
 
     </div>

</x-app-layouts>