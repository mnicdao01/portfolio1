@include('partials._head')
@include('partials._nav')

   <div class="container">

        @include('partials._messages')
        @yield('content')
         <hr>
         <p class="text-center"> Copyright</p>
   </div>

@include('partials._footer')