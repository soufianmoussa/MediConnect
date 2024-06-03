@extends('layouts.admin')
@section('title','Adminpanel')

@section('main')
<div class="container">
    <div class="my-4">
        <h2 class="text-2xl font-semibold" style="color: #81C408;">Welcome, {{ $userName }}</h2>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4"> <!-- Add margin-bottom class here -->
                <div class="card-body">
                    <h5 class="card-title">Products Created by Month</h5>
                    <!-- Chart.js Chart Container -->
                    <canvas id="productsChart" class="my-4 chartjs-render-monitor" width="800" height="250"></canvas>
                </div>
            </div>
        </div>
      
        <!-- Display user, product, and pharmacy count cards -->
        @foreach(['Users' => $userCount, 'Products' => $productCount, 'Pharmacies' => $pharmacyCount] as $title => $count)
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">{{ $title }}</h5>
                        <p class="card-text">{{ $count }}</p>
                    </div>
                </div>
            </div>
        @endforeach
        <!-- Display chart -->
    </div>
</div>
@endsection

@section('scripts')
<!-- Include Chart.js from CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Fetch data for products chart
    const months = {!! json_encode($months) !!};
    const counts = {!! json_encode($counts) !!};

    // Get canvas element
    const ctx = document.getElementById('productsChart').getContext('2d');

    // Initialize Chart.js
    new Chart(ctx, {
        type: 'bar', // Bar chart type
        data: {
            labels: months, // Array of months
            datasets: [{
                label: 'Products Count',
                data: counts, // Array of product counts
                backgroundColor: 'rgba(129, 196, 8, 0.5)', // Background color for bars
                borderColor: 'rgba(129, 196, 8, 1)', // Border color for bars
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true // Start y-axis at zero
                }
            }
        }
    });
</script>
@endsection

