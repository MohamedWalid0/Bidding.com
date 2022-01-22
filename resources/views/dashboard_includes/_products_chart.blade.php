<div id="products-chart"></div>
{{--<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>--}}
<script>
    // $(function () {
        var options = {
            chart: {
                type: 'bar',
                height: 350,
            },
            plotOptions: {
                bar: {
                    columnWidth: '50%',
                    borderRadius: 20,
                }

            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            dataLabels: {
                enabled: false
            },
            fill: {
                colors: ['#009688']
            },
            series: [{
                name: 'total_products',
                data: @json($products->pluck('total_products')->toArray())

            }],
            xaxis: {
                categories: @json($products->pluck('month')->toArray())
            }
        }

        var productsChart = new ApexCharts(document.querySelector("#products-chart"), options);

        productsChart.render();
    // });
</script>
