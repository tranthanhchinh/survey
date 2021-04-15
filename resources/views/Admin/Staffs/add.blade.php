@extends('master')
@section('content')

    <div class="row">
        <div class="col-xl-12">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Thêm nhân viên</div>
                <div class="card-body">
                    <form action="{{ route('postStaff') }}" method="POST">
                    @csrf
                    <!-- Form Group (username)-->

                        <!-- Form Row-->
                        <div class="form-row">
                            <!-- Form Group (first name)-->
                            <div class="form-group col-md-4">
                                <label class="small mb-1" for="inputFirstName">Họ và tên</label>
                                <input class="form-control" id="inputFirstName" type="text" name="fullname" placeholder="NGUYEN VAN A" required>
                            </div>
                            <!-- Form Group (last name)-->
                            <div class="form-group col-md-4">
                                <label class="small mb-1" for="inputBirthday">Ngày sinh</label>
                                <input class="form-control" id="inputBirthday" type="text" name="birthday" placeholder="Nhập ngày sinh" value="20/10/1990">
                            </div>
                            <div class="form-group col-md-4">
                                <label class="small mb-1" for="inputBirthday">Giới tính</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="sex">
                                    <option value="Nam">Nam</option>
                                    <option value="Nữ">Nữ</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="small mb-1" for="inputEmailAddress">Phòng ban</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="department_id">
                                @if(!empty($departmentLists))
                                    @foreach($departmentLists as $departmentList )
                                <option value="{{ $departmentList->id }}">{{ $departmentList->name }}</option>
                                    @endforeach
                                @endif

                            </select>
                        </div>
                        <div class="form-row">
                            <!-- Form Group (first name)-->
                            <div class="form-group col-md-6">
                                <label class="small mb-1" for="inputUsername">Email</label>
                                <input class="form-control" id="inputUsername" type="email" name="email" placeholder="Nhập email" required>
                            </div>
                            <!-- Form Group (last name)-->
                            <div class="form-group col-md-6">
                                <label class="small mb-1" for="inputLastName">Mật khẩu</label>
                                <input class="form-control" id="inputLastName" type="password" name="password" placeholder="Nhập mật khẩu" required>
                            </div>
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

