@extends('master')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Quản lý nhân viên</h1>
    </div>
    <div class="row">
        <div class="col-xl-6">
            <div class="card shadow mb-6">
                <div class="card-header">Thêm mới nhân viên</div>
                <div class="card-body">
                    <form action="{{ route('postStaff') }}" method="POST">
                    @csrf
                    <!-- Form Group (username)-->
                        <div class="form-row">
                            <!-- Form Group (first name)-->
                            <div class="form-group col-md-12">
                                <label class="title-input mb-1" for="inputUsername">Họ và tên</label>
                                <input class="form-control" id="inputUsername" type="text" name="name" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <!-- Form Group (first name)-->
                            <div class="form-group col-md-12">
                                <label class="title-input mb-1" for="inputUsername">Địa chỉ email*</label>
                                <input class="form-control" id="inputUsername" type="email" name="email" required>
                            </div>
                            <!-- Form Group (last name)-->
                            <div class="form-group col-md-12">
                                <label class="title-input mb-1" for="inputLastName">Mật khẩu</label>
                                <input class="form-control" id="inputLastName" type="password" name="password" required>
                            </div>
                        </div>
                        <!-- Form Row-->
                        <div class="form-row">
                            <!-- Form Group (first name)-->
                            <div class="form-group col-md-12">
                                <label class="title-input mb-1" for="inputFirstName">Phòng ban</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="department_id">
                                    @if(!empty($departmentLists))
                                        @foreach($departmentLists as $departmentList )
                                            <option value="{{ $departmentList->id }}">{{ $departmentList->name }}</option>
                                        @endforeach
                                    @endif

                                </select>
                            </div>
                            <!-- Form Group (last name)-->

                        </div>

                        <!-- Form Group (email address)-->
                        <div class="form-group">
                            <label class="title-input mb-1" for="inputEmailAddress">Vị trí công việc</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="job">
                                <option value="" hidden>-- Chọn vị trí --</option>
                                <option value="0">Quản lý</option>
                                <option value="1">Trưởng nhóm</option>
                                <option value="2">Leader</option>
                            </select>

                        </div>
                        <div class="form-row">
                            <!-- Form Group (first name)-->
                            <div class="form-group col-md-12">
                                <label class="title-input mb-1" for="inputFirstName">Cấp trên</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="parent_id">
                                    <option value="" hidden>-- Chọn cấp trên --</option>
                                    @if(!empty($listUsers))
                                        @foreach($listUsers as $listUser )
                                            <option value="{{ $listUser->id }}">{{ $listUser->name }}</option>
                                        @endforeach
                                    @endif

                                </select>
                            </div>
                            <!-- Form Group (last name)-->

                        </div>

                        <!-- Save changes button-->
                        <button class="btn btn-primary" type="submit">Thêm nhân viên</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <form action="{{ route('deleteAllUserStaff') }}" method="POST">
                @csrf
            <div class="card shadow mb-6">
                <div class="card-header">
                    <div class="action-btn">
                        <div class="action-bnb-left">
                            <select>
                                <option>--Hành động--</option>
                                <option>Xóa tất cả</option>
                            </select>
                        </div>
                        <div class="remove-all">
                            <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn xóa tất cả bản ghi không?')">Áp dụng</button>
                        </div>
                    </div>
                    <div class="fillter-box">
                         <div class="fillter-box-text">Lọc theo</div>
                        <div class="fillter-select">
                            <select>
                                <option value="0">-- Phòng ban--</option>
                                @if(!empty($departmentLists))
                                    @foreach($departmentLists as $departmentList )
                                        <option value="{{ $departmentList->id }}">{{ $departmentList->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>

                </div>

                <ul class="list-data">
                    @foreach($listUsers as $key=>$listUser)
                        <li class="{{ $key%2==0 ? 'bg-color-li' : '' }}">
                            <div class="input-check">
                                <input type="checkbox" name="allcheck[]" value="{{ $listUser->id }}" id="checked">
                            </div>
                            <div class="list-data-info">
                                <p class="list-data-info-name">{{ $listUser->name.' ('.$listUser->email.')' }}</p>
                                <p class="list-data-info-action">
                                    <a href="/users/edit/{{ $listUser->id }}">Chỉnh sửa</a> |
                                    <a href="/users/delete/{{ $listUser->id }}" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa </a>
                                </p>
                            </div>


                        </li>
                    @endforeach

                </ul>

                <div class="float-right pagenavi">
                    {{ $listUsers->links() }}
                </div>


            </div>
            </form>
        </div>
    </div>




@endsection
