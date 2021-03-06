@extends('master')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tất cả khảo sát</h1>
            <a class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm btn-addnew" data-toggle="modal" data-target="#btn_add_survey"><i class="fas fa-calendar-plus"></i> <span>Tạo khảo sát mới</span></a>
        </div>

        <!-- Content Row -->
        <div class="row">

                <div class="modal fade survey_box" id="popupShowDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-body show-ajax">
                            </div>
                        </div>
                    </div>
                </div>

             @foreach($listSurvey as $survey)
                 @if($survey->status == 0)
                    <div class="col-xl-4 col-md-6 mb-4">

                        <div class="card shadow h-100 py-2 survey-box survey-stop">

                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-uppercase mb-1 survey-status">Chưa khởi chạy</div>
                                        <small>&nbsp </small>
                                    </div>
                                    <div class="col-auto survey-setting-icon  dropdown no-arrow">
                                        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-cogs"></i>
                                        </a>
                                        <!-- Dropdown - Alerts -->
                                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown2">
                                            <a class="dropdown-item d-flex align-items-center">
                                                <div class="mr-3">
                                                    <div class="survey-setting-icon">
                                                        <i class="fas fa-edit"></i>
                                                    </div>
                                                </div>
                                                <div><span class="font-weight-bold btn_click_survey " data-toggle="modal" data-target="#popupShowDetail" data-id="{{$survey->id }}">Chỉnh sửa khảo sát</span></div>
                                            </a>
                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                <div class="mr-3">
                                                    <div class="survey-setting-icon">
                                                        <i class="fas fa-pause-circle"></i>
                                                    </div>
                                                </div>
                                                <div><span class="font-weight-bold btn_paused_survey" data-id="{{$survey->id }}" data-status="1">Chạy khảo sát</span></div>
                                            </a>
                                            <a class="dropdown-item d-flex align-items-center btn_delete_survey" data-id="{{$survey->id }}">
                                                <div class="mr-3">
                                                    <div class="survey-setting-icon">
                                                        <i class="fas fa-chart-pie"></i>
                                                    </div>
                                                </div>
                                                <div><span class="font-weight-bold" >Xóa khảo sát</span></div>
                                            </a>
                                        </div>


                                    </div>
                                </div>
                                <div class="row no-gutters align-items-center survey-box-content">
                                    <div class="col-auto survey-box-icon">
                                        <svg width="68px" height="64px" viewBox="0 0 68 64" class="active-survey-group-card-created__status-icon"><title>Survey - Ready</title><g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g id="Survey---Ready"><ellipse id="Oval" fill="#ECEDF3" cx="32.4444444" cy="32" rx="32.4444444" ry="32"></ellipse><g id="cancel-document-4215-copy" transform="translate(13.333333, 5.111111)"><path d="M26.6666667,3.77777778 L23.9111111,3.77777778 C23.4904956,1.70637869 21.6692281,0.217766611 19.5555556,0.217766611 C17.441883,0.217766611 15.6206155,1.70637869 15.2,3.77777778 L12.4444444,3.77777778 C11.4626049,3.77777778 10.6666667,4.573716 10.6666667,5.55555556 L10.6666667,10.8888889 L28.4444444,10.8888889 L28.4444444,5.55555556 C28.4444444,4.573716 27.6485062,3.77777778 26.6666667,3.77777778 Z" id="Path" fill="#C3D1FF" fill-rule="nonzero"></path><path d="M32,10.8888889 L32,26.9777778 C34.1641946,25.7391329 36.6175747,25.0951207 39.1111111,25.1111111 L39.1111111,7.33333333 C39.1111111,6.35149378 38.3151729,5.55555556 37.3333333,5.55555556 L28.4444444,5.55555556 L28.4444444,10.8888889 L32,10.8888889 Z M25.3333333,42.8888889 L7.11111111,42.8888889 L7.11111111,10.8888889 L10.6666667,10.8888889 L10.6666667,5.55555556 L1.77777778,5.55555556 C0.795938223,5.55555556 0,6.35149378 0,7.33333333 L0,48.2222222 C0,49.2040618 0.795938223,50 1.77777778,50 L29.6888889,50 C27.5591242,48.1180722 26.0420465,45.6412107 25.3333333,42.8888889 L25.3333333,42.8888889 Z" id="Shape" fill="#DDA991" fill-rule="nonzero"></path><path d="M32,10.8888889 L7.11111111,10.8888889 L7.11111111,42.8888889 L25.3333333,42.8888889 C23.7303431,36.714683 26.461829,30.2319563 32,27.0666667 L32,10.8888889 Z" id="Path" fill="#EBF5FF" fill-rule="nonzero"></path><path d="M7.11111111,8.22222222 L7.11111111,13.5555556 L24.8888889,13.5555556 L24.8888889,10.8888889 L10.6666667,10.8888889 L10.6666667,6.44444444 L8.88888889,6.44444444 C7.90704933,6.44444444 7.11111111,7.24038267 7.11111111,8.22222222 Z M25.3333333,42.8888889 C23.7259473,36.8044626 26.33512,30.3902465 31.7333333,27.1555556 C24.4402554,28.6337467 19.5426185,35.5137605 20.5333333,42.8888889 L7.11111111,42.8888889 L7.11111111,13.5555556 L4.44444444,13.5555556 L4.44444444,45.5555556 L21.1555556,45.5555556 C21.6839648,47.1683689 22.496781,48.673584 23.5555556,50 L29.6888889,50 C27.5591242,48.1180722 26.0420465,45.6412107 25.3333333,42.8888889 L25.3333333,42.8888889 Z" id="Shape" fill="#000064" fill-rule="nonzero" opacity="0.15"></path><path d="M29.6888889,50 L1.77777778,50 C0.795938223,50 0,49.2040618 0,48.2222222 L0,7.33333333 C0,6.35149378 0.795938223,5.55555556 1.77777778,5.55555556 L10.5777778,5.55555556 M28.4444444,5.55555556 L37.3333333,5.55555556 C38.3151729,5.55555556 39.1111111,6.35149378 39.1111111,7.33333333 L39.1111111,25.1111111" id="Shape" stroke="#2E4369" stroke-linecap="round" stroke-linejoin="round"></path><g id="wall-clock-5917" transform="translate(24.888889, 25.111111)"><circle id="Oval" fill="#FFCC66" fill-rule="nonzero" cx="14.2222222" cy="14.2222222" r="14.2222222"></circle><path d="M21.5296,8.81114074 C21.1593483,8.44100083 20.5591702,8.44100083 20.1889185,8.81114074 L15.0523259,13.9477333 C14.4594065,13.6476127 13.7511447,13.6881365 13.1963259,14.0539259 L10.5562074,12.0661333 C10.2936834,11.8516258 9.93666272,11.7934675 9.6196317,11.9135663 C9.30260069,12.033665 9.07372385,12.3137748 9.01921689,12.6483811 C8.96470992,12.9829873 9.09285373,13.3212554 9.35537778,13.535763 L12.3420444,15.8075259 C12.4269418,16.8187795 13.294711,17.5828582 14.3085771,17.5390759 C15.3224433,17.4952935 16.1211136,16.6592522 16.1185185,15.6444444 C16.1185185,15.6193185 16.1118815,15.597037 16.1109333,15.5704889 L21.5296,10.1518222 C21.8997399,9.78157051 21.8997399,9.18139245 21.5296,8.81114074 L21.5296,8.81114074 Z" id="Path" fill="#000064" fill-rule="nonzero" opacity="0.15"></path><path d="M14.2222222,-7.00623811e-06 C9.98168638,-0.0042087207 5.96141123,1.88794119 3.2621037,5.1584 C8.91477008,0.482386583 17.1966221,0.873070382 22.3839981,6.06044634 C27.5713741,11.2478223 27.9620579,19.5296744 23.2860444,25.1823407 C27.9081061,21.3601055 29.6355335,15.0490672 27.6043419,9.40573507 C25.5731503,3.76240297 20.2199665,-7.00623811e-06 14.2222222,-7.00623811e-06 Z" id="Path" fill="#000064" fill-rule="nonzero" opacity="0.15"></path><circle id="Oval" fill="#6E7DA9" fill-rule="nonzero" cx="14.2222222" cy="14.6962963" r="1"></circle><circle id="Oval" stroke="#2E4369" stroke-linecap="round" stroke-linejoin="round" cx="14.2222222" cy="14.2222222" r="14.2222222"></circle><path d="M14.2222222,2.37037037 L14.2222222,4.74074074 M14.2222222,23.7037037 L14.2222222,26.0740741 M2.37037037,14.2222222 L4.74074074,14.2222222 M23.7037037,14.2222222 L26.0740741,14.2222222" id="Shape" stroke="#2E4369" stroke-linecap="round" stroke-linejoin="round"></path><circle id="Oval" stroke="#2E4369" stroke-linecap="round" stroke-linejoin="round" cx="14.2222222" cy="14.6962963" r="1"></circle><path d="M13.3138963,14.4270222 L9.00740741,10.9037037 M21.8074074,7.58518519 L15.0859852,14.3066074" id="Shape" stroke="#2E4369" stroke-linecap="round" stroke-linejoin="round"></path></g><path d="M26.6666667,3.77777778 L23.9111111,3.77777778 C23.4904956,1.70637869 21.6692281,0.217766611 19.5555556,0.217766611 C17.441883,0.217766611 15.6206155,1.70637869 15.2,3.77777778 L12.4444444,3.77777778 C11.4626049,3.77777778 10.6666667,4.573716 10.6666667,5.55555556 L10.6666667,10.8888889 L28.4444444,10.8888889 L28.4444444,5.55555556 C28.4444444,4.573716 27.6485062,3.77777778 26.6666667,3.77777778 Z M32,26.9777778 L32,10.8888889 L28.4444444,10.8888889 M10.6666667,10.8888889 L7.11111111,10.8888889 L7.11111111,42.8888889 L25.3333333,42.8888889 M14.2222222,18 L24.8888889,18 M14.2222222,26.8888889 L24.8888889,26.8888889 M14.2222222,35.7777778 L24.8888889,35.7777778" id="Shape" stroke="#2E4369" stroke-linecap="round" stroke-linejoin="round"></path></g></g></g></svg>
                                    </div>
                                    <div class="col mr-2">
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><h2>{{ $survey->name }}</h2></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                 @elseif($survey->status == 1)
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card shadow h-100 py-2 survey-box survey-start">

                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-uppercase mb-1 survey-status">Đang chạy</div>
                                        <small>Kết thúc vào {{ date('d/m/Y', strtotime($survey->date_stop)) }}</small>
                                    </div>
                                    <div class="col-auto survey-setting-icon  dropdown no-arrow">
                                        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-cogs"></i>
                                        </a>
                                        <!-- Dropdown - Alerts -->
                                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown2">

                                            <a class="dropdown-item d-flex align-items-center">
                                                <div class="mr-3">
                                                    <div class="survey-setting-icon">
                                                        <i class="fas fa-pause-circle"></i>
                                                    </div>
                                                </div>
                                                <div><span class="font-weight-bold btn_paused_survey" data-id="{{$survey->id }}" data-status="2">Tạm dừng khảo sát</span></div>
                                            </a>
                                            <a class="dropdown-item d-flex align-items-center">
                                                <div class="mr-3">
                                                    <div class="survey-setting-icon">
                                                        <i class="fas fa-stop-circle"></i>
                                                    </div>
                                                </div>
                                                <div><span class="font-weight-bold btn_paused_survey" data-id="{{$survey->id }}" data-status="3">Kết thúc khảo sát</span></div>
                                            </a>
                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                <div class="mr-3">
                                                    <div class="survey-setting-icon">
                                                        <i class="fas fa-chart-pie"></i>
                                                    </div>
                                                </div>
                                                <div><span class="font-weight-bold">Xem báo cáo</span></div>
                                            </a>
                                            <a class="dropdown-item d-flex align-items-center btn_delete_survey" data-id="{{$survey->id }}">
                                                <div class="mr-3">
                                                    <div class="survey-setting-icon">
                                                        <i class="fas fa-chart-pie"></i>
                                                    </div>
                                                </div>
                                                <div><span class="font-weight-bold" >Xóa khảo sát</span></div>
                                            </a>
                                        </div>


                                    </div>
                                </div>
                                <div class="row no-gutters align-items-center survey-box-content">
                                    <div class="col-auto survey-box-icon">
                                        <svg width="68px" height="64px" viewBox="0 0 68 64" class="active-survey-group-card-created__status-icon"><title>Survey - Ready</title><g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g id="Survey---Ready"><ellipse id="Oval" fill="#ECEDF3" cx="32.4444444" cy="32" rx="32.4444444" ry="32"></ellipse><g id="cancel-document-4215-copy" transform="translate(13.333333, 5.111111)"><path d="M26.6666667,3.77777778 L23.9111111,3.77777778 C23.4904956,1.70637869 21.6692281,0.217766611 19.5555556,0.217766611 C17.441883,0.217766611 15.6206155,1.70637869 15.2,3.77777778 L12.4444444,3.77777778 C11.4626049,3.77777778 10.6666667,4.573716 10.6666667,5.55555556 L10.6666667,10.8888889 L28.4444444,10.8888889 L28.4444444,5.55555556 C28.4444444,4.573716 27.6485062,3.77777778 26.6666667,3.77777778 Z" id="Path" fill="#C3D1FF" fill-rule="nonzero"></path><path d="M32,10.8888889 L32,26.9777778 C34.1641946,25.7391329 36.6175747,25.0951207 39.1111111,25.1111111 L39.1111111,7.33333333 C39.1111111,6.35149378 38.3151729,5.55555556 37.3333333,5.55555556 L28.4444444,5.55555556 L28.4444444,10.8888889 L32,10.8888889 Z M25.3333333,42.8888889 L7.11111111,42.8888889 L7.11111111,10.8888889 L10.6666667,10.8888889 L10.6666667,5.55555556 L1.77777778,5.55555556 C0.795938223,5.55555556 0,6.35149378 0,7.33333333 L0,48.2222222 C0,49.2040618 0.795938223,50 1.77777778,50 L29.6888889,50 C27.5591242,48.1180722 26.0420465,45.6412107 25.3333333,42.8888889 L25.3333333,42.8888889 Z" id="Shape" fill="#DDA991" fill-rule="nonzero"></path><path d="M32,10.8888889 L7.11111111,10.8888889 L7.11111111,42.8888889 L25.3333333,42.8888889 C23.7303431,36.714683 26.461829,30.2319563 32,27.0666667 L32,10.8888889 Z" id="Path" fill="#EBF5FF" fill-rule="nonzero"></path><path d="M7.11111111,8.22222222 L7.11111111,13.5555556 L24.8888889,13.5555556 L24.8888889,10.8888889 L10.6666667,10.8888889 L10.6666667,6.44444444 L8.88888889,6.44444444 C7.90704933,6.44444444 7.11111111,7.24038267 7.11111111,8.22222222 Z M25.3333333,42.8888889 C23.7259473,36.8044626 26.33512,30.3902465 31.7333333,27.1555556 C24.4402554,28.6337467 19.5426185,35.5137605 20.5333333,42.8888889 L7.11111111,42.8888889 L7.11111111,13.5555556 L4.44444444,13.5555556 L4.44444444,45.5555556 L21.1555556,45.5555556 C21.6839648,47.1683689 22.496781,48.673584 23.5555556,50 L29.6888889,50 C27.5591242,48.1180722 26.0420465,45.6412107 25.3333333,42.8888889 L25.3333333,42.8888889 Z" id="Shape" fill="#000064" fill-rule="nonzero" opacity="0.15"></path><path d="M29.6888889,50 L1.77777778,50 C0.795938223,50 0,49.2040618 0,48.2222222 L0,7.33333333 C0,6.35149378 0.795938223,5.55555556 1.77777778,5.55555556 L10.5777778,5.55555556 M28.4444444,5.55555556 L37.3333333,5.55555556 C38.3151729,5.55555556 39.1111111,6.35149378 39.1111111,7.33333333 L39.1111111,25.1111111" id="Shape" stroke="#2E4369" stroke-linecap="round" stroke-linejoin="round"></path><g id="wall-clock-5917" transform="translate(24.888889, 25.111111)"><circle id="Oval" fill="#FFCC66" fill-rule="nonzero" cx="14.2222222" cy="14.2222222" r="14.2222222"></circle><path d="M21.5296,8.81114074 C21.1593483,8.44100083 20.5591702,8.44100083 20.1889185,8.81114074 L15.0523259,13.9477333 C14.4594065,13.6476127 13.7511447,13.6881365 13.1963259,14.0539259 L10.5562074,12.0661333 C10.2936834,11.8516258 9.93666272,11.7934675 9.6196317,11.9135663 C9.30260069,12.033665 9.07372385,12.3137748 9.01921689,12.6483811 C8.96470992,12.9829873 9.09285373,13.3212554 9.35537778,13.535763 L12.3420444,15.8075259 C12.4269418,16.8187795 13.294711,17.5828582 14.3085771,17.5390759 C15.3224433,17.4952935 16.1211136,16.6592522 16.1185185,15.6444444 C16.1185185,15.6193185 16.1118815,15.597037 16.1109333,15.5704889 L21.5296,10.1518222 C21.8997399,9.78157051 21.8997399,9.18139245 21.5296,8.81114074 L21.5296,8.81114074 Z" id="Path" fill="#000064" fill-rule="nonzero" opacity="0.15"></path><path d="M14.2222222,-7.00623811e-06 C9.98168638,-0.0042087207 5.96141123,1.88794119 3.2621037,5.1584 C8.91477008,0.482386583 17.1966221,0.873070382 22.3839981,6.06044634 C27.5713741,11.2478223 27.9620579,19.5296744 23.2860444,25.1823407 C27.9081061,21.3601055 29.6355335,15.0490672 27.6043419,9.40573507 C25.5731503,3.76240297 20.2199665,-7.00623811e-06 14.2222222,-7.00623811e-06 Z" id="Path" fill="#000064" fill-rule="nonzero" opacity="0.15"></path><circle id="Oval" fill="#6E7DA9" fill-rule="nonzero" cx="14.2222222" cy="14.6962963" r="1"></circle><circle id="Oval" stroke="#2E4369" stroke-linecap="round" stroke-linejoin="round" cx="14.2222222" cy="14.2222222" r="14.2222222"></circle><path d="M14.2222222,2.37037037 L14.2222222,4.74074074 M14.2222222,23.7037037 L14.2222222,26.0740741 M2.37037037,14.2222222 L4.74074074,14.2222222 M23.7037037,14.2222222 L26.0740741,14.2222222" id="Shape" stroke="#2E4369" stroke-linecap="round" stroke-linejoin="round"></path><circle id="Oval" stroke="#2E4369" stroke-linecap="round" stroke-linejoin="round" cx="14.2222222" cy="14.6962963" r="1"></circle><path d="M13.3138963,14.4270222 L9.00740741,10.9037037 M21.8074074,7.58518519 L15.0859852,14.3066074" id="Shape" stroke="#2E4369" stroke-linecap="round" stroke-linejoin="round"></path></g><path d="M26.6666667,3.77777778 L23.9111111,3.77777778 C23.4904956,1.70637869 21.6692281,0.217766611 19.5555556,0.217766611 C17.441883,0.217766611 15.6206155,1.70637869 15.2,3.77777778 L12.4444444,3.77777778 C11.4626049,3.77777778 10.6666667,4.573716 10.6666667,5.55555556 L10.6666667,10.8888889 L28.4444444,10.8888889 L28.4444444,5.55555556 C28.4444444,4.573716 27.6485062,3.77777778 26.6666667,3.77777778 Z M32,26.9777778 L32,10.8888889 L28.4444444,10.8888889 M10.6666667,10.8888889 L7.11111111,10.8888889 L7.11111111,42.8888889 L25.3333333,42.8888889 M14.2222222,18 L24.8888889,18 M14.2222222,26.8888889 L24.8888889,26.8888889 M14.2222222,35.7777778 L24.8888889,35.7777778" id="Shape" stroke="#2E4369" stroke-linecap="round" stroke-linejoin="round"></path></g></g></g></svg>
                                    </div>
                                    <div class="col mr-2">
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><h2>{{ $survey->name }}</h2></div>
                                    </div>
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1 survey-status">HOÀN THÀNH(5/10)
                                        </div>
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-auto">
                                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                            </div>
                                            <div class="col">
                                                <div class="progress progress-sm mr-2">
                                                    <div class="progress-bar bg-progress" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto bell-button">
                                        <a href=#"><i class="fas fa-bell"></i> NHẮC NHỞ</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                 @elseif($survey->status == 2)
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card shadow h-100 py-2 survey-box survey-pause">

                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-uppercase mb-1 survey-status">Tạm dừng</div>
                                        <small>&nbsp </small>
                                    </div>
                                    <div class="col-auto survey-setting-icon  dropdown no-arrow">
                                        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-cogs"></i>
                                        </a>
                                        <!-- Dropdown - Alerts -->
                                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown2">
                                            <a class="dropdown-item d-flex align-items-center btn_paused_survey" data-status="1" data-id="{{$survey->id }}">
                                                <div class="mr-3">
                                                    <div class="survey-setting-icon">
                                                        <i class="fas fa-pause-circle"></i>
                                                    </div>
                                                </div>
                                                <div><span class="font-weight-bold">Chạy lại khảo sát</span></div>
                                            </a>
                                            <a class="dropdown-item d-flex align-items-center btn_paused_survey" data-id="{{$survey->id }}" data-status="3">
                                                <div class="mr-3">
                                                    <div class="survey-setting-icon">
                                                        <i class="fas fa-stop-circle"></i>
                                                    </div>
                                                </div>
                                                <div><span class="font-weight-bold ">Kết thúc khảo sát</span></div>
                                            </a>
                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                <div class="mr-3">
                                                    <div class="survey-setting-icon">
                                                        <i class="fas fa-chart-pie"></i>
                                                    </div>
                                                </div>
                                                <div><span class="font-weight-bold">Xem báo cáo</span></div>
                                            </a>
                                            <a class="dropdown-item d-flex align-items-center btn_delete_survey" data-id="{{$survey->id }}">
                                                <div class="mr-3">
                                                    <div class="survey-setting-icon">
                                                        <i class="fas fa-chart-pie"></i>
                                                    </div>
                                                </div>
                                                <div><span class="font-weight-bold" >Xóa khảo sát</span></div>
                                            </a>
                                        </div>


                                    </div>
                                </div>
                                <div class="row no-gutters align-items-center survey-box-content">
                                    <div class="col-auto survey-box-icon">
                                        <svg width="68px" height="64px" viewBox="0 0 68 64" class="active-survey-group-card-created__status-icon"><title>Survey - Ready</title><g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g id="Survey---Ready"><ellipse id="Oval" fill="#ECEDF3" cx="32.4444444" cy="32" rx="32.4444444" ry="32"></ellipse><g id="cancel-document-4215-copy" transform="translate(13.333333, 5.111111)"><path d="M26.6666667,3.77777778 L23.9111111,3.77777778 C23.4904956,1.70637869 21.6692281,0.217766611 19.5555556,0.217766611 C17.441883,0.217766611 15.6206155,1.70637869 15.2,3.77777778 L12.4444444,3.77777778 C11.4626049,3.77777778 10.6666667,4.573716 10.6666667,5.55555556 L10.6666667,10.8888889 L28.4444444,10.8888889 L28.4444444,5.55555556 C28.4444444,4.573716 27.6485062,3.77777778 26.6666667,3.77777778 Z" id="Path" fill="#C3D1FF" fill-rule="nonzero"></path><path d="M32,10.8888889 L32,26.9777778 C34.1641946,25.7391329 36.6175747,25.0951207 39.1111111,25.1111111 L39.1111111,7.33333333 C39.1111111,6.35149378 38.3151729,5.55555556 37.3333333,5.55555556 L28.4444444,5.55555556 L28.4444444,10.8888889 L32,10.8888889 Z M25.3333333,42.8888889 L7.11111111,42.8888889 L7.11111111,10.8888889 L10.6666667,10.8888889 L10.6666667,5.55555556 L1.77777778,5.55555556 C0.795938223,5.55555556 0,6.35149378 0,7.33333333 L0,48.2222222 C0,49.2040618 0.795938223,50 1.77777778,50 L29.6888889,50 C27.5591242,48.1180722 26.0420465,45.6412107 25.3333333,42.8888889 L25.3333333,42.8888889 Z" id="Shape" fill="#DDA991" fill-rule="nonzero"></path><path d="M32,10.8888889 L7.11111111,10.8888889 L7.11111111,42.8888889 L25.3333333,42.8888889 C23.7303431,36.714683 26.461829,30.2319563 32,27.0666667 L32,10.8888889 Z" id="Path" fill="#EBF5FF" fill-rule="nonzero"></path><path d="M7.11111111,8.22222222 L7.11111111,13.5555556 L24.8888889,13.5555556 L24.8888889,10.8888889 L10.6666667,10.8888889 L10.6666667,6.44444444 L8.88888889,6.44444444 C7.90704933,6.44444444 7.11111111,7.24038267 7.11111111,8.22222222 Z M25.3333333,42.8888889 C23.7259473,36.8044626 26.33512,30.3902465 31.7333333,27.1555556 C24.4402554,28.6337467 19.5426185,35.5137605 20.5333333,42.8888889 L7.11111111,42.8888889 L7.11111111,13.5555556 L4.44444444,13.5555556 L4.44444444,45.5555556 L21.1555556,45.5555556 C21.6839648,47.1683689 22.496781,48.673584 23.5555556,50 L29.6888889,50 C27.5591242,48.1180722 26.0420465,45.6412107 25.3333333,42.8888889 L25.3333333,42.8888889 Z" id="Shape" fill="#000064" fill-rule="nonzero" opacity="0.15"></path><path d="M29.6888889,50 L1.77777778,50 C0.795938223,50 0,49.2040618 0,48.2222222 L0,7.33333333 C0,6.35149378 0.795938223,5.55555556 1.77777778,5.55555556 L10.5777778,5.55555556 M28.4444444,5.55555556 L37.3333333,5.55555556 C38.3151729,5.55555556 39.1111111,6.35149378 39.1111111,7.33333333 L39.1111111,25.1111111" id="Shape" stroke="#2E4369" stroke-linecap="round" stroke-linejoin="round"></path><g id="wall-clock-5917" transform="translate(24.888889, 25.111111)"><circle id="Oval" fill="#FFCC66" fill-rule="nonzero" cx="14.2222222" cy="14.2222222" r="14.2222222"></circle><path d="M21.5296,8.81114074 C21.1593483,8.44100083 20.5591702,8.44100083 20.1889185,8.81114074 L15.0523259,13.9477333 C14.4594065,13.6476127 13.7511447,13.6881365 13.1963259,14.0539259 L10.5562074,12.0661333 C10.2936834,11.8516258 9.93666272,11.7934675 9.6196317,11.9135663 C9.30260069,12.033665 9.07372385,12.3137748 9.01921689,12.6483811 C8.96470992,12.9829873 9.09285373,13.3212554 9.35537778,13.535763 L12.3420444,15.8075259 C12.4269418,16.8187795 13.294711,17.5828582 14.3085771,17.5390759 C15.3224433,17.4952935 16.1211136,16.6592522 16.1185185,15.6444444 C16.1185185,15.6193185 16.1118815,15.597037 16.1109333,15.5704889 L21.5296,10.1518222 C21.8997399,9.78157051 21.8997399,9.18139245 21.5296,8.81114074 L21.5296,8.81114074 Z" id="Path" fill="#000064" fill-rule="nonzero" opacity="0.15"></path><path d="M14.2222222,-7.00623811e-06 C9.98168638,-0.0042087207 5.96141123,1.88794119 3.2621037,5.1584 C8.91477008,0.482386583 17.1966221,0.873070382 22.3839981,6.06044634 C27.5713741,11.2478223 27.9620579,19.5296744 23.2860444,25.1823407 C27.9081061,21.3601055 29.6355335,15.0490672 27.6043419,9.40573507 C25.5731503,3.76240297 20.2199665,-7.00623811e-06 14.2222222,-7.00623811e-06 Z" id="Path" fill="#000064" fill-rule="nonzero" opacity="0.15"></path><circle id="Oval" fill="#6E7DA9" fill-rule="nonzero" cx="14.2222222" cy="14.6962963" r="1"></circle><circle id="Oval" stroke="#2E4369" stroke-linecap="round" stroke-linejoin="round" cx="14.2222222" cy="14.2222222" r="14.2222222"></circle><path d="M14.2222222,2.37037037 L14.2222222,4.74074074 M14.2222222,23.7037037 L14.2222222,26.0740741 M2.37037037,14.2222222 L4.74074074,14.2222222 M23.7037037,14.2222222 L26.0740741,14.2222222" id="Shape" stroke="#2E4369" stroke-linecap="round" stroke-linejoin="round"></path><circle id="Oval" stroke="#2E4369" stroke-linecap="round" stroke-linejoin="round" cx="14.2222222" cy="14.6962963" r="1"></circle><path d="M13.3138963,14.4270222 L9.00740741,10.9037037 M21.8074074,7.58518519 L15.0859852,14.3066074" id="Shape" stroke="#2E4369" stroke-linecap="round" stroke-linejoin="round"></path></g><path d="M26.6666667,3.77777778 L23.9111111,3.77777778 C23.4904956,1.70637869 21.6692281,0.217766611 19.5555556,0.217766611 C17.441883,0.217766611 15.6206155,1.70637869 15.2,3.77777778 L12.4444444,3.77777778 C11.4626049,3.77777778 10.6666667,4.573716 10.6666667,5.55555556 L10.6666667,10.8888889 L28.4444444,10.8888889 L28.4444444,5.55555556 C28.4444444,4.573716 27.6485062,3.77777778 26.6666667,3.77777778 Z M32,26.9777778 L32,10.8888889 L28.4444444,10.8888889 M10.6666667,10.8888889 L7.11111111,10.8888889 L7.11111111,42.8888889 L25.3333333,42.8888889 M14.2222222,18 L24.8888889,18 M14.2222222,26.8888889 L24.8888889,26.8888889 M14.2222222,35.7777778 L24.8888889,35.7777778" id="Shape" stroke="#2E4369" stroke-linecap="round" stroke-linejoin="round"></path></g></g></g></svg>
                                    </div>
                                    <div class="col mr-2">
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><h2>Cảm giác gắn bó và sự bình đẳng</h2></div>
                                    </div>
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1 survey-status">HOÀN THÀNH(5/10)
                                        </div>
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-auto">
                                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                            </div>
                                            <div class="col">
                                                <div class="progress progress-sm mr-2">
                                                    <div class="progress-bar bg-progress" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto bell-button">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                 @else
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card shadow h-100 py-2 survey-box survey-end">

                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-uppercase mb-1 survey-status">Kết thúc</div>
                                        <small>&nbsp </small>
                                    </div>
                                    <div class="col-auto survey-setting-icon  dropdown no-arrow">
                                        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-cogs"></i>
                                        </a>
                                        <!-- Dropdown Survey Settings -->
                                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown2">
                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                <div class="mr-3">
                                                    <div class="survey-setting-icon">
                                                        <i class="fas fa-chart-pie"></i>
                                                    </div>
                                                </div>
                                                <div><span class="font-weight-bold">Xem báo cáo</span></div>
                                            </a>
                                        </div>


                                    </div>
                                </div>
                                <div class="row no-gutters align-items-center survey-box-content">
                                    <div class="col-auto survey-box-icon">
                                        <svg width="68px" height="64px" viewBox="0 0 68 64" class="active-survey-group-card-created__status-icon"><title>Survey - Ready</title><g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g id="Survey---Ready"><ellipse id="Oval" fill="#ECEDF3" cx="32.4444444" cy="32" rx="32.4444444" ry="32"></ellipse><g id="cancel-document-4215-copy" transform="translate(13.333333, 5.111111)"><path d="M26.6666667,3.77777778 L23.9111111,3.77777778 C23.4904956,1.70637869 21.6692281,0.217766611 19.5555556,0.217766611 C17.441883,0.217766611 15.6206155,1.70637869 15.2,3.77777778 L12.4444444,3.77777778 C11.4626049,3.77777778 10.6666667,4.573716 10.6666667,5.55555556 L10.6666667,10.8888889 L28.4444444,10.8888889 L28.4444444,5.55555556 C28.4444444,4.573716 27.6485062,3.77777778 26.6666667,3.77777778 Z" id="Path" fill="#C3D1FF" fill-rule="nonzero"></path><path d="M32,10.8888889 L32,26.9777778 C34.1641946,25.7391329 36.6175747,25.0951207 39.1111111,25.1111111 L39.1111111,7.33333333 C39.1111111,6.35149378 38.3151729,5.55555556 37.3333333,5.55555556 L28.4444444,5.55555556 L28.4444444,10.8888889 L32,10.8888889 Z M25.3333333,42.8888889 L7.11111111,42.8888889 L7.11111111,10.8888889 L10.6666667,10.8888889 L10.6666667,5.55555556 L1.77777778,5.55555556 C0.795938223,5.55555556 0,6.35149378 0,7.33333333 L0,48.2222222 C0,49.2040618 0.795938223,50 1.77777778,50 L29.6888889,50 C27.5591242,48.1180722 26.0420465,45.6412107 25.3333333,42.8888889 L25.3333333,42.8888889 Z" id="Shape" fill="#DDA991" fill-rule="nonzero"></path><path d="M32,10.8888889 L7.11111111,10.8888889 L7.11111111,42.8888889 L25.3333333,42.8888889 C23.7303431,36.714683 26.461829,30.2319563 32,27.0666667 L32,10.8888889 Z" id="Path" fill="#EBF5FF" fill-rule="nonzero"></path><path d="M7.11111111,8.22222222 L7.11111111,13.5555556 L24.8888889,13.5555556 L24.8888889,10.8888889 L10.6666667,10.8888889 L10.6666667,6.44444444 L8.88888889,6.44444444 C7.90704933,6.44444444 7.11111111,7.24038267 7.11111111,8.22222222 Z M25.3333333,42.8888889 C23.7259473,36.8044626 26.33512,30.3902465 31.7333333,27.1555556 C24.4402554,28.6337467 19.5426185,35.5137605 20.5333333,42.8888889 L7.11111111,42.8888889 L7.11111111,13.5555556 L4.44444444,13.5555556 L4.44444444,45.5555556 L21.1555556,45.5555556 C21.6839648,47.1683689 22.496781,48.673584 23.5555556,50 L29.6888889,50 C27.5591242,48.1180722 26.0420465,45.6412107 25.3333333,42.8888889 L25.3333333,42.8888889 Z" id="Shape" fill="#000064" fill-rule="nonzero" opacity="0.15"></path><path d="M29.6888889,50 L1.77777778,50 C0.795938223,50 0,49.2040618 0,48.2222222 L0,7.33333333 C0,6.35149378 0.795938223,5.55555556 1.77777778,5.55555556 L10.5777778,5.55555556 M28.4444444,5.55555556 L37.3333333,5.55555556 C38.3151729,5.55555556 39.1111111,6.35149378 39.1111111,7.33333333 L39.1111111,25.1111111" id="Shape" stroke="#2E4369" stroke-linecap="round" stroke-linejoin="round"></path><g id="wall-clock-5917" transform="translate(24.888889, 25.111111)"><circle id="Oval" fill="#FFCC66" fill-rule="nonzero" cx="14.2222222" cy="14.2222222" r="14.2222222"></circle><path d="M21.5296,8.81114074 C21.1593483,8.44100083 20.5591702,8.44100083 20.1889185,8.81114074 L15.0523259,13.9477333 C14.4594065,13.6476127 13.7511447,13.6881365 13.1963259,14.0539259 L10.5562074,12.0661333 C10.2936834,11.8516258 9.93666272,11.7934675 9.6196317,11.9135663 C9.30260069,12.033665 9.07372385,12.3137748 9.01921689,12.6483811 C8.96470992,12.9829873 9.09285373,13.3212554 9.35537778,13.535763 L12.3420444,15.8075259 C12.4269418,16.8187795 13.294711,17.5828582 14.3085771,17.5390759 C15.3224433,17.4952935 16.1211136,16.6592522 16.1185185,15.6444444 C16.1185185,15.6193185 16.1118815,15.597037 16.1109333,15.5704889 L21.5296,10.1518222 C21.8997399,9.78157051 21.8997399,9.18139245 21.5296,8.81114074 L21.5296,8.81114074 Z" id="Path" fill="#000064" fill-rule="nonzero" opacity="0.15"></path><path d="M14.2222222,-7.00623811e-06 C9.98168638,-0.0042087207 5.96141123,1.88794119 3.2621037,5.1584 C8.91477008,0.482386583 17.1966221,0.873070382 22.3839981,6.06044634 C27.5713741,11.2478223 27.9620579,19.5296744 23.2860444,25.1823407 C27.9081061,21.3601055 29.6355335,15.0490672 27.6043419,9.40573507 C25.5731503,3.76240297 20.2199665,-7.00623811e-06 14.2222222,-7.00623811e-06 Z" id="Path" fill="#000064" fill-rule="nonzero" opacity="0.15"></path><circle id="Oval" fill="#6E7DA9" fill-rule="nonzero" cx="14.2222222" cy="14.6962963" r="1"></circle><circle id="Oval" stroke="#2E4369" stroke-linecap="round" stroke-linejoin="round" cx="14.2222222" cy="14.2222222" r="14.2222222"></circle><path d="M14.2222222,2.37037037 L14.2222222,4.74074074 M14.2222222,23.7037037 L14.2222222,26.0740741 M2.37037037,14.2222222 L4.74074074,14.2222222 M23.7037037,14.2222222 L26.0740741,14.2222222" id="Shape" stroke="#2E4369" stroke-linecap="round" stroke-linejoin="round"></path><circle id="Oval" stroke="#2E4369" stroke-linecap="round" stroke-linejoin="round" cx="14.2222222" cy="14.6962963" r="1"></circle><path d="M13.3138963,14.4270222 L9.00740741,10.9037037 M21.8074074,7.58518519 L15.0859852,14.3066074" id="Shape" stroke="#2E4369" stroke-linecap="round" stroke-linejoin="round"></path></g><path d="M26.6666667,3.77777778 L23.9111111,3.77777778 C23.4904956,1.70637869 21.6692281,0.217766611 19.5555556,0.217766611 C17.441883,0.217766611 15.6206155,1.70637869 15.2,3.77777778 L12.4444444,3.77777778 C11.4626049,3.77777778 10.6666667,4.573716 10.6666667,5.55555556 L10.6666667,10.8888889 L28.4444444,10.8888889 L28.4444444,5.55555556 C28.4444444,4.573716 27.6485062,3.77777778 26.6666667,3.77777778 Z M32,26.9777778 L32,10.8888889 L28.4444444,10.8888889 M10.6666667,10.8888889 L7.11111111,10.8888889 L7.11111111,42.8888889 L25.3333333,42.8888889 M14.2222222,18 L24.8888889,18 M14.2222222,26.8888889 L24.8888889,26.8888889 M14.2222222,35.7777778 L24.8888889,35.7777778" id="Shape" stroke="#2E4369" stroke-linecap="round" stroke-linejoin="round"></path></g></g></g></svg>
                                    </div>
                                    <div class="col mr-2">
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><h2>Cảm giác gắn bó và sự bình đẳng</h2></div>
                                    </div>
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1 survey-status">HOÀN THÀNH(5/10)
                                        </div>
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-auto">
                                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">100%</div>
                                            </div>
                                            <div class="col">
                                                <div class="progress progress-sm mr-2">
                                                    <div class="progress-bar bg-progress" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-auto bell-button">
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                 @endif

             @endforeach

        </div>
        {{ $listSurvey->links() }}
    </div>

    <!-- Modal -->
    <div class="modal fade" id="btn_add_survey" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form class="survey_box" action="{{ route('postAddSurvey') }}" method="POST">
                        @csrf
                        <div class="step_survey">
                            <div class="form-group">
                                <label>Tên khảo sát</label>
                                <input type="text" name="name_survey" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Giới thiệu</label>
                                <textarea id="editor_survey" class="form-control" name="introduce_survey" rows="5"></textarea>
                            </div>

                            <div data-repeater-list="group" >
                                <div data-repeater-item class="box_group_quiz">
                                    <div class="form-group">
                                        <label>Nhóm câu hỏi</label>
                                        <input type="text" name="group_quiz" class="form-control">
                                    </div>
                                    <div class="inner-repeater">
                                        <div data-repeater-list="quiz" >
                                            <div data-repeater-item class="box_quiz">
                                                <div class="form-group">
                                                    <label>Câu hỏi</label>
                                                    <input type="text" name="quiz_name" class="form-control">
                                                </div>
                                                <div class="form-group type_option_box">
                                                    <label for="exampleFormControlSelect2">Lựa chọn dạng câu hỏi</label>
                                                    <select class="form-control sl_type_quiz" id="exampleFormControlSelect2" name="type">
                                                        <option hidden>-- Chọn --</option>
                                                        <option value="1">Mặt cười</option>
                                                        <option value="2">Slider</option>
                                                        <option value="3">Trắc nghiệm</option>
                                                        <option value="4" >Tùy chọn</option>
                                                    </select>

                                                    <div class="dp_quiz_anwser_1 anwser_option">Mặt cưởi</div>
                                                    <div class="dp_quiz_anwser_2 anwser_option">
                                                        <input type="range" min="1" max="100" value="50" class="slider" id="myRange">
                                                    </div>
                                                    <div class="dp_quiz_anwser_3 anwser_option">Trắc nghiệm</div>
                                                    <div class="dp_quiz_anwser_4 anwser_option">
                                                        <div class="deep-inner-repeater">
                                                            <div data-repeater-list="anser">
                                                                <div data-repeater-item  style="background: #f9f9f9">
                                                                    <div class="form-group">
                                                                        <input type="text" name="anwser_opt" class="form-control">

                                                                    </div>

                                                                    <div data-repeater-delete>Xóa</div>
                                                                </div>
                                                            </div>
                                                            <div data-repeater-create>Thêm</div>
                                                        </div>


                                                    </div>

                                                </div>

                                                <div data-repeater-delete>Xóa</div>
                                            </div>

                                        </div>
                                        <div data-repeater-create>Thêm câu hỏi</div>
                                    </div>
                                    <div data-repeater-delete>Xóa</div>
                                </div>

                            </div>
                            <div data-repeater-create>Thêm nhóm</div>
                            <button type="button" class="btn btn-primary btn-step btn-step-survey">Tạo khảo sát</button>
                        </div>
                        <div class="step_give step-hide">
                            <h3>Chọn đối tượng khảo sát</h3>
                            <input type="hidden" name="obj_survey" value="">
                            <nav class="step_give_tab">
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link obj_survey_click btn-step-give" data-obj="1" id="nav-home-tab" data-toggle="tab" href="#all" role="tab" aria-controls="nav-home" aria-selected="true">Tất cả</a>
                                    <a class="nav-item nav-link obj_survey_click" data-obj="2" id="nav-profile-tab" data-toggle="tab" href="#department" role="tab" aria-controls="nav-profile" aria-selected="false">Phòng ban</a>
                                    <a class="nav-item nav-link obj_survey_click" data-obj="3" id="nav-contact-tab" data-toggle="tab" href="#staff" role="tab" aria-controls="nav-contact" aria-selected="false">Nhân viên</a>
                                    <a class="nav-item nav-link obj_survey_click" data-obj="4" id="nav-contact-tab" data-toggle="tab" href="#email_list" role="tab" aria-controls="nav-contact" aria-selected="false">Địa chỉ email</a>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">

                                <div class="tab-pane fade" id="department" role="tabpanel" aria-labelledby="nav-profile-tab">
                                    <ul class="list-data">
                                        @if($deparments)
                                            @foreach($deparments as $deparment)
                                        <li class="">
                                            <div class="input-check">
                                                <input type="checkbox" name="department[]" value="{{ $deparment->id }}">
                                            </div>
                                            <div class="list-data-info">
                                                <p class="list-data-info-name">{{ $deparment->name }}</p>
                                            </div>

                                        </li>

                                            @endforeach
                                        @endif
                                    </ul>
                                    <button type="button" class="btn btn-primary btn-step btn-step-give">Tạo khảo sát</button>
                                </div>
                                <div class="tab-pane fade" id="staff" role="tabpanel" aria-labelledby="nav-contact-tab">
                                    <ul class="list-data">
                                        @if($staffs)
                                            @foreach($staffs as $staff)
                                                <li class="">
                                                    <div class="input-check">

                                                        <input type="checkbox" name="staff[]" value="{{ $staff->email }}">

                                                    </div>
                                                    <div class="list-data-info">
                                                        <p class="list-data-info-name">{{ $staff->name.'('.$staff->email.')' }}</p>
                                                    </div>

                                                </li>

                                            @endforeach
                                        @endif

                                    </ul>
                                    <button type="button" class="btn btn-primary btn-step btn-step-give">Tạo khảo sát</button>
                                </div>
                                <div class="tab-pane fade" id="email_list" role="tabpanel" aria-labelledby="nav-contact-tab">
                                    <div class="form-group">
                                        <label for="exampleFormControlFile1">Example file input</label>
                                        <input type="file" class="form-control-file" id="exampleFormControlFile1">
                                    </div>
                                    <button type="button" class="btn btn-primary btn-step btn-step-give">Tạo khảo sát</button>
                                </div>


                            </div>

                        </div>
                        <div class="step_date step-hide">
                            <h3>Chọn thời gian khảo sát</h3>
                            <div class="form-group">
                                <select name="time_repeat" class="select_time_repeat">
                                    <option hidden>Chọn</option>
                                    <option value="1">Lặp lại theo tuần</option>
                                    <option value="2">Lặp lại theo tháng</option>
                                    <option value="3">Lặp lại theo quý</option>
                                    <option value="4">Tùy chọn khác</option>
                                </select>
                                <div class="box_show_date">
                                    <p>Ngày bắt đầu</p>
                                    <input type="date" name="start_date" id="start_date" min="{{ date("Y-m-d") }}" value="{{ date("Y-m-d") }}">
                                    <p>Ngày kết thúc</p>
                                    <input type="date" name="end_date" id="end_date" min="{{ date("Y-m-d") }}" value="{{ date("Y-m-d") }}">
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary btn-step btn-step-date">Tạo khảo sát</button>
                        </div>
                        <div class="step_email step-hide">
                            <h3>Lời mời khảo sát qua email</h3>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tiêu đề</label>
                                <input type="text" name="title_email" class="form-control"  placeholder="Nhập tiêu đề">

                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Nội dung</label>
                                <textarea class="form-control" name="content_email" rows="5"></textarea>
                            </div>
                            <input type="hidden" name="status" value="0">
                            <button type="submit" class="btn btn-primary btn-run-now">Khởi chạy ngay</button>
                            <button type="submit" class="btn btn-primary">Lưu khảo sát</button>
                        </div>


                        {{--                        <button type="submit" class="btn btn-primary" >Tạo khảo sát</button>--}}
                    </form>

                </div>

            </div>
        </div>
    </div>
@endsection

