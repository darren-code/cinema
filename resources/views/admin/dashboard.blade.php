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
            <div class="panel-heading"><b>User by Gender</b></div>
            <div class="panel-body card">
                <canvas class="m-2" id="gender" height="280" width="600"></canvas>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-sm-6">
        <div class="panel panel-default">
            <div class="panel-heading"><b>New User Registered by Week</b></div>
            <div class="panel-body card">
                <canvas class="m-2"  id="date" height="280" width="600"></canvas>
            </div>
        </div>
    </div>
    <div class="col-lg-12 col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading"><b>Movie by MPA Consent</b></div>
            <div class="panel-body card">
                <canvas class="m-2"  id="consent" height="280" width="600"></canvas>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading"><b>Transaction by Method</b></div>
            <div class="panel-body card">
                <canvas class="mt-2 mb-2" id="method" height="280" width="600"></canvas>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading"><b>Total Transaction by Week</b></div>
            <div class="panel-body card">
                <canvas class="m-2" id="transaction" height="280" width="600"></canvas>
            </div>
        </div>
    </div>

</div>
@endsection

@section('script')

    // Chart Gender 
    var chart_gender = "{{url('/admin/gender')}}";
    var total = new Array();
    var nama = new Array();
    $(document).ready(function () {
        $.get(chart_gender, function (response) {
            $.each(response,function(index,value){
                total.push(value.total);
                nama.push(value.gender);
            })
            console.log(nama)
            var ctx = document.getElementById("gender").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: nama,
                    datasets: [{
                        label: "Total user",
                        data: total,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                        ],
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

    // Chart Date 
    var chart_date = "{{url('/admin/date')}}";
    var total_date = new Array();
    var index_date = new Array();
    $(document).ready(function () {
        $.get(chart_date, function (response) {
            $.each(response,function(index,value){
                total_date.push(value.total);
                index_date.push(value.Week);
                
            })
            var yex = document.getElementById("date").getContext('2d');
            var myChart2 = new Chart(yex, {
                type: 'line',
                data: {
                    labels: index_date,
                    datasets: [{
                        data: total_date,
                        label: 'Total New User Registered',
                        borderColor: [
                            'rgba(54, 162, 235, 1)',
                        ],
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

    // Chart Movie by Consent
    var chart_consent = "{{url('/admin/consent')}}";
    var total_consent = new Array();
    var index_consent = new Array();
    $(document).ready(function () {
        $.get(chart_consent, function (response) {
            $.each(response,function(index,value){
                total_consent.push(value.total);
                if(value.parental=="0"){
                    index_consent.push("General");
                }
                else if(value.parental=="10"){
                    index_consent.push("Parental Guidance");
                }
                else if(value.parental=="13"){
                    index_consent.push("Parental Guidance Above 13");
                }
                else if(value.parental=="16"){
                    index_consent.push("Restricted");
                }
                else if(value.parental=="18"){
                    index_consent.push("No One Under 17");
                }
            })
            var yed = document.getElementById("consent").getContext('2d');
            var myChart2 = new Chart(yed, {
                type: 'pie',
                data: {
                    labels: index_consent,
                    datasets: [{
                        data: total_consent,
                        label: 'Total Movie',
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                        ],
                        borderWidth: 1
                    }]
                },                
            });
        });
    });

    // Chart Method 
    var chart_method = "{{url('/admin/method')}}";
    var total_method = new Array();
    var index_method = new Array();
    $(document).ready(function () {
        $.get(chart_method, function (response) {
            $.each(response,function(index,value){
                total_method.push(value.total);
                index_method.push(value.method);
            })
            var dya = document.getElementById("method").getContext('2d');
            var myChart3 = new Chart(dya, {
                type: 'horizontalBar',
                data: {
                    labels: index_method,
                    datasets: [{
                        label: "Total Method",
                        data: total_method,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        xAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }      
            });
        });
    });

    // Chart Transaction 
    var chart_trx = "{{url('/admin/transaction')}}";
    var total_trx = new Array();
    var index_trx = new Array();
    $(document).ready(function () {
        $.get(chart_trx, function (response) {
            $.each(response,function(index,value){
                total_trx.push(value.total);
                index_trx.push(value.Week);
            })
            var ytx = document.getElementById("transaction").getContext('2d');
            var myChart4 = new Chart(ytx, {
                type: 'line',
                data: {
                    labels: index_trx,
                    datasets: [{
                        data: total_trx,
                        label: 'Total Transaction',
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                        ],
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

@endsection