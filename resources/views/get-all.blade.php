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
                    @if(session()->has('login'))
                    <a href="{{route('login')}}" class="btn btn-primary">Login</a>
                    @else
                    <a href="{{route('logout')}}" class="btn btn-primary">Logout</a>
                    @endif
                </div>
            </div>
        </div>

    </form>
</div>
<table class="table">
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
        <th scope="col">Trạng thái</th>
        @if(session('login'))
        <th scope="col">Cập nhật</th>
        @endif
    </tr>
    </thead>
    <tbody>
    @foreach($query as $key => $item)
        <tr style="background: @if($item->status == 1) lightskyblue @endif" class="text-center">
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
            <td> @if($item->status == 0) Chưa xác nhận @elseif ($item->status == 1) Đã chốt vé @endif </td>
            @if(session('login'))
            <td rowspan="1">
                @if($item->status == 0)
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <a href="{{route('delete', $item->id)}}" class="btn btn-danger"> Xoá </a>
                            </div>
                            <div class="col-md-9">
                                <a href="{{route('update', $item->id)}}" class="btn btn-success">Cập nhật</a>
                            </div>
                        </div>
                    </div>
                @endif </td>
            @endif
        </tr>
    @endforeach
    </tbody>
</table>
<style>
    .success {
        background: lightskyblue;
    }

    .top {
        margin-top: 5%;
        margin-bottom: 2%;
    }

    @media only screen and (max-width: 844px) {
        .margin-top {
            margin-top: 1%;
            margin-bottom: 1%;
        }
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</html>
