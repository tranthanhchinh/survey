@extends('master')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Quản lý phòng ban</h1>
    </div>
    <div class="row">
        <div class="col-xl-6">
            <div class="card shadow mb-6">
                <div class="card-header">Thêm mới phòng ban</div>
                <div class="card-body">
                    <form action="{{ route('postdepartments') }}" method="POST">
                    @csrf
                    <!-- Form Group (username)-->

                        <div class="form-row">
                            <!-- Form Group (first name)-->
                            <div class="form-group col-md-12">
                                <label class="title-input mb-1" for="inputFirstName">Tên phòng ban</label>
                                <input class="form-control" id="inputFirstName" type="text" name="name"  required>
                            </div>
                        </div>
                        <!-- Save changes button-->
                        <button class="btn btn-primary" type="submit">Thêm phòng ban</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <form action="{{ route('deleteAllDepartment') }}" method="POST">
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


                </div>

                <ul class="list-data">
                    @if($departments)
                    @foreach($departments as $key=>$department)
                        <li class="{{ $key%2==0 ? 'bg-color-li' : '' }}">
                            <div class="input-check">
                                <input type="checkbox" name="allcheck[]" value="{{ $department->id }}">
                            </div>
                            <a href="/departments/edit/{{ $department->id }}">
                            <div class="list-data-info">
                                <p class="list-data-info-name"><a href="/departments/edit/{{ $department->id }}">{{ $department->name }}</a></p>
                                <p class="list-data-info-action">
                                    <a href="/departments/edit/{{ $department->id }}">Chỉnh sửa</a> |
                                    <a href="/departments/delete/{{ $department->id }}" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa </a>
                                </p>
                            </div>
                            </a>

                        </li>
                    @endforeach
                   @endif
                </ul>
                <div class="text-right">
                    {{ $departments->links() }}
                </div>


            </div>
            </form>
        </div>
    </div>


@endsection



