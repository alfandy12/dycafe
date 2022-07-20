<x-app-layouts>
    <x-navbar-app title="Pesanan"></x-navbar-app>
    <div class="mt-20"></div>

   
    <div class="card shadow-lg mx-5">
        <div class="card-body">
          <h2 class="card-title text-center">Pesanan telah berhasil di buat</h2> 
          <p>Mohon berikan kembalian sebesar Rp.&nbsp;{{number_format($exchange,0 ,',', '.')}}</p>
          <p>Dan berikan print struk kepada pelanggan</p>

          <div class="card-actions">
            <a href="/" class="btn btn-primary">Back to Menu</a> 
            <a href="/print/{{ session('idDetailOrder')}}" class="btn btn-ghost">Print Struk</a>
          </div>
        </div>
      </div>
</x-app-layouts>