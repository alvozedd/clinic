@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Predictive Analytics Dashboard</h1>

    <!-- Summary Statistics -->
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Appointments</h5>
                    <p class="card-text">{{ $totalAppointments }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Low Stock Items</h5>
                    <p class="card-text">{{ $lowStockItems->count() }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Room Utilization</h5>
                    <p class="card-text">{{ number_format($roomUtilization, 2) }}%</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Patient Demographics</h5>
                    <canvas id="patientDemographicsChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Condition Prevalence</h5>
                    <canvas id="conditionPrevalenceChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Staff Performance Chart -->
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Staff Performance</h5>
                    <canvas id="staffPerformanceChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Fetch Patient Demographics Data
    fetch("{{ route('analytics.patient-demographics') }}")
        .then(response => response.json())
        .then(data => {
            const ctx = document.getElementById('patientDemographicsChart').getContext('2d');
            new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: data.map(item => item.gender),
                    datasets: [{
                        label: 'Patient Demographics',
                        data: data.map(item => item.count),
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: { position: 'top' },
                        title: { display: true, text: 'Patient Demographics by Gender' }
                    }
                }
            });
        });

    // Fetch Condition Prevalence Data
    fetch("{{ route('analytics.condition-prevalence') }}")
        .then(response => response.json())
        .then(data => {
            const ctx = document.getElementById('conditionPrevalenceChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: data.map(item => item.diagnosis),
                    datasets: [{
                        label: 'Condition Prevalence',
                        data: data.map(item => item.count),
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: { display: false },
                        title: { display: true, text: 'Top 5 Conditions by Prevalence' }
                    },
                    scales: {
                        y: { beginAtZero: true }
                    }
                }
            });
        });

    // Fetch Staff Performance Data
    fetch("{{ route('analytics.staff-performance') }}")
        .then(response => response.json())
        .then(data => {
            const ctx = document.getElementById('staffPerformanceChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: data.map(item => item.staff.name),
                    datasets: [{
                        label: 'Appointments',
                        data: data.map(item => item.appointments),
                        backgroundColor: 'rgba(153, 102, 255, 0.2)',
                        borderColor: 'rgba(153, 102, 255, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: { display: false },
                        title: { display: true, text: 'Staff Performance by Appointments' }
                    },
                    scales: {
                        y: { beginAtZero: true }
                    }
                }
            });
        });
</script>
@endsection
