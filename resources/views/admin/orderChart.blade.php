@extends('admin.layout.master')

@section('content')
<div class="p-2 sm:p-4 md:p-6 bg-gray-100 min-h-screen">

  <div class="mb-4 sm:mb-6">
    <h2 class="text-xl sm:text-2xl md:text-3xl font-bold text-gray-800 leading-tight">
      Monthly Orders Chart
    </h2>
    <p class="text-gray-500 text-xs sm:text-sm mt-1">
      Track monthly order performance
    </p>
  </div>

  <div class="bg-white rounded-2xl shadow-xl border border-gray-200 p-3 sm:p-5 md:p-6">
    <div class="relative w-full h-[300px] sm:h-[400px] md:h-[500px]">
      <canvas id="orderChart"></canvas>
    </div>
  </div>

  <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4 mt-4 sm:mt-6">
    @php
    $hasData = !empty($totals);
    $totalSum = $hasData ? array_sum($totals) : 0;
    $maxVal = $hasData ? max($totals) : 0;
    $minVal = $hasData ? min($totals) : 0;
    $highestMonth = $hasData ? $months[array_keys($totals, $maxVal)[0]] : 'N/A';
    @endphp

    <div class="bg-white rounded-2xl shadow p-3 sm:p-5 border-l-4 border-blue-500">
      <p class="text-gray-500 text-xs sm:text-sm font-medium">Total Orders</p>
      <h3 class="text-lg sm:text-2xl font-bold text-gray-800">{{ $totalSum }}</h3>
    </div>

    <div class="bg-white rounded-2xl shadow p-3 sm:p-5 border-l-4 border-green-500">
      <p class="text-gray-500 text-xs sm:text-sm font-medium">Highest Month</p>
      <h3 class="text-sm sm:text-xl font-bold text-gray-800 truncate">{{ $highestMonth }}</h3>
    </div>

    <div class="bg-white rounded-2xl shadow p-3 sm:p-5 border-l-4 border-purple-500">
      <p class="text-gray-500 text-xs sm:text-sm font-medium">Max Orders</p>
      <h3 class="text-lg sm:text-2xl font-bold text-gray-800">{{ $maxVal }}</h3>
    </div>

    <div class="bg-white rounded-2xl shadow p-3 sm:p-5 border-l-4 border-red-500">
      <p class="text-gray-500 text-xs sm:text-sm font-medium">Lowest Orders</p>
      <h3 class="text-lg sm:text-2xl font-bold text-gray-800">{{ $minVal }}</h3>
    </div>
  </div>
</div>
<!-- Canvas -->
<canvas id="orderChart"></canvas>

<!-- Hidden data from Laravel -->
<div id="chartData"
     data-labels='@json($months)'
     data-totals='@json($totals)'>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Chart Type Buttons -->
<div style="margin-top:20px;">
    <button onclick="changeChart('bar')">Bar</button>
    <button onclick="changeChart('line')">Line</button>
    <button onclick="changeChart('pie')">Pie</button>
    <button onclick="changeChart('doughnut')">Doughnut</button>
    <button onclick="changeChart('polarArea')">Polar Area</button>
    <button onclick="changeChart('radar')">Radar</button>
</div>

<script>
const el = document.getElementById('chartData');
const labels = JSON.parse(el.dataset.labels);
const totals = JSON.parse(el.dataset.totals);

const colors = [
 '#3b82f6','#10b981','#f59e0b','#ef4444',
 '#8b5cf6','#14b8a6','#ec4899','#6366f1',
 '#22c55e','#f97316','#06b6d4','#84cc16'
];

const ctx = document.getElementById('orderChart').getContext('2d');

let chart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: labels,
        datasets: [{
            label: 'Orders',
            data: totals,
            backgroundColor: colors,
            borderColor: colors,
            borderWidth: 2,
            fill: false,
            tension: 0.4
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false
    }
});

function changeChart(type) {
    chart.destroy();

    chart = new Chart(ctx, {
        type: type,
        data: {
            labels: labels,
            datasets: [{
                label: 'Orders',
                data: totals,
                backgroundColor: colors,
                borderColor: colors,
                borderWidth: 2,
                fill: type === 'line' ? false : true,
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });
}
</script>
@endsection