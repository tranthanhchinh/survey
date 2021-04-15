@extends('welcome')
@section('content')
    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5 login-form">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Đăng ký tài khoản</h1>
                            </div>
                            <form class="user" action="{{ route('postRegisterUser') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control form-control-user" id="exampleInputEmail"
                                           placeholder="Tên công ty" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="fullname" class="form-control form-control-user" id="exampleInputEmail"
                                           placeholder="Họ và tên" required>

                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail"
                                           placeholder="Địa chỉ email" required>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" name="password" class="form-control form-control-user"
                                               id="exampleInputPassword" placeholder="Mật khẩu" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" name="password_confirm" class="form-control form-control-user"
                                               id="exampleRepeatPassword" placeholder="Nhập lại mật khẩu" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" id="exampleFormControlSelect1" name="scale">
                                        <option value="" hidden>-- Quy mô công ty --</option>
                                        <option value="0-50"> Dưới 50 người</option>
                                        <option value="50-100">50-100 người</option>
                                        <option value=">100">&gt; Trên 100 người</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">Đăng ký</button>


                            </form>
                            @if ($errors->any())
                                <hr>
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if (session('error'))
                                <hr>
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <div class="text-center">
                                <a class="small" href="#">Bạn quên mật khẩu?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="/">Bạn đã có tài khoản? Đăng nhập!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
