@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')

<div class="row">

    <div class="col-12 col-sm-12 col-lg-6">
        <div class="card">
            <div class="card-body card-print-height">
                <canvas id="shopcategory"></canvas>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-12 col-lg-6">
        <div class="card">
            <div class="card-body card-print-height">
                this is one
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-12 col-lg-4">
        <div class="card">
            <div class="card-body card-print-height">
                this is one
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-12 col-lg-4">
        <div class="card">
            <div class="card-body card-print-height">
                this is one
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-12 col-lg-4">
        <div class="card">
            <div class="card-body card-print-height">
                this is one
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-12 col-lg-4">
        <div class="card">
            <div class="card-body card-print-height">
                this is one
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-12 col-lg-4">
        <div class="card">
            <div class="card-body card-print-height">
                this is one
            </div>
        </div>
    </div>


    <div class="col-12 col-sm-12 col-lg-4">
        <div class="card">
            <div class="card-body card-print-height">
                this is one
            </div>
        </div>
    </div>
</div>

<script>
    window.onload = function () {


        var ctxP = document.getElementById("shopcategory").getContext('2d');
        var myPieChart = new Chart(ctxP, {
            type: 'pie',
            data: {
                labels: ["Message A", "Message B", "Message C", "Message D", "Message Unknown"],
                datasets: [{
                    data: [
                        33,
                        45,
                        78,
                        56,
                        14
                    ],
                    backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"],
                    hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
                }]
            },
            options: {

                responsive: true,
                title: {
                    display: true,
                    text: 'All Message'
                },
                legend: {
                    position: 'left',
                }


            }
        });

    }

</script>
<style>

</style>
@endsection
