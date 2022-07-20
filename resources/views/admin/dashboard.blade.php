<x-app-layouts title="Dashboard">
    <x-navbar-admin title="Dashboard"></x-navbar-admin>

    <div class="mt-10"></div>
    <div class="flex flex-wrap overflow-hidden">
    
      <div class="w-full overflow-hidden md:w-1/2 lg:w-1/2 xl:w-3/4">
        <!-- Column Content -->
        <h3 class="mt-10 text-center text-purple-600 font-bold text-2xl">Total Pendapatan</h3>
        <div class="mx-5 mt-5">          
          <div class="overflow-x-auto shadow-lg rounded-md">
            <table class="table w-full rounded-md">
              <thead>
                <tr>
                  <th>No.</th> 
                  <th>Tahun</th> 
                  <th>Bulan</th> 
                  <th>Total</th>
                </tr>
              </thead> 
              <tbody>
                @foreach ($pendapatan as $key => $item)
                <tr class="hover">
                  <th>{{$pendapatan->firstItem() + $key}}</th> 
                  <td>{{$item->year}}</td> 
                  <td>{{$item->month}}</td> 
                  <td>Rp. {{number_format($item->total,0,',','.')}}</td>
                </tr>
                @endforeach


              </tbody>
            </table>
          </div>
        </div>
        <div class="mx-5">{{$pendapatan->links()}}</div>
      </div>

      <div class="w-full overflow-hidden md:w-1/2 lg:w-1/2 xl:w-1/4">

        <!-- Column Content -->
        <div class="grid place-content-center mt-5 mx-2 md:mx-2">
          <canvas id="myChart" style="width:50%;max-width:320px" class="mt-16 shadow-lg rounded-lg"></canvas>
        </div>
      </div>
    
    </div>
   



    <script>
     dataPopular = <?= json_encode($popular)?>;
     var kosongName = [];
     var kosonPopular = [];
     
     dataPopular.forEach(data => {
      kosongName.push(data.product_name);
      kosonPopular.push(data.popular);
    });
      var xValues = kosongName;
      var yValues = kosonPopular;

      var barColors = [
        "#9333ea",
        "#a3e635",
        "#22d3ee",
        "#f472b6",
        "#3730a3"
      ];
      
      new Chart("myChart", {
        type: "pie",
        data: {
          labels: xValues,
          datasets: [{
            backgroundColor: barColors,
            data: yValues
          }]
        },
        options: {
    title: {
      display: true,
      text: "Menu Terpopuler"
    }
  }
      });
      </script>

</x-app-layouts>