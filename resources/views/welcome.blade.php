<!DOCTYPE html>
<html>

<!-- Mirrored from www.tooplate.com/templates/2093_flight/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 28 May 2018 10:39:09 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta
            name="viewport"
            content="width=device-width, initial-scale=1"
    />
    <!--

    Template 2093 Flight

    http://www.tooplate.com/view/2093-flight

    -->
    <title>Vé máy bay giá rẻ</title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.html">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/fontAwesome.css">
    <link rel="stylesheet" href="css/hero-slider.css">
    <link rel="stylesheet" href="css/owl-carousel.css">
    <link rel="stylesheet" href="css/datepicker.css">
    <link rel="stylesheet" href="css/tooplate-style.css">
    <link rel="Shortcut Icon" href="img/logo-i.png"  type="img/x-icon" />

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

    <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>

<body>


<section class="banner" id="top">
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-md-offset-1 screen-pc screen-mobile">
                @if(session()->has('success'))
                <p class="form-control screen-mobile" style="background: #008000; color: white">{{session('success')}}</p>
                @endif
                <section id="first-tab-group" class="tabgroup">
                    <div id="tab1">
                        <div class="submit-form">
                            <h4>Thông tin đặt vé:</h4>
                            <form id="form-submit" action="{{route('buy-ticket')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <fieldset>
                                            <label for="form">Họ và tên:</label>
                                            <input name="user_name" type="text" class="form-control date" placeholder="Họ và tên...">
                                        </fieldset>
                                    </div>
                                    <div class="col-md-6">
                                        <fieldset>
                                            <label for="from">Số điện thoại:</label>
                                            <input name="number_phone" type="number" class="form-control date" placeholder="Số điện thoại...">
                                        </fieldset>
                                    </div>
                                    <div class="col-md-6">
                                        <fieldset>
                                            <label for="from">Nơi xuất phát:</label>
                                            <input name="from" type="text" class="form-control date" placeholder="Nhập nơi xuất phát của bạn...">
                                        </fieldset>
                                    </div>
                                    <div class="col-md-6">
                                        <fieldset>
                                            <label for="to">Nơi đến:</label>
                                            <input type="text" name="to" class="form-control date" placeholder="Nhập nơi đến của bạn... ">
                                        </fieldset>
                                    </div>
                                    <div class="col-md-6">
                                        <fieldset>
                                            <label for="departure">Ngày xuất phát:</label>
                                            <input name="departure_date" type="date" class="form-control date" id="departure" placeholder="Nhập ngày bạn muốn xuất phát" required >
                                        </fieldset>
                                    </div>
                                    <div class="col-md-6">
                                        <fieldset>
                                            <label for="return">Ngày về (để trống nếu bạn chọn vé một chiều):</label>
                                            <input name="return_date" type="date" class="form-control date" id="return" placeholder="Để trống nếu bạn chọn vé một chiều">
                                        </fieldset>
                                    </div>
                                    <div class="col-md-6">
                                        <fieldset>
                                            <label for="return">Số lượng vé người lớn:</label>
                                            <input name="amount_adults" type="number" class="form-control date" id="return" placeholder="...">
                                        </fieldset>
                                    </div>
                                    <div class="col-md-6">
                                        <fieldset>
                                            <label for="return">Số lượng vé trẻ em dưới 12 tuổi:</label>
                                            <input name="amount_children_less_12" type="number" class="form-control date" id="return" placeholder="...">
                                        </fieldset>
                                    </div>
                                    <div class="col-md-6">
                                        <fieldset>
                                            <label for="return">Số lượng vé trẻ em dưới 2 tuổi:</label>
                                            <input name="amount_children_less_2" type="number" class="form-control date" id="return" placeholder="...">
                                        </fieldset>
                                    </div>
                                    <div class="col-md-6">
                                        <fieldset>
                                            <label for="return">Hành lí ký gửi (xách tay 7kg)</label>
                                            <label>
                                                <select name='package' class="form-control date">
                                                    <option value="">Chọn cân nặng hành lí mang theo của bạn</option>
                                                    <option value="15">15 kg</option>
                                                    <option value="20">20 kg</option>
                                                    <option value="25">25 kg</option>
                                                    <option value="30">30 kg</option>
                                                    <option value="35">35 kg</option>
                                                    <option value="40">40 kg</option>
                                                </select>
                                            </label>
                                        </fieldset>
                                    </div>
                                    <div class="col-md-12">
                                        <fieldset>
                                            <button type="submit" id="form-submit" class="btn">Tiến hành đặt vé</button>
                                        </fieldset>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</section>

<footer style="background: #66CCFF">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="primary-button">
                    <a href="#" class="scroll-top">Back To Top</a>
                </div>
            </div>
            <div class="col-md-12">
                <div class="primary-button">
                    <h1 style="color: white">Phòng vé máy bay nội địa - quốc tế</h1>
                </div>
            </div>
            <div class="container">
                <div class="col">
                    <div class="col-md-6">
                        <h3 style="color: white">Đặt vé tại Hàn Quốc vui lòng liên hệ zalo:</h3>
                        <h5 style="margin-left: 0">&#8608;	Anh Khao: 01040185868</h5>
                        <h5 style="margin-left: 0">&#8608;	Minh Nhật: 01095018337</h5>
                        <h4>Địa chỉ: 울산시 울주군 웅촌면 고연로143-1</h4>
                    </div>
                    <div class="col-md-6">
                        <h3 style="color: white">Đặt vé tại Việt Nam vui lòng liên hệ zalo:</h3>
                        <h5 style="margin-left: 0">&#8608;	Nhật Lương: 0388899629</h5>
                        <h5 style="margin-left: 0">&#8608;	Em Khao: 0987435092</h5>
                        <h4 style="margin-left: 0">Địa chỉ: Khu đô thị Vườn Xanh, thị trấn Đô Lương</h4>
                    </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <h2>Vé máy bay giá rẻ Nhật Lương &copy; trân trọng cảm ơn quý khách</h2>
            </div>
        </div>
    </div>
</footer>

<script src="../../../ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

<script src="js/vendor/bootstrap.min.js"></script>

<script src="js/datepicker.js"></script>
<script src="js/plugins.js"></script>
<script src="js/main.js"></script>

<script src="../../../ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {



        // navigation click actions
        $('.scroll-link').on('click', function(event){
            event.preventDefault();
            var sectionID = $(this).attr("data-id");
            scrollToID('#' + sectionID, 750);
        });
        // scroll to top action
        $('.scroll-top').on('click', function(event) {
            event.preventDefault();
            $('html, body').animate({scrollTop:0}, 'slow');
        });
    });
    // scroll function
    function scrollToID(id, speed){
        var offSet = 0;
        var targetOffset = $(id).offset().top - offSet;
        var mainNav = $('#main-nav');
        $('html,body').animate({scrollTop:targetOffset}, speed);
        if (mainNav.hasClass("open")) {
            mainNav.css("height", "1px").removeClass("in").addClass("collapse");
            mainNav.removeClass("open");
        }
    }
    if (typeof console === "undefined") {
        console = {
            log: function() { }
        };
    }
</script>
</body>

<!-- Mirrored from www.tooplate.com/templates/2093_flight/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 28 May 2018 10:39:55 GMT -->
</html>
<style>
    .screen-pc{
        width: 100%;
    }
    @media only screen and (max-width: 844px){
        .screen-mobile{
            width: 100%;
            height: auto;
        }
    }
</style>
