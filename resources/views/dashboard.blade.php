@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fab fa-product-hunt"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text"> products </span>
                    <span class="info-box-number">
                  {{ \App\Models\Product::withoutGlobalScopes()->count() }}
                </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-gavel"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Active Bids</span>
                    <span class="info-box-number">{{ \App\Models\Product::count() }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>

        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users-slash"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Blocked Users</span>
                    <span class="info-box-number">{{ \App\Models\BlockUser::count() }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">User Count</span>
                    <span class="info-box-number">{{ \App\Models\User::count() }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>


        <!-- Bar chart -->
        <div class="bg-light card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="far fa-chart-bar"></i>
                    products Chart
                </h3>
            </div>
            <div class="card-body">
                <div >
                    <select id="products-chart-year"  class="form-control">
                        @for ($i = 5; $i >= 0; $i--)
                            <option value="{{ now()->subYears($i)->year }}"
                                {{ now()->subYears($i)->year === now()->year ? 'selected' : ''}}>
                                {{ now()->subYears($i)->year }}
                                </option>
                        @endfor
                    </select>
                </div>
                <div id="products-chart-wrapper">
{{--                   @include('dashboard_includes._products_chart')--}}
                </div>
            </div>


        </div>

@endsection

@section('scripts')
    <!-- FLOT CHARTS -->
        <script src="{{ asset('plugins/flot/jquery.flot.js') }}"></script>
        <!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
        <script src="{{ asset('plugins/flot/plugins/jquery.flot.resize.js') }}"></script>
        <!-- FLOT PIE PLUGIN - also used to draw donut charts -->
        <script src="{{ asset('plugins/flot/plugins/jquery.flot.pie.js') }}"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{ asset('dist/js/demo.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        $(function () {
            productsChart("{{ now()->year }}");
            $('#products-chart-year').on('change', function(){
                let year = $(this).find(':selected').val();
                productsChart(year);
            })
            function productsChart(year) {
                let loader = `
                    <div class="overlay mt-5"><i class="fas fa-2x fa-sync-alt fa-spin"></i></div>
                `;

                $('#products-chart-wrapper').empty().append(loader);
                $.ajax({
                    url: '{{ route('dashboard.products_chart') }}',
                    data: {
                        'year':year,
                    },
                    success: function(html){
                        $('#products-chart-wrapper').empty().append(html);
                    }
                })
            }
        })


    </script>

@endsection
