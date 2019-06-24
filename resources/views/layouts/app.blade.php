<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('includes.head')
<body>
    <div id="app">
        @include('includes.nav')
        <main class="py-4">
                <div class="container">
                        <div class="row justify-content-center">
                          @include('includes.sidebar')          
                          <div class="col-md-9">
                                @yield('content')
                            
                        </div>
                    </div>
                </div>
        </main>
    </div>
</body>
</html>
