@extends('admin.layouts.master')

@section('page')
Dashboard
@endsection

@section('content')
<div class="row">
    <div class="col-lg-3 col-sm-6">
        <div class="card">
            <div class="content">
                <div class="row">
                    <div class="col">
                        <div class="icon-big icon-warning text-center float-left">
                            <i class="fad fa-camera-movie"></i>
                        </div>
                    </div>
                    <div class="col">
                        <div class="numbers">
                            <p>Studio</p>
                            {{$studio->count()}}
                        </div>
                    </div>
                </div>
                <div class="footer">
                    <hr />
                    <div class="stats">
                        <a href="{{url('/admin/studio')}}">
                            <i class="fad fa-info-square"></i> Details
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="card">
            <div class="content">
                <div class="row">
                    <div class="col">
                        <div class="icon-big icon-success text-center float-left">
                            <i class="fad fa-film-alt"></i>
                        </div>
                    </div>
                    <div class="col">
                        <div class="numbers">
                            <p>Movies</p>
                            {{$movies->count()}}
                        </div>
                    </div>
                </div>
                <div class="footer">
                    <hr />
                    <div class="stats">
                        <a href="{{url('/admin/movies')}}">
                            <i class="fad fa-info-square"></i> Details
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="card">
            <div class="content">
                <div class="row">
                    <div class="col">
                        <div class="icon-big icon-danger text-center float-left">
                            <i class="fad fa-shopping-cart"></i>
                        </div>
                    </div>
                    <div class="col">
                        <div class="numbers">
                            <p>Order</p>
                            {{$orders->count()}}
                        </div>
                    </div>
                </div>
                <div class="footer">
                    <hr />
                    <div class="stats">
                        <a href="{{url('/admin/order')}}">
                            <i class="fad fa-info-square"></i> Details
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="card">
            <div class="content">
                <div class="row">
                    <div class="col">
                        <div class="icon-big icon-danger text-center float-left">
                            <i class="fad fa-ticket"></i>
                        </div>
                    </div>
                    <div class="col">
                        <div class="numbers">
                            <p>Tickets</p>
                            {{$tickets->count()}}
                        </div>
                    </div>
                </div>
                <div class="footer">
                    <hr />
                    <div class="stats">
                        <a href="{{url('/admin/ticket')}}">
                            <i class="fad fa-info-square"></i> Details
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-sm-6">
        <div class="card">
            <div class="content">
                <div class="row">
                    <div class="col">
                        <div class="icon-big icon-danger text-center float-left">
                            <i class="fad fa-store-alt"></i>
                        </div>
                    </div>
                    <div class="col">
                        <div class="numbers">
                            <p>Branch</p>
                            {{$branch->count()}}
                        </div>
                    </div>
                </div>
                <div class="footer">
                    <hr />
                    <div class="stats">
                        <a href="{{url('/admin/branch')}}">
                            <i class="fad fa-info-square"></i> Details
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-sm-6">
        <div class="card">
            <div class="content">
                <div class="row">
                    <div class="col">
                        <div class="icon-big icon-info text-center float-left">
                            <i class="fad fa-users"></i>
                        </div>
                    </div>
                    <div class="col">
                        <div class="numbers">
                            <p>Users</p>
                            {{$user->count()}}
                        </div>
                    </div>
                </div>
                <div class="footer">
                    <hr />
                    <div class="stats">
                        <a href="{{url('/admin/users')}}">
                            <i class="fad fa-info-square"></i> Details
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-sm-6">
        <div class="panel panel-default">
            <div class="panel-heading"><b>Charts</b></div>
            <div class="panel-body">
                <canvas id="canvas" height="280" width="600"></canvas>
            </div>
        </div>
    </div>


    <script>
        var user_graph = {{json_encode($user_graph->content())}};
        console.log(user_graph)
        var url = "{{url('/chart')}}";
        var Years = new Array();
        var Labels = new Array();
        var Prices = new Array();
        $(document).ready(function () {
            $.get(url, function (response) {
                response.forEach(function (data) {
                    Years.push(data.stockYear);
                    Labels.push(data.stockName);
                    Prices.push(data.stockPrice);
                });
                var ctx = document.getElementById("canvas").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: Years,
                        datasets: [{
                            label: 'Infosys Price',
                            data: Prices,
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
            });
        });
    </script>
</div>
@endsection