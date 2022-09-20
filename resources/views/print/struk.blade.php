<!DOCTYPE html>
<title>Print Struk</title>
<head>
    <style>
        @page { 
            size: 5.4cm;
            margin-left: 5px;
            margin-right: 1px;
            margin-top: 2px;
            font-size: 10px
            }
            .title {
                text-align: center;
                font-weight: bold;
                font-size: 25px;
            }
            .flast-right {
                display: flex;
                justify-items: end;
            }
            .text-center {
                text-align: center;
            }
            .tg  {
            border-collapse:collapse;border-spacing:0;}
        .tg td{font-size:10px;
          overflow:hidden;padding:3px 3px;word-break:normal;}
        .tg th{font-size:10px;
          font-weight:normal;overflow:hidden;padding:3px 3px;word-break:normal;}
        .tg .tg-0pky{text-align:left;vertical-align:top}
        .tg .tg-dvpl{text-align:right;vertical-align:top}
      </style>
</head>
<body>
    <div class="title">CafeAl</div>
    <p class="text-center">Jl. Isekai Nomor 12, Negara Word Edge</p>
    <div class="text-center">==========================</div>
        <table class="tg" style="undefined;table-layout: fixed; width: 200px">
        <colgroup>
        <col style="width: 70px">
        <col style="width: 12px">
        <col style="width: 33px">
        <col style="width: 40px">
        </colgroup>
        <tbody>
          @foreach ($detail as $list)
            <tr>
                <td class="tg-0pky">{{ucwords($list->product_name)}}</td>
                <td class="tg-dvpl">{{$list->quantity}}</td>
                <td class="tg-dvpl">{{number_format($list->product_price,0,',','.')}}</td>
                <td class="tg-dvpl">{{number_format($list->total_price,0,',','.')}}</td>
              </tr>
              @endforeach
        </tbody>
        </table>
        <div class="text-center">==========================</div>

        <table class="tg" style="undefined;table-layout: fixed; width: 200px">
            <colgroup>
              <col style="width: 70px">
              <col style="width: 12px">
              <col style="width: 33px">
              <col style="width: 40px">
            </colgroup>
            <tbody>
                <tr>
                    <td class="tg-0pky">Total Pesanan</td>
                    <td class="tg-dvpl">{{$detail->count()}}</td>
                    <td class="tg-dvpl"></td>
                  </tr>
                <tr style=" text-align: center;
                font-weight: bold;
                font-size: 10px;">
                  <td class="tg-0pky">Total Harga</td>
                  <td class="tg-dvpl"></td>
                  <td class="tg-dvpl">{{number_format($list->ordering->last_price,0,',','.')}}</td>
                </tr>
                <tr>
                  <td class="tg-0lax">Tunai</td>
                  <td class="tg-0lax"></td>
                  <td class="tg-dvpl">{{number_format($list->ordering->pay,0,',','.')}}</td>
                </tr>
                <tr>
                  <td class="tg-0lax">Kembalian</td>
                  <td class="tg-0lax"></td>
                  @php
                     $exchange = $list->ordering->pay - $list->ordering->last_price
                  @endphp
                  <td class="tg-dvpl">{{ number_format($exchange,0 ,',', '.') }}</td>
                </tr>
              </tbody>

            </table>
            <div class="text-center">==========================</div>
            <table class="tg" style="undefined;table-layout: fixed; width: 200px">
                <colgroup>
                  <col style="width: 70px">
                  <col style="width: 12px">
                  <col style="width: 33px">
                  <col style="width: 40px">
                </colgroup>
                <tbody>
                <tr>
                    <td class="tg-0lax">Kasir</td>
                    <td class="tg-dvpl">{{$list->ordering->cashier_name}}</td>
                  </tr>
                  <tr>
                    <td class="tg-0lax">Tanggal Pembelian</td>
                    <td class="tg-dvpl">{{date('D M d, Y h:i a', strtotime($list->ordering->date_order))}}</td>
                  </tr>
                  <tr>
                    <td class="tg-0lax">ID Pembayaran</td>
                    <td class="tg-dvpl">{{$list->ordering->no_pesanan}}</td>
                  </tr>
                  </tbody>
    
                </table>
            <table>
            <tr>
           
            </table>
            <p class="text-center">Terimakasih sudah membeli makanan di cafe kami. <br> kami tunggu kedatangannya kembali.</p>

</body>
</html> 
