<div>
    <h2>{{ $data['content'] }}</h2>
    <p>Tên khách hàng: {{ $data['user_name'] }}</p> <br>
    <p>Số điện thoại: {{ $data['number_phone'] }}</p> <br>
    <p>Nơi xuất phát: {{ $data['from'] }}</p> <br>
    <p>Nơi đến: {{ $data['to'] }}</p> <br>
    <p>Ngày xuất phát: {{ $data['departure_date'] }}</p> <br>
    <p>Ngày về: {{ $data['return_date'] }}</p> <br>
    <p>Vé người lớn: {{ $data['amount_adults'] }}</p> <br>
    <p>Vé trẻ em dưới 12 tuổi: {{ $data['amount_children_less_12'] }}</p> <br>
    <p>Vé trẻ em dưới 2 tuổi: {{ $data['amount_children_less_2'] }}</p> <br>
    <p>Hành lí ký gửi: {{$data['package']}} kg</p>
</div>
