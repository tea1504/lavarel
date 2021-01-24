@extends('backend.layouts.master3')

@section('title')
Không tìm thấy trang
@endsection

@section('feature-title')

@endsection

@section('feature-description')

@endsection

@section('custom-css')

@endsection

@section('content')
<div class="error-page">
    <h2 class="headline text-warning"> 404</h2>

    <div class="error-content">
        <h3><i class="fas fa-exclamation-triangle text-warning"></i> Không tìm thấy trang.</h3>

        <p>
            Chúng tôi không thể tìm thấy trang bạn yêu cầu.
            Bạn có thể <a href="{{ route('frontend.home') }}">trở về trang chủ</a> hoặc thử tìm kiếm lại trang.
        </p>

        <form class="search-form">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search">

                <div class="input-group-append">
                    <button type="submit" name="submit" class="btn btn-warning"><i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
            <!-- /.input-group -->
        </form>
    </div>
    <!-- /.error-content -->
</div>
@endsection

@section('custom-scripts')

@endsection