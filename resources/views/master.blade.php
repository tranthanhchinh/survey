<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>VnSurvey</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('assets/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">VnSurvey</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="/">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Tổng quan</span></a>
        </li>
       @if(session('user') && session('user')[0]->role == 'company')
        <!-- Divider -->
        <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Khảo sát
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ URL::to('/survey') }}"
                   aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Quản lý khảo sát</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ URL::to('/survey/template') }}"
                   aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Kho mẫu khảo sát</span>
                </a>
            </li>

            <hr class="sidebar-divider">
        <!-- Heading -->
        <div class="sidebar-heading">
           Tài khoản
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ URL::to('/departments') }}"
               aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-folder"></i>
                <span>Quản lý phòng ban</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ URL::to('/users') }}" >
                <i class="fas fa-fw fa-folder"></i>
                <span>Quản lý nhân viên</span>
            </a>
        </li>
        @endif
        <!-- Nav Item - Utilities Collapse Menu -->
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"--}}
{{--               aria-expanded="true" aria-controls="collapseUtilities">--}}
{{--                <i class="fas fa-fw fa-wrench"></i>--}}
{{--                <span>Utilities</span>--}}
{{--            </a>--}}
{{--            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"--}}
{{--                 data-parent="#accordionSidebar">--}}
{{--                <div class="bg-white py-2 collapse-inner rounded">--}}
{{--                    <h6 class="collapse-header">Custom Utilities:</h6>--}}
{{--                    <a class="collapse-item" href="utilities-color.html">Colors</a>--}}
{{--                    <a class="collapse-item" href="utilities-border.html">Borders</a>--}}
{{--                    <a class="collapse-item" href="utilities-animation.html">Animations</a>--}}
{{--                    <a class="collapse-item" href="utilities-other.html">Other</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </li>--}}

        <!-- Divider -->
        @if(session('user') && session('user')[0]->role == 'admin')
            <!-- Nav Item - Pages Collapse Menu -->
                <div class="sidebar-heading">
                    Khảo sát
                </div>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="/admin/survey">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Kho mẫu khảo sát</span>
                    </a>

                </li>


            <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Tài khoản
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#admin"
               aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-folder"></i>
                <span>Admin</span>
            </a>
            <div id="admin" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="/admin/users">Danh sách Admin</a>
                    <a class="collapse-item" href="/admin/users/add">Thêm mới</a>

                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="/admin/companies">
                <i class="fas fa-fw fa-folder"></i>
                <span>Quản lý công ty</span>
            </a>

        </li>

      @endif


    </ul>
    <!-- End of Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                             aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small"
                                           placeholder="Search for..." aria-label="Search"
                                           aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>

                    <!-- Nav Item - Alerts -->
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-bell fa-fw"></i>
                            <!-- Counter - Alerts -->
                            <span class="badge badge-danger badge-counter">3+</span>
                        </a>
                        <!-- Dropdown - Alerts -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="alertsDropdown">
                            <h6 class="dropdown-header">
                                Alerts Center
                            </h6>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="mr-3">
                                    <div class="icon-circle bg-primary">
                                        <i class="fas fa-file-alt text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">December 12, 2019</div>
                                    <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="mr-3">
                                    <div class="icon-circle bg-success">
                                        <i class="fas fa-donate text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">December 7, 2019</div>
                                    $290.29 has been deposited into your account!
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="mr-3">
                                    <div class="icon-circle bg-warning">
                                        <i class="fas fa-exclamation-triangle text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">December 2, 2019</div>
                                    Spending Alert: We've noticed unusually high spending for your account.
                                </div>
                            </a>
                            <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                        </div>
                    </li>

                    <!-- Nav Item - Messages -->
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-envelope fa-fw"></i>
                            <!-- Counter - Messages -->
                            <span class="badge badge-danger badge-counter">7</span>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="messagesDropdown">
                            <h6 class="dropdown-header">
                                Message Center
                            </h6>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="dropdown-list-image mr-3">
                                    <img class="rounded-circle" src="{{ asset('assets/images/undraw_profile_1.svg') }}"
                                         alt="">
                                    <div class="status-indicator bg-success"></div>
                                </div>
                                <div class="font-weight-bold">
                                    <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                        problem I've been having.</div>
                                    <div class="small text-gray-500">Emily Fowler · 58m</div>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="dropdown-list-image mr-3">
                                    <img class="rounded-circle" src="{{ asset('assets/images/undraw_profile_2.svg') }}"
                                         alt="">
                                    <div class="status-indicator"></div>
                                </div>
                                <div>
                                    <div class="text-truncate">I have the photos that you ordered last month, how
                                        would you like them sent to you?</div>
                                    <div class="small text-gray-500">Jae Chun · 1d</div>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="dropdown-list-image mr-3">
                                    <img class="rounded-circle" src="{{ asset('assets/images/undraw_profile_3.svg') }}"
                                         alt="">
                                    <div class="status-indicator bg-warning"></div>
                                </div>
                                <div>
                                    <div class="text-truncate">Last month's report looks great, I am very happy with
                                        the progress so far, keep up the good work!</div>
                                    <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="dropdown-list-image mr-3">
                                    <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                         alt="">
                                    <div class="status-indicator bg-success"></div>
                                </div>
                                <div>
                                    <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                        told me that people say this to all dogs, even if they aren't good...</div>
                                    <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                </div>
                            </a>
                            <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                        </div>
                    </li>

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @if(session('admin'))
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small"> {{  session('admin')[0]->fullname }}</span>
                            @endif
                                <img class="img-profile rounded-circle"
                                 src="{{ asset('assets/images/undraw_profile.svg') }}">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                Settings
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                Activity Log
                            </a>
                            <div class="dropdown-divider"></div>

                            <a class="dropdown-item" href="
                               @if(session('admin'))
                               {{ route('admin.logout') }}
                            @else
                            {{ route('company.logout') }}
                                @endif
                                ">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">
                @yield('content')

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Your Website 2020</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>

    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->


<!-- Bootstrap core JavaScript-->
<script src="{{ URL::asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ URL::asset('assets/js/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ URL::asset('assets/js/sb-admin-2.min.js') }}"></script>

<!-- Page level plugins -->
<script src="{{ URL::asset('assets/js/Chart.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ URL::asset('assets/js/chart-area-demo.js') }}"></script>
<script src="{{ URL::asset('assets/js/chart-pie-demo.js') }}"></script>

<!-- Date Ranger-->
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script src="{{ URL::asset('assets/js/custom.js') }}"></script>
<script>
    function ajaxChangeDateVal(timeRepeat, dateStart){
        $.ajax({
            url: "{{ route('ajaxChangeDateSurvey') }}",
            method: "POST",
            data: {timeRepeat: timeRepeat, dateStart: dateStart, _token: '{{ csrf_token() }}'},
            dataType: "json",
            success: function (data) {

                $('#end_date').attr('max',data.end_date);

            }
        })
    }
    $(function() {
        var clicked = false;
        $(".action-bnb-left select").on("change", function() {
            $("input:checkbox").prop("checked", !clicked);
            clicked = !clicked;

        });

        // ajax filler stafff
        $('.fillter-select select').on('change', function (){
               var valID = $(this).val();
               if(valID!=0){
                   $.ajax({
                       url: "{{ route('ajaxFillterUserStaff') }}",
                       method: "POST",
                       data: {query: valID, _token: '{{ csrf_token() }}'},
                       dataType: "json",
                       success: function (data) {
                           if(data.length > 0){
                               var dataResponse = '';
                               var classActive = ''
                               data.forEach((val,key)=>{
                                   console.log(key);
                                   if(key%2 == 0){
                                       classActive = 'bg-color-li';
                                   }else{
                                       classActive = '';
                                   }
                                   dataResponse += '<li class="'+classActive+'"><div class="input-check"><input type="checkbox" name="allcheck[]" value="'+ val.id +'" id="checked"></div>';
                                   dataResponse += '<div class="list-data-info"> <p class="list-data-info-name">'+ val.name +' ('+ val.email +')</p>';
                                   dataResponse += '<p class="list-data-info-action"> <a href="/companies/users/edit/'+ val.id +'">Chỉnh sửa</a> |<a href="/companies/users/delete/'+ val.id +'" onclick="return confirm("Bạn có chắc chắn muốn xóa?");">Xóa </a> </p> </li>'

                               })
                               $('.list-data').html(dataResponse);

                           }else{
                               $('.list-data').html('<p class="no-result">Không có bản ghi nào</p>');
                           }
                       }
                   })
               }else{
                   location.reload();
               }


        });

        // Edit Survey
        $('.btn_click_survey').on('click', function (){
              var id = $(this).data('id');
            $.ajax({
                url: "{{ route('detailSurveyCompany') }}",
                method: "POST",
                data: {id: id, _token: '{{ csrf_token() }}'},
                dataType: "json",
                success: function (data) {

                    $('.show-ajax').html(data.html);
                    $('.survey_box').repeater({

                        repeaters: [{
                            selector: '.inner-repeater',
                            repeaters: [{
                                selector: '.deep-inner-repeater',
                            }],
                            // isFirstItemUndeletable: true
                        }],
                        // isFirstItemUndeletable: true
                    });
                }
            })
        });

        // update status survey
        $('.btn_paused_survey').on('click', function (){
              var id = $(this).data('id');
              var status = $(this).data('status');
            $.ajax({
                url: "{{ route('updateStatusSurvey') }}",
                method: "POST",
                data: {id: id, status: status, _token: '{{ csrf_token() }}'},
                dataType: "json",
                success: function (data) {
                    location.reload();

                }
            })
        })

        // change date creat Survey
        $('.box_show_date').hide();
        $('.survey_box').on('change', '.select_time_repeat', function (){
            var timeRepeat = $(this).val();
            var dateStart = $('#start_date').val();

            ajaxChangeDateVal(timeRepeat,dateStart);
            $('.box_show_date').show();

        });
        $('.survey_box').on('change', '#start_date', function (){
            var timeRepeat = $( ".select_time_repeat option:selected" ).val();
            var dateStart = $(this).val();
            $('#end_date').attr('min',dateStart);
            $('#end_date').val(dateStart);
            ajaxChangeDateVal(timeRepeat,dateStart);

        });

        // delele Survey
        $('.btn_delete_survey').on('click', function (){
            if(confirm('Bạn có chắc chắn muốn xóa')){
                 var id = $(this).data('id');
                 $.ajax({
                    url: "{{ route('deleteSurvey') }}",
                    method: "POST",
                    data: {id: id, _token: '{{ csrf_token() }}'},
                    dataType: "json",
                    success: function (data) {
                         location.reload();

                    }
                })
            }
        });

        // show detail template
        $('.act-survey').on('click', '.btn-tp-click', function (){
               var id = $(this).data('id');
            $.ajax({
                url: "{{ route('getDetailSurveyTemplate') }}",
                method: "POST",
                data: {id: id, _token: '{{ csrf_token() }}'},
                dataType: "json",
                success: function (data) {
                    $('.show-result-privew').html(data.html);
                }
            })
        })

        // convert template
        $('.act-survey').on('click', '.btn-tp-click-convert', function (){
            var id = $(this).data('id');
            $.ajax({
                url: "{{ route('convertSurveyAdminToCompany') }}",
                method: "POST",
                data: {id: id, _token: '{{ csrf_token() }}'},
                dataType: "json",
                success: function (data) {
                    window.location.href = "{{ route('listSurveyCompany') }}";
                }
            })
        })


    });

</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        var $repeater = $('.survey_box').repeater({

            repeaters: [{
                selector: '.inner-repeater',
                repeaters: [{
                    selector: '.deep-inner-repeater',
                }],
                isFirstItemUndeletable: true
            }],
            isFirstItemUndeletable: true
        });

        $('.quiz-append').on('click','#add-anwser',function (){
            var $div = $('div[id^="quiz"]:last');
            var num = parseInt( $div.prop("id").match(/\d+/g), 10 ) +1;
            var num = parseInt( $div.prop("id").match(/\d+/g), 10 ) +1;
            var $klon = $div.clone().prop('id', 'quiz'+num )
            $klon.find('input').each(function() {
                this.value= "";
                let name_number = this.name.match(/\d+/);
                name_number++;
                this.name = this.name.replace(/\[[0-9]\]+/, '['+name_number+']');

            });

            // Finally insert $klon after the last div
            $div.after( $klon );
        })
        $('.quiz-append').on('click','#delete-anwser',function (){
            $(this).parent().remove();
        })

        $('.survey_box').on('change', '.sl_type_quiz', function(){
            var valID = $(this).val();
            $(this).closest('.type_option_box').find('.anwser_option').hide();
            $(this).closest('.type_option_box').find('.dp_quiz_anwser_'+valID).show();
        })


    })
</script>

<!-- Sun Editor -->
<link href="https://cdn.jsdelivr.net/npm/suneditor@latest/dist/css/suneditor.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/suneditor@latest/dist/suneditor.min.js"></script>
<script>
    // $(document).ready(function (){
    //     SUNEDITOR.create('editor_survey');
    // })
</script>
<!-- Toastr mesager-->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-
     alpha/css/bootstrap.css" rel="stylesheet">


<link rel="stylesheet" type="text/css"
      href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
    @if(Session::has('message'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.success("{{ session('message') }}");
    @endif

        @if(Session::has('error'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.error("{{ session('error') }}");
    @endif

        @if(Session::has('info'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.info("{{ session('info') }}");
    @endif

        @if(Session::has('warning'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.warning("{{ session('warning') }}");
    @endif
</script>
</body>

</html>
