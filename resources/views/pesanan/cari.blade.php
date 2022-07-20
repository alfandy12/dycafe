<x-app-layouts>
    <x-navbar-app title="search-pesanan"></x-navbar-app>

<h3 class="text-center text-2xl font-semibold text-purple-900 mt-20 mb-6">Pesanan Nomor {{$nomorPesanan}}</h3>

<div class="w-4/6 mx-auto overflow-hidden shadow-lg bg-lime-500 rounded-lg block mb-4">
 
    <div class="px-6 py-4">
        <table class="text-white font-bold table-auto">
            
           @foreach ($detail as $item)
            <tr class="border border-white">
                <td class="p-2">{{$item->product_name}}</td>
                <td class="p-2">&nbsp;:&nbsp;{{$item->product_price}}</td>
                <td class="p-2">{{$item->quantity}}</td>
                <td class="p-2">{{$item->total_price}}</td>
            </tr>
            @endforeach
            <tr><td><br></td></tr>
            <tr>
                <td>Bayar</td>
                <td>&nbsp;:&nbsp;{{number_format($item->ordering->pay,0,',','.')}}</td>
            </tr>
            <tr>
                <td>Total Harga</td>
                <td>&nbsp;:&nbsp;{{number_format($item->ordering->last_price,0,',','.')}}</td>
            </tr>
            <tr>
                <td>Kembalian</td>
                @php
                    $exchange = $item->ordering->pay - $item->ordering->last_price ;
                @endphp
                <td>&nbsp;:&nbsp;{{number_format($exchange,0,',','.')}}</td>
            </tr>
            <tr>
                <td>Tanggal Pembelian</td>
                <td>&nbsp;:&nbsp;{{date('D M d, Y h:i a', strtotime($item->ordering->date_order))}}</td>
            </tr>
            <tr>
                <td>Nama Kasir</td>
                <td>&nbsp;:&nbsp;{{$item->ordering->cashier_name}}</td>
            </tr>
        </table>
        <div class="sm:flex grid justify-items-center sm:justify-end mr-4 my-4">
            <a href="/" class="mb-3 sm:mb-0 btn btn-sm bg-lime-600 border-0 hover:bg-lime-900 mr-1">Back To Menu</a>
            <a href="/print/{{ $item->ordering_id}}" class=" btn btn-sm bg-lime-900 border-0 hover:bg-lime-700">Print Struk</a>
            
        </div>
    </div>
</div>

</x-app-layouts>