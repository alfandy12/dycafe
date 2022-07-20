<!doctype html>
<html class="bg-gradient-to-r from-purple-600 to-purple-400">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
<title>{{ config('app.name') }}</title>
<script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
<h3 class="text-center font-mono font-bold text-4xl text-white my-10">CafeAl</h3>
  <div class="backdrop-blur-md bg-white/30 h-full w-11/12 md:w-1/3 block mx-auto rounded-lg">
   
    <!-- alert -->
    <x-alert>
      <!-- icon alert -->
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
    </svg>
    <!-- flashmessage -->
    <x-slot name="flashmessage">logoutSuccess</x-slot>
    
  </x-alert>

      <!-- alert -->
      <x-alert>
        <!-- icon alert -->
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
        </svg>
      <!-- flashmessage -->
      <x-slot name="flashmessage">loginError</x-slot>
      
    </x-alert>
<form action="/login" method="post">
  @csrf
      <div class="form-control mx-5">
          <label class="label">
            <span class="label-text text-white font-semibold text-lg mt-5">Username</span>
          </label> 
          <input type="text" name="username" placeholder="username" class="input input-bordered">
        </div>
        @error('username')
      <small class="ml-5 text-white">{{$message}}</small>
        @enderror

        <div class="form-control mt-5 mx-5">
          <label class="label">
            <span class="label-text text-white font-semibold text-lg">Password</span>
          </label> 
          <input type="password" name="password" placeholder="password" class="input input-bordered">
        </div>
        @error('password')
        <small class="ml-5 text-white">{{$message}}</small>
          @enderror
        <div class="flex justify-end mr-5  mt-4">
          <button type="submit" class="btn bg-purple-600 hover:bg-purple-800 border-0 hover: py-3 px-4 mb-5">Login</button>
        </div>
      </form>
  </div>

  <small class="block mx-auto text-center text-white my-4">&copy;2021 CafeAl</small>

</body>
</html>
<!-- ini untuk layouts -->

