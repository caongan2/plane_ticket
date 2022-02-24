<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    />
    <title>Thống kê lịch sử đặt vé</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

</head>
<body>
<div class="top">
    <form action="{{route('search')}}" method="get">
        <div class="container" style="margin-left: 0">
            <div class="row">
                <div class="col-md-6 margin-top">
                    <input type="number" class="form-control" name="number_phone" placeholder="Nhập số điện thoại khách hàng...">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                    @if(request()->input('number_phone'))
                    <a href="{{route('get-all')}}" class="btn btn-primary">Quay lại</a>
                    @endif
                    @if(!session()->has('login'))
                    <a href="{{route('login')}}" class="btn btn-primary">Login</a>
                    @else
                    <a href="{{route('logout')}}" class="btn btn-primary">Logout</a>
                    @endif
                </div>
            </div>
        </div>

    </form>
</div>
<div class="container">
    <div>
        <button class="col-md-2 btn" style="background: #b2dba1" id="cancel">Vé chưa xác nhận</button>
        @if(session()->has('login'))
        <button class="col-md-2 btn" style="background: #C4E5F3" id="success">Vé đã chốt</button>
        @else

            <button class="col-md-2 btn" style="background: #C4E5F3" data-bs-toggle="modal" data-bs-target="#ModalForm">
                Vé đã chốt
            </button>

            <!-- Modal Form -->
            <div class="modal fde" id="ModalForm" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <!-- Login Form -->
                        <form method="post" action="{{route('login_page')}}">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title">Đăng nhập để tiếp tục</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                                <div class="mb-3">
                                    <label for="Username">Username<span class="text-danger">*</span></label>
                                    <input type="text" name="login_id" style="background: #C4E5F3" class="form-control" id="Username" placeholder="Enter Username">
                                </div>

                                <div class="mb-3">
                                    <label for="Password">Password<span class="text-danger">*</span></label>
                                    <input type="password" style="background: #C4E5F3" name="password" class="form-control" id="Password" placeholder="Enter Password">
                                </div>
                            <div class="modal-body">
                            </div>
                            <div class="modal-footer pt-4">
                                <button type="submit" class="btn btn-success mx-auto w-100">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endif
        @if(session()->has('login'))
        <button class="col-md-2 btn" style="background: wheat; display: none" id="revenue_by_user">Doanh thu từ {{auth()->user()->name}}: {{number_format($revenue_by_user)}} - vnd</button>
        <button class="col-md-2 btn" style="background: wheat; display: none" id="revenue"> Tổng doanh thu: {{number_format($revenue)}} - vnd</button>
        @endif
    </div>
</div>
<ul>
    <li style="background-color: rgb(182, 182, 182); display: @if(session()->has('login')) none @else block @endif;" id="table1">
        <table class="table" style="background: #b2dba1; width: 100%; margin-left: 0">
            <thead>
            <tr class="text-center">
                <th scope="col">STT</th>
                <th scope="col">Họ và tên</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Nơi đi</th>
                <th scope="col">Nơi đến</th>
                <th scope="col">Ngày đi</th>
                <th scope="col">Ngày về</th>
                <th scope="col">Người lớn</th>
                <th scope="col">Trẻ 12 tuổi</th>
                <th scope="col">Trẻ 2 tuổi</th>
                <th scope="col">Hành lý</th>
                @if(session('login'))
                    <th scope="col">Cập nhật</th>
                @endif
            </tr>
            </thead>
            <tbody>
            @foreach($query1 as $key => $item)
                <tr class="text-center" id="ticket-{{$item->id}}">
                    <th scope="row">{{$key + 1}}</th>
                    <td>{{$item->user_name}}</td>
                    <td>{{$item->number_phone}}</td>
                    <td>{{$item->from}}</td>
                    <td>{{$item->to}}</td>
                    <td>{{$item->departure_date}}</td>
                    <td>{{$item->return_date}}</td>
                    <td>{{$item->amount_adults}}</td>
                    <td>{{$item->amount_children_less_12}}</td>
                    <td>{{$item->amount_children_less_2}}</td>
                    <td>{{$item->package}}</td>
                    @if(session('login'))
                        <td rowspan="1">
                            @if($item->status == 0)
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <a data-id="{{$item->id}}" class="btn btn-danger delete-ticket"> Xoá </a>
                                        </div>
                                        <div class="col-md-9">
                                            <!-- Button trigger modal -->
                                            <a class="btn btn-success" onclick="showFormUpdate({{$item->id}})" data-toggle="modal" data-target="#exampleModal">
                                                Cập nhật
                                            </a>

                                            <!-- Modal -->
                                            <div class="modal fade" id="modal-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Cập nhật giá vé</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="{{route('update', $item->id)}}" method="post">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <input type="number" name="price" class="form-control" placeholder="Quy đổi sang VND...">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
                                                                <button type="submit" class="btn btn-primary">Lưu</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif </td>
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>
    </li>
    <li style="background-color: #C4E5F3; display:@if(session()->has('login')) block @else none @endif;;" id="table2">
        <table class="table" style="margin-left: 0">
            <thead>
            <tr class="text-center">
                <th scope="col">STT</th>
                <th scope="col">Họ và tên</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Nơi đi</th>
                <th scope="col">Nơi đến</th>
                <th scope="col">Ngày đi</th>
                <th scope="col">Ngày về</th>
                <th scope="col">Người lớn</th>
                <th scope="col">Trẻ 12 tuổi</th>
                <th scope="col">Trẻ 2 tuổi</th>
                <th scope="col">Hành lý</th>
                <th scope="col">Giá</th>
            </tr>
            </thead>
            <tbody>
            @foreach($query2 as $key => $item)
                <tr class="text-center" id="ticket-{{$item->id}}">
                    <th scope="row">{{$key + 1}}</th>
                    <td>{{$item->user_name}}</td>
                    <td>{{$item->number_phone}}</td>
                    <td>{{$item->from}}</td>
                    <td>{{$item->to}}</td>
                    <td>{{$item->departure_date}}</td>
                    <td>{{$item->return_date}}</td>
                    <td>{{$item->amount_adults}}</td>
                    <td>{{$item->amount_children_less_12}}</td>
                    <td>{{$item->amount_children_less_2}}</td>
                    <td>{{$item->package}}</td>
                    <td>{{$item->price}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </li>
</ul>

<style>
    .top {
        margin-top: 5%;
        margin-bottom: 2%;
    }

    /*@media only screen and (max-width: 844px) {*/
    /*    .margin-top {*/
    /*        margin-top: 1%;*/
    /*        margin-bottom: 1%;*/
    /*    }*/
    /*}*/
</style>
<script>

    function showFormUpdate(id) {
        $('#modal-' + id).modal('show')
    }

    $(document).ready(function () {

        $('#cancel').on('click',function () {
            document.getElementById('table1').style.display = 'block'
            document.getElementById('table2').style.display = 'none'
            document.getElementById('revenue').style.display = 'none'
            document.getElementById('revenue_by_user').style.display = 'none'
        })
        $('#success').on('click',function () {
            document.getElementById('table1').style.display = 'none'
            document.getElementById('table2').style.display = 'block'
            document.getElementById('revenue').style.display = 'block'
            document.getElementById('revenue_by_user').style.display = 'block'
        })


        $('.delete-ticket').click(function (){
            // alert(1223)
            let id = $(this).attr('data-id')
            let origin = location.origin
            $.ajax({
                url: origin + '/delete/' + id ,
                method: 'GET',
                type: 'json',
                success: function (res) {
                    $('#ticket-' + id).remove()
                },
                error: function () {
                    alert("You can't delete this product!!!")
                }
            })
        })
    })
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</html>
