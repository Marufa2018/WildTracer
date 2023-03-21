@extends('layouts.app')

@section('stylesheet')
@endsection

@section('content')
<div class="row">
    <div class="col-xl-6">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-chart-area me-1"></i>
                Instances Per Year
            </div>
            <div class="col-md-6" id="per_year_chart" style="height: 500px; width: 100%;"></div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-chart-bar me-1"></i>
                Instances Per City
            </div>
            <div class="col-md-6" id="per_city_chart" style="height: 500px; width: 100%;"></div>
        </div>
    </div>
</div>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-chart-bar me-1"></i>
        Animal Type Count
    </div>
    <div class="col-md-6" id="pie_chart" style="height: 500px; width: 100%;"></div>
</div>
{{-- 
<div id="per_year_chart" style="height: 300px;"></div> --}}
@endsection

@section('script')
<script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
<script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>
<script>
    const per_year_chart = new Chartisan({
      el: '#per_year_chart',
      url: "@chart('per_year_chart')",
      hooks: new ChartisanHooks()
        .colors(['#ECC94B'])
    });
</script>

<script>
    const per_city_chart = new Chartisan({
      el: '#per_city_chart',
      url: "@chart('per_city_chart')",
      hooks: new ChartisanHooks()
        .colors(['#4299E1'])
    });
</script>

<script>
    const pie_chart = new Chartisan({
      el: '#pie_chart',
      url: "@chart('pie_chart')",
      hooks: new ChartisanHooks()
        .colors(['#8732a8'])
    });
</script>
@endsection