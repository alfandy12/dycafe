<x-app-layouts title="Pesanan">
    <x-navbar-admin title="Pesanan"></x-navbar-admin>
        
        <h3 class="mt-20 text-center text-2xl text-purple-600 font-bold">Detail Pesanan</h3>

        <div class="mx-5">
            <div class="overflow-x-auto">
                <table class="table w-full">
                  <thead>
                    <tr>
                      <th>No</th> 
                      <th>Nama Menu</th> 
                      <th>Harga Menu</th> 
                      <th>Jumlah</th> 
                      <th>Total Harga</th>
                      <th>Nama Kasir</th>
                      <th>Tanggal Dipesan</th>
                    </tr>
                  </thead> 
                  <tbody>
                  @foreach ($getDetail as $detail)
                  <tr>
                    <th>{{$loop->iteration}}</th> 
                  <td>{{$detail->product_name}}</td>
                  <td>Rp. {{number_format($detail->product_price,0,',','.')}}</td>
                  <td>{{$detail->quantity}}</td>
                  <td>Rp. {{number_format($detail->total_price,0,',','.')}}</td>
                  <td>{{$detail->ordering->cashier_name}}</td>
                    <td>{{date('D, M d, Y. h:i A', strtotime($detail->ordering->date_order))}}</td>
                  
                  </tr>
                  @endforeach
                  
                  </tbody>
                </table>
              </div>
        </div>

  
</x-app-layouts>