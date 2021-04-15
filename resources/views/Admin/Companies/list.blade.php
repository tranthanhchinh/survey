@extends('master')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Quản lý công ty</h1>
    </div>
    <div class="row">
        <div class="col-xl-6">
            <div class="card shadow mb-6">
                <div class="card-header">Thêm mới công ty</div>
                <div class="card-body">
                    <form action="{{ route('postCreateUserCompany') }}" method="POST">
                    @csrf
                    <!-- Form Group (username)-->
                        <div class="form-row">
                            <!-- Form Group (first name)-->
                            <div class="form-group col-md-12">
                                <label class="title-input mb-1" for="inputUsername">Họ và tên</label>
                                <input class="form-control" id="inputUsername" type="text" name="fullname" required>
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
                                <label class="title-input mb-1" for="inputFirstName">Tên công ty</label>
                                <input class="form-control" id="inputFirstName" type="text" name="name"  required>
                            </div>
                            <!-- Form Group (last name)-->

                        </div>

                        <!-- Form Group (email address)-->
                        <div class="form-group">
                            <label class="title-input mb-1" for="inputEmailAddress">Quy mô công ty</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="scale">
                                <option value="0-50"> Dưới 50 người</option>
                                <option value="50-100">50-100 người</option>
                                <option value=">100">> Trên 100 người</option>
                            </select>

                        </div>

                        <!-- Save changes button-->
                        <button class="btn btn-primary" type="submit">Thêm công ty</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card shadow mb-6">
                <div class="card-header">Danh sách</div>

                    <ul class="list-data">
                        @foreach($listUserCompanies as $key=>$listUser)
                        <li class="{{ $key%2==0 ? 'bg-color-li' : '' }}">
                             <div class="input-check">
                                 <input type="checkbox" name="allcheck[]">
                             </div>
                            <div class="list-data-info">
                                <p class="list-data-info-name">{{ $listUser->name.'('.$listUser->email.')' }}</p>
                                <p class="list-data-info-action">
                                    <a href="/admin/companies/edit/{{ $listUser->id }}">Chỉnh sửa</a> |
                                    <a href="/admin/companies/delete/{{ $listUser->id }}" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa </a>
                                </p>
                            </div>


                        </li>
                        @endforeach

                    </ul>
                <div class="text-right">
                    {{ $listUserCompanies->links() }}
                </div>


            </div>
        </div>
    </div>




@endsection

