@extends('master')
@section('content')

    <div class="row">
        <div class="col-xl-12">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Tạo mới tài khoản Công ty</div>
                <div class="card-body">
                    <form action="{{ route('postCreateUserCompany') }}" method="POST">
                    @csrf
                    <!-- Form Group (username)-->
                        <div class="form-row">
                            <!-- Form Group (first name)-->
                            <div class="form-group col-md-6">
                                <label class="small mb-1" for="inputUsername">Email</label>
                                <input class="form-control" id="inputUsername" type="email" name="email" required>
                            </div>
                            <!-- Form Group (last name)-->
                            <div class="form-group col-md-6">
                                <label class="small mb-1" for="inputLastName">Mật khẩu</label>
                                <input class="form-control" id="inputLastName" type="password" name="password" required>
                            </div>
                        </div>
                        <!-- Form Row-->
                        <div class="form-row">
                            <!-- Form Group (first name)-->
                            <div class="form-group col-md-12">
                                <label class="small mb-1" for="inputFirstName">Tên công ty</label>
                                <input class="form-control" id="inputFirstName" type="text" name="name"  required>
                            </div>
                            <!-- Form Group (last name)-->

                        </div>

                        <!-- Form Group (email address)-->
                        <div class="form-group">
                            <label class="small mb-1" for="inputEmailAddress">Địa chỉ</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="address" rows="3"></textarea>
                        </div>

                        <!-- Save changes button-->
                        <button class="btn btn-primary" type="submit">Tạo mới</button>
                    </form>
                </div>
            </div>
        </div>


    </div>

@endsection

