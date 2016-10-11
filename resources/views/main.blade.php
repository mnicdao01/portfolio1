@include('partials._head')
@include('partials._nav')

   <div class="container">
        @yield('content')
         <hr>
         <p class="text-center"> Copyright</p>
   </div>

@include('partials._footer')