<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" integrity="sha384-yakM86Cz9KJ6CeFVbopALOEQGGvyBFdmA4oHMiYuHcd9L59pLkCEFSlr6M9m434E" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ URL::to('css/all.min.css') }}">
        <link rel="stylesheet" href="{{ URL::to('css/main.css') }}">
        {{-- <link rel="stylesheet" href="{{ URL::to('assets/css/bootstrap-datetimepicker.min.css') }}"> --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" integrity="sha384-Re/I8sla3AIFEoz6DrgkHWaLDSWKXaLOYm5yn3Gwmf/QhWS3/ajG7O2qr1zBmF3d" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" integrity="sha384-9IE49Wand+n6ztme8e7Gh51OalpKkPG5z23U2F7SicqKr5It9ttcDbg6dNlhYeTE" crossorigin="anonymous">
    </head>
    <body>
        @section('header')
            @include('includes.header')
        @show

        <div class="container">
            @yield('content')
        </div>

        @section('footer')
            @include('includes.footer')
        @stop

        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha384-ZvpUoO/+PpLXR1lu4jmpXWu80pZlYUAfxl5NsBMWOEPSjUn/6Z/hRTt8+pR6L4N2" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js" integrity="sha384-Q9RsZ4GMzjlu4FFkJw4No9Hvvm958HqHmXI9nqo5Np2dA/uOVBvKVxAvlBQrDhk4" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.25.3/moment.min.js" integrity="sha384-ySrEbOp7T9y6pygYlZhvZEqp/JcUPRQai0tk1AXpjM70UdNPTGyAT7MqcApeA7OY" crossorigin="anonymous"></script>
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha384-duAtk5RV7s42V6Zuw+tRBFcqD8RjRKw6RFnxmxIj1lUGAQJyum/vtcUQX8lqKQjp" crossorigin="anonymous"></script> --}}
        {{-- <link rel="stylesheet" href="{{ URL::to('assets/js/bootstrap-datetimepicker.min.js') }}"> --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/js/tempusdominus-bootstrap-4.min.js" integrity="sha384-97pmbvZb0qdIXSwrjd4JuG6+4TJhp4eL0totTka0FF1Bf2E42dPiSXsqq09yQxjD" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js" integrity="sha384-RxzVJNpULMjRDJ3nd+aAVYb11VBDmhgIonMdvYdLxYvylOdEl6pprk4R4PK0t3xG" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js" integrity="sha384-XS84aqWsn4cbfnAhdoO7kFSYtPxyAx70hgIXAzIzEtzPI1WL5g99awOOAhsmnetW" crossorigin="anonymous"></script>

        @yield('script')

        @section('location-selector')
            @include('front.movie.modal')
        @show

        @section('header-script')
            <script>
                $('a#branch-selector').click(() => {
                    $('div#location-selector').data('backdrop', '');
                });
            </script>
        @show
    </body>
</html>