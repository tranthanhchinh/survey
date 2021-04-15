@extends('master')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Quản lý phòng ban</h1>
    </div>
    <div class="row">
        <div class="col-xl-6">
            <div class="card shadow mb-6">
                <div class="card-header">Sửa phòng ban</div>
                <div class="card-body">
                    <form action="{{ route('postDetailDepartment') }}" method="POST">
                    @csrf
                    <!-- Form Group (username)-->

                        <div class="form-row">
                            <!-- Form Group (first name)-->
                            <div class="form-group col-md-12">
                                <label class="title-input mb-1" for="inputFirstName">Tên phòng ban</label>
                                <input class="form-control" id="inputFirstName" type="text" name="name" value="{{ $detailDepartment[0]->name }}" required>
                                <input type="hidden" name="id" value="{{ $detailDepartment[0]->id }}">
                            </div>
                        </div>
                        <!-- Save changes button-->
                        <button class="btn btn-primary" type="submit">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card shadow mb-6">
                <div class="card-header">Danh sách</div>

                <ul class="list-data">
                    @if($departments)
                        @foreach($departments as $key=>$department)
                            <li class="{{ $key%2==0 ? 'bg-color-li' : '' }}">
                                <div class="input-check">
                                    <input type="checkbox" name="allcheck[]">
                                </div>
                                <div class="list-data-info">
                                    <p class="list-data-info-name">{{ $department->name }}</p>
                                    <p class="list-data-info-action">
                                        <a href="/departments/edit/{{ $department->id }}">Chỉnh sửa</a> |
                                        <a href="/departments/delete/{{ $department->id }}" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa </a>
                                    </p>
                                </div>


                            </li>
                        @endforeach
                    @endif
                </ul>
                <div class="text-right">
                    {{ $departments->links() }}
                </div>


            </div>
        </div>
    </div>


@endsection

