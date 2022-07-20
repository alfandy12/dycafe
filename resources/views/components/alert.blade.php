@if (session()->has(''. $flashmessage. ''))
<br>
<div class="alert backdrop-blur-md bg-white/50 mx-5 my-2">
    <div class="flex-1 text-purple-800">
        {{$slot}}
      
        <label>{{ session(''. $flashmessage. '')}}</label>
    </div>
  </div>
  @endif