@extends('master')
@section('content')

    <div class="row">
        <div class="col-xl-12">

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col-10">
                            <h6 class="m-0 font-weight-bold text-primary">Danh sách tài khoản Admin</h6>
                        </div>
                        <div class="col-2 text-right">
                            <a href="/admin/users/add" class="btn btn-success btn-sm"><i class="fas fa-user-plus"></i> Thêm mới</a>

                        </div>
                    </div>


                </div>
                <div class="card-body">
                    <div class="">
                        <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">

                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                        <thead>
                                        <tr role="row">
                                            <th>STT</th>
                                            <th>Họ tên</th>
                                            <th>Email</th>
                                            <th>Ngày sinh</th>
                                            <th>Địa chỉ</th>
                                            <th>Hành động</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @foreach($listUsers as $key=>$listUser)
                                        <tr role="row" class="{{ $key%2==0 ? 'even' : 'odd' }}">
                                            <td>{{ $key+1 }}</td>
                                            <td class="sorting_1">{{ $listUser->fullname }}</td>
                                            <td>{{ $listUser->email }}</td>
                                            <td>{{ date('d-m-Y', strtotime($listUser->birthday)) }}</td>
                                            <td>{{ $listUser->address }}</td>
                                            <td>
                                                <a href="/admin/users/edit/{{ $listUser->id }}" class="btn btn-warning btn-circle btn-sm">
                                                    <i class="far fa-edit"></i>
                                                </a>
                                                |
                                                <a href="/admin/users/delete/{{ $listUser->id }}" onclick="return confirm('Bạn có chắc chắn muốn xóa?');" class="btn btn-danger btn-circle btn-sm">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="text-right btn-sm">
        {{ $listUsers->links() }}
    </div>

@endsection

