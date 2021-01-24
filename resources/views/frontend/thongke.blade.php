{{-- View này sẽ kế thừa giao diện từ `frontend.layouts.master` --}}
@extends('frontend.layouts.master')

{{-- Thay thế nội dung vào Placeholder `title` của view `frontend.layouts.master` --}}
@section('title')
Liên hệ Shop Hoa tươi - Sunshine
@endsection

{{-- Thay thế nội dung vào Placeholder `custom-css` của view `frontend.layouts.master` --}}
@section('custom-css')
@endsection

{{-- Thay thế nội dung vào Placeholder `main-content` của view `frontend.layouts.master` --}}
@section('main-content')
<!-- Title page -->
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{ asset('themes/cozastore/images/bg-02.jpg') }}');">
    <h2 class="ltext-105 cl0 txt-center">
        Thống kê
    </h2>
</section>

<!-- Content page -->
<section class="bg0 p-t-104 p-b-116">
    <div class="container">
        <div class="row">
            <div class="col-md-12" ng-controller="thongkeController">
                <div class="card">
                    <div class="card-header text-center h1"><%title%></div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4" ng-repeat="sp in data">
                                <div class="card">
                                    <div class="card-header bg-primary text-white">
                                        <%sp.sp_ten%>
                                    </div>
                                    <div class="card-body">
                                        <img ng-src="/storage/photos/<% sp.sp_hinh %>" alt="" class="img-fluid"><br>
                                        Giá bán : <%sp.sp_giaBan | number%><br>
                                        Đánh giá : <%sp.sp_danhGia%> <br>
                                        Thông tin : <%sp.sp_thongTin%>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12" ng-controller="timkiemController">
                <div class="card">
                    <div class="card-header text-center h1">Tìm kiếm</div>
                    <div class="card-body">
                        <form name="frmTimKiem" novalidate>
                            <div class="form-group">
                                <label for="name">Tên sản phẩm</label>
                                <input type="text" name="name" id="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="giatu">Giá từ</label>
                                <input type="text" name="giatu" id="giatu" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="giaden">Giá đến</label>
                                <input type="text" name="giaden" id="giaden" class="form-control">
                            </div>
                            <button name="btnsubmit" class="btn btn-primary" ng-click="timkiem()">Gửi</button>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header text-center h1">Kết quả</div>
                    <div class="card-body">
                        <table class="table">
                            <tr ng-repeat="sp in data">
                                <td><%sp.sp_ten%></td>
                                <td><%sp.sp_giaBan%></td>
                                <td><%sp.sp_thongTin%></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

{{-- Thay thế nội dung vào Placeholder `custom-scripts` của view `frontend.layouts.master` --}}
@section('custom-scripts')
<script>
    app.controller('thongkeController', function($scope, $http) {
        $scope.title = "Top 3 sản phẩm mới nhất";
        $scope.data = [];
        $http({
            url: "{{ route('api.thongke.top3_sanpham_moinhat') }}",
            method: "GET"
        }).then(
            function success(respone){
                $scope.data = respone.data.result;
                console.log($scope.data);
            },
            function error(respone){

            }
        );
    });
    app.controller('timkiemController', function($scope, $http) {
        
        $scope.data = [];
        $scope.timkiem = function(){
            console.log(1);
            var sendData = {
                'name': $('#name').val(),
                'giatu': $('#giatu').val(),
                'giaden': $('#giaden').val(),
            }
            console.log(sendData);
            $http({
                url: "{{ route('api.sanpham.timkiem') }}",
                method: "POST",
                data: JSON.stringify(sendData)
            }).then(
                function success(respone){
                    $scope.data = respone.data.result;
                    console.log(respone.data);
                },
                function error(respone){

                }
            );
        }
    });
</script>
@endsection