@extends('backend.layouts.master3')

@section('title')
Báo cáo Đơn hàng
@endsection

@section('feature-title')
Báo cáo Đơn hàng
@endsection

@section('feature-description')
Báo cáo Đơn hàng
@endsection

@section('content')
<div class="row" ng-controller="BaoCaoController">
    <div class="col-md-12">
        <form method="get" action="#" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="tuNgay">Từ ngày</label>
                <input type="date" class="form-control" id="tuNgay" name="tuNgay">
            </div>
            <div class="form-group">
                <label for="denNgay">Đến ngày</label>
                <input type="date" class="form-control" id="denNgay" name="denNgay">
            </div>
            <button type="submit" class="btn btn-primary" id="btnLapBaoCao">Lập báo cáo</button>
        </form>
    </div>
    <div class="col-md-12">
        <canvas id="chartOfobjChart" style="width: 100%;height: 400px;"></canvas>
    </div>
    <div class="col-md-12">
        <form name="frmMau" method="get" action="#" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group row">
                <label for="mau" class="col-md-2 col-form-label">Màu sản phẩm</label>
                <div class="col-md-10">
                    <input list="mau_data" class="form-control" ng-model="selectedMau.m_ten" name="m" ng-required="true" ng-change="getData()">
                    <datalist id="mau_data">
                        <option ng-repeat="m in mau" value="<% m.m_ten %>" />
                    </datalist>
                </div>
            </div>
            <div class="form-group row">
                <label for="sp" class="col-md-2 col-form-label">Sản phẩm</label>
                <div class="col-md-10">
                    <input list="sp_data" class="form-control" name="sp" id="sp" ng-readonly="frmMau.m.$error.required">
                    <datalist id="sp_data">
                        <option ng-repeat="sp in sanpham | filter:selectedMau" value="<% sp.sp_ten %> | <% sp.m_ten %>" />
                    </datalist>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <canvas id="myChart" style="width: 100%;height: 300px;"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <canvas id="myChart2" style="width: 100%;height: 300px;"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Aloo</h3>
                <div class="card-tools">
                    <button class="btn btn-outline-success" id="den">Đen</button>
                </div>
            </div>
            <div class="card-body">
                <canvas id="myChart3" style="width: 100%;height: 400px;"></canvas>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom-scripts')
<!-- Các script dành cho thư viện Numeraljs -->
<script src="{{ asset('vendor/numeraljs/numeral.min.js') }}"></script>
<script>
    // Đăng ký tiền tệ VNĐ
    numeral.register('locale', 'vi', {
        delimiters: {
            thousands: ',',
            decimal: '.'
        },
        abbreviations: {
            thousand: 'k',
            million: 'm',
            billion: 'b',
            trillion: 't'
        },
        ordinal: function(number) {
            return number === 1 ? 'một' : 'không';
        },
        currency: {
            symbol: 'vnđ'
        }
    });

    // Sử dụng locate vi (Việt nam)
    numeral.locale('vi');
    app.controller('BaoCaoController', function($scope, $http) {
        $scope.getMaMau = function() {
            return $scope.selectedMau.split(" - ")[0];
        }

        $scope.getData = function() {
            $http({
                url: "{{ route('backend.baocao.loai.datachar2') }}" + "?m=" + $scope.selectedMau.m_ten,
                method: 'GET',
            }).then(function successCallback(response) {
                    var myLabel = [];
                    var myData = [];
                    var data = response.data['data'];
                    Object.keys(data).forEach(key => {
                        myLabel.push(data[key].sp_ten);
                        myData.push(data[key].msp_soluong);
                    });
                    myData.push(0);
                    var ctx = document.getElementById('myChart2').getContext('2d');
                    var myChart = new Chart(ctx, {
                        // The type of chart we want to create
                        type: "bar",

                        data: {
                            labels: myLabel,
                            datasets: [{
                                data: myData,
                                borderColor: "#9ad0f5",
                                backgroundColor: "#9ad0f5",
                                borderWidth: 1
                            }]
                        },
                    });
                },
                function errorCallback(response) {});
        }

        $http({
            url: "{{ route('backend.baocao.loai.data') }}",
            method: 'GET',
        }).then(function successCallback(response) {
            $scope.mau = response.data['data_mau'];
            $scope.sanpham = response.data['data_sp'];
        }, function errorCallback(response) {});


    });
</script>

<!-- Các script dành cho thư viện ChartJS -->
<script src="{{ asset('vendor/Chart.js/Chart.min.js') }}"></script>
<script>
    $(document).ready(function() {

        var objChart;
        var $chartOfobjChart = document.getElementById("chartOfobjChart").getContext("2d");

        $("#btnLapBaoCao").click(function(e) {
            e.preventDefault();
            $.ajax({
                url: "{{ route('backend.baocao.donhang.data') }}",
                type: "GET",
                data: {
                    tuNgay: $('#tuNgay').val(),
                    denNgay: $('#denNgay').val(),
                },
                success: function(response) {
                    var myLabels = [];
                    var myData = [];
                    $(response.data).each(function() {
                        myLabels.push((this.thoiGian));
                        myData.push(this.tongThanhTien);
                    });
                    myData.push(0); // creates a '0' index on the graph

                    if (typeof $objChart !== "undefined") {
                        $objChart.destroy();
                    }

                    $objChart = new Chart($chartOfobjChart, {
                        // The type of chart we want to create
                        type: "bar",

                        data: {
                            labels: myLabels,
                            datasets: [{
                                data: myData,
                                borderColor: "#9ad0f5",
                                backgroundColor: "#9ad0f5",
                                borderWidth: 1
                            }]
                        },

                        // Configuration options go here
                        options: {
                            legend: {
                                display: false
                            },
                            title: {
                                display: true,
                                text: "Báo cáo đơn hàng"
                            },
                            scales: {
                                xAxes: [{
                                    scaleLabel: {
                                        display: true,
                                        labelString: 'Ngày nhận đơn hàng'
                                    }
                                }],
                                yAxes: [{
                                    ticks: {
                                        callback: function(value) {
                                            return numeral(value).format('0,0 $')
                                        }
                                    },
                                    scaleLabel: {
                                        display: true,
                                        labelString: 'Tổng thành tiền'
                                    }
                                }]
                            },
                            tooltips: {
                                callbacks: {
                                    label: function(tooltipItem, data) {
                                        return numeral(tooltipItem.value).format('0,0 $')
                                    }
                                }
                            },
                            responsive: true,
                            maintainAspectRatio: false,
                        }
                    });
                }
            });
        });
        $.ajax({
            url: "{{ route('backend.baocao.loai.datachar') }}",
            type: "GET",
            success: function(response) {
                var myLabel = [];
                var myData = [];
                $(response.data).each(function() {
                    myLabel.push(this.m_ten);
                    myData.push(this.soluong);
                });
                myData.push(0);
                var ctx = document.getElementById('myChart').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: myLabel,
                        datasets: [{
                            data: myData,
                            borderColor: "#cccccc",
                            backgroundColor: [
                                '#636e72',
                                '#ff7675',
                                '#fd79a8',
                                '#a29bfe',
                                '#ffffff',
                                '#ffeaa7',
                                '#74b9ff',
                                '#55efc4',
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        circumference: Math.PI,
                        rotation: Math.PI
                    }
                });
            }
        });

        function getDuLieu() {
            $.ajax({
                url: "{{ route('backend.baocao.loai.datachar3') }}",
                type: "GET",
                data: {
                    m: mau
                },
                success: function(response) {
                    console.log(response);
                    $(response.data['data']).each(function() {
                        myLabel2.push(this.m_ten);
                        myData2.push(this.msp_soluong);
                    });
                }
            });
        }
        var myLabel2 = [];
        var myData2 = [];
        $('#den').click(function(e) {
            // debugger;
            myLabel2 = [];
            myData2 = [];
            var den_data;
            $.ajax({
                url: "{{ route('backend.baocao.loai.datachar3') }}",
                type: "GET",
                data: {
                    m: "Đen"
                },
                success: function(response) {
                    $(response.data).each(function() {
                        myLabel2.push(this.sp_ten);
                        myData2.push(this.msp_soluong);
                    });
                    myData2.push(0);
                    var myChart3 = new Chart(document.getElementById('myChart3').getContext('2d'), {
                        // The type of chart we want to create
                        type: "bar",

                        data: {
                            labels: myLabel2,
                            datasets: [{
                                data: myData2,
                                backgroundColor: "#000",
                                borderWidth: 1
                            }]
                        },
                    });
                }
            });
        });
        myData2.push(0);
        var myChart3 = new Chart(document.getElementById('myChart3').getContext('2d'), {
            // The type of chart we want to create
            type: "bar",

            data: {
                labels: myLabel2,
                datasets: [{
                    data: myData2,
                    borderColor: "#9ad0f5",
                    backgroundColor: "#9ad0f5",
                    borderWidth: 1
                }]
            },
        });
    });
</script>
@endsection