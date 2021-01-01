@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('nv_taikhoan') ? ' has-error' : '' }}">
                            <label for="nv_taikhoan" class="col-md-4 control-label">Tên tài khoản</label>

                            <div class="col-md-6">
                                <input id="nv_taikhoan" type="text" class="form-control" name="nv_taikhoan" value="{{ old('nv_taikhoan') }}" required autofocus>

                                @if ($errors->has('nv_taikhoan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nv_taikhoan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('nv_matkhau') ? ' has-error' : '' }}">
                            <label for="nv_matkhau" class="col-md-4 control-label">Mật khẩu</label>

                            <div class="col-md-6">
                                <input id="nv_matkhau" type="password" class="form-control" name="nv_matkhau" required>

                                @if ($errors->has('nv_matkhau'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nv_matkhau') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="nv_ghinhodangnhap" {{ old('nv_ghinhodangnhap') ? 'checked' : '' }}> Ghi nhớ đăng nhập
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Đăng nhập
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Quên mật khẩu?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
