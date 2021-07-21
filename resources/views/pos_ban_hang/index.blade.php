<!DOCTYPE html>
<html lang="en">
<head>
  <title>Danh sách nhân viên | Quản trị Admin</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Main CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('../template_Mago/doc/css/main.css')}}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
  <!-- or -->
  <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
  <!-- Font-icon css-->
  <link rel="stylesheet" type="text/css"
    href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
  <!-- ajax -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>
    div.dataTables_wrapper div.dataTables_filter {
    text-align: center !important;
    }
    div.dataTables_wrapper div.dataTables_filter > label{
      width: 100%;
    }
    div.dataTables_wrapper div.dataTables_filter  input{
      width: 80%;
    }
  </style>
</head>


<body onload="time()" class="app sidebar-mini rtl">

@if ( Session::has('success') )
      <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 4000,
            timerProgressBar: true,
            didOpen: (toast) => {
              toast.addEventListener('mouseenter', Swal.stopTimer)
              toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
          })

          Toast.fire({
            icon: 'success',
            title: '{!! Session::get('success') !!}'
          })
      </script>
    @endif
    <?php //Hiển thị thông báo lỗi?>
    @if ( Session::has('error') )
      <script>
         const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 4000,
            timerProgressBar: true,
            didOpen: (toast) => {
              toast.addEventListener('mouseenter', Swal.stopTimer)
              toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
          })

          Toast.fire({
            icon: 'error',
            title: '{!! Session::get('error') !!}'
          })
      </script>
    @endif


  <!-- Navbar-->
  <header class="app-header">
    <!-- Sidebar toggle button-->
    <!-- Navbar Right Menu-->
    <ul class="app-nav">


      <!-- User Menu-->
      <li><a class="app-nav__item" href="/index.html"><i class='bx bx-log-out bx-rotate-180'></i> </a>

      </li>
    </ul>
  </header>
  <!-- Sidebar menu-->
 
  <main class="app app-ban-hang">
    <div class="row">
      <div class="col-md-12">
        <div class="app-title">
          <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><a href="#"><b>POS bán hàng</b></a></li>
          </ul>
          <div id="clock"></div>
        </div>
      </div>
    </div>
    <div class="row" > 
    <!-- id="sampleTable" -->
      <div class="col-md-8">
        <div class="tile">
          <h3 class="tile-title">Phần mềm bán hàng</h3>
          <!-- <div class="form-group">
            <input type="text" name="country_name" id="country_name" class="form-control input-lg" placeholder="Nhập mã sản phẩm để tìm kiếm ...." />
            <div id="countryList"><br></div>
          </div>
          {{ csrf_field() }} -->
          <!-- @foreach($listProducts as $listPr)
          <form action="{{URL::to('/save-cart')}}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="products_id_hidden" value="{{$listPr->id}}">
                <input type="hidden" name="pr_name" value="{{$listPr->pr_name}}">
                <input type="hidden" name="pr_price_ban" value="{{$listPr->pr_price_ban}}"> 
                <input class="quantity mr-15" type="number" name="qty" min="1" value="1">
                <button class="btn btn-primary" type="submit">{{$listPr->pr_name}}</button>
            </form>
            @endforeach -->

          <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <table class="table table-hover table-bordered" id="sampleTable" data-page-length='2'>
                            <thead>
                                <tr>
                                    <th>Tên sản phẩm</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($listProducts as $listPr)
                            
                              <tr>
                                  <td>
                                  <form action="{{URL::to('/save-cart')}}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="products_id_hidden" value="{{$listPr->id}}">
                                    <input type="hidden" name="pr_name" value="{{$listPr->pr_name}}">
                                    <input type="hidden" name="pr_price_ban" value="{{$listPr->pr_price_ban}}">
                                    <button class="btn btn-primary" type="submit">{{$listPr->id}} - {{$listPr->pr_name}}</button>
                                    <input class="so--luong1 float-right" style="border: 1px solid #c6c6c6;border-radius: 5px;" type="number" name="qty" min="1" max="{{$listPr->pr_soluong}}" value="1">
                                    </form>
                                  </td>
                                </tr>
                                @endforeach
                            
                           
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

          <?php
          $content =  Cart::content();
          ?>
          
        <div class="du--lieu-san-pham">
          <table class="table table-hover table-bordered" >
            <thead>
              <tr>
               
                <th class="so--luong">Mã hàng</th>
                <th class="so--luong">Tên sản phẩm</th>
                <th class="so--luong">Giá bán</th>
                <th class="so--luong" width="10">Số lượng</th>
                <th class="so--luong">Thành tiền</th>
                <th class="so--luong text-center" style="text-align: center; vertical-align: middle;"></th>
              </tr>
            </thead>
            <tbody>
            
            @foreach($content as $value)
              <tr>
                <td>{{$value->id}}</td>
                <td>{{$value->name}}</td>
                <!-- <td><input class="so--luong1" style="border: 1px solid #c6c6c6;border-radius: 5px;" type="number" value="{{$value->qty}}"></td> -->
                <td >{{number_format($value->price)}} </td>
                <td>x  {{$value->qty}}</td>
                <td >
                  <?php
                    $sum = $value->qty * $value->price;
                    echo(number_format($sum));
                  ?>
                </td>
                <td style="text-align: center; vertical-align: middle;">
                  <a class="btn btn-primary btn-sm trash" href="{{URL::to('datele-to-cart/'.$value->rowId)}}"><i class="fas fa-trash-alt"></i></a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="alert">

          <i class="fas fa-exclamation-triangle"></i> Gõ mã hoặc tên sản phẩm vào thanh tìm kiếm để thêm hàng vào đơn hàng
        </div>
        </div>
        <div id="page" style="display: none;">
          <div  class="page">
              <div class="header">
                  <div class="company">SHOP THỜI TRANG MAGO</div>
                  <div class="company">ĐC : Tiểu La - Đà Nẵng</div>
                  <div class="company">SĐT : 0376637703</div>
              </div>
            <br/>
            <h2 style="text-align: center;">
                  HÓA ĐƠN THANH TOÁN
                  <br/>
                  -------oOo-------
            </h2>
            <br/>
            <p>Khách hàng : khách lẻ</p>
            <p>Thu ngân : Mai Đức Tuấn -  Ngày bán : <span id="date"></span></p>

            <script>
            var today = new Date();
            var time = today.getDate() + "/" + today.getMonth() + "/" + today.getFullYear();
            document.getElementById("date").innerHTML = time;
            </script>

            <table class="TableData">
              <thead>
                <tr style="text-align: left;">
                  <th>Mã</th>
                  <th>Tên</th>
                  <th>SL</th>
                  <th>Đơn giá</th>
                  <th>Thành tiền</th>
                </tr>
                <hr>
              </thead>
              <tbody>
              @foreach($content as $value)
              <tr>
                <td style="width:10%;">{{$value->id}}</td>
                <td style="width:35%;">{{$value->name}}</td>
                <td style="width:5%;">{{$value->qty}} x</td>
                <td style="width:25%;">{{number_format($value->price)}}</td>
                <td style="width:25%;">
                  <?php
                    $sum = $value->qty * $value->price;
                    echo(number_format($sum));
                  ?>
                </td>
              </tr>
              @endforeach
              <tr>
              <td colspan="5"><hr></td> 
              </tr>
              <tr>
                <td colspan="4" style="text-align: right;font-weight:bold;text-transform:uppercase;padding-right: 4px;">Tạm tính :</td>
                <td class="cotSo">&ensp;  {{Cart::subtotal(0)}}</td>
              </tr>
              <tr>
                <td colspan="4" style="text-align: right;font-weight:bold;text-transform:uppercase;padding-right: 4px;">Giảm giá :</td>
                <td class="cotSo"><span>-&ensp;</span>100.000</td>
              </tr>
              <tr>
                <td colspan="4" style="text-align: right;font-weight:bold;text-transform:uppercase;padding-right: 4px;">Tổng cộng :</td>
                <td class="cotSo">&ensp; 
                {{Cart::subtotal(0)}}
                </td>
              </tr>
              </tbody>
            </table>
            <br/>
            <br/>
            <div style="text-align: center;">
                  Cảm ơn quý khách và hẹn gặp lại!
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="tile">
          <h3 class="tile-title">Thông tin thanh toán</h3>
          <div class="row">
            <div class="form-group  col-md-10">
              <label class="control-label">Họ tên khách hàng</label>
              <input type="text" name="user_name" id="user_name" class="form-control" placeholder="Tìm kiếm khách hàng" />
              <div id="userList"><br></div>
              {{ csrf_field() }}
            </div>
            <!-- <p class="btn btn-primary users">users</p> -->
            <div class="form-group  col-md-2">
              <label style="text-align: center;" class="control-label">&ensp;</label>
              <button class="btn btn-primary btn-them" data-toggle="modal" data-target="#exampleModalCenter"><i class="fas fa-user-plus"></i>
              </button>
            </div>
            <!-- <div class="form-group  col-md-12">
              <label class="control-label">Nhân viên bán hàng</label>
              <select class="form-control" id="exampleSelect1">
                <option>--- Chọn nhân viên bán hàng ---</option>
                <option>Võ Trường</option>
                <option>Nhật Kim Anh</option>
                <option>Đào Thanh Tuấn</option>
                <option>Phạm Phong Phú</option>
              </select>
            </div> -->
            <div class="form-group  col-md-12">
              <label class="control-label">Ghi chú đơn hàng</label>
              <textarea class="form-control" rows="4" placeholder="Ghi chú thêm đơn hàng"></textarea>
            </div>
  
          </div>
          <div class="row" id="thongtin">
           
            <div class="form-group  col-md-12">
              <label class="control-label">Hình thức thanh toán</label>
              <select class="form-control" id="exampleSelect2" required>
                <option>Trả tiền mặt tại quầy</option>
                <option disabled>Thanh toán chuyển khoản (chưa có)</option>
              </select>
            </div>
            <div class="form-group  col-md-6">
              <label class="control-label">Tạm tính tiền hàng: </label>
              <p class="control-all-money-tamtinh">= 129.397.213 VNĐ</p>
            </div>
            <!-- <div class="form-group  col-md-6">
              <label class="control-label">Thuế: </label>
              <p class="control-all-money-tamtinh">=  {{Cart::tax(0).' '.'VNĐ'}}</p>
            </div> -->
            <div class="form-group  col-md-6">
              <label class="control-label">Giảm giá (F7): </label>
              <input class="form-control" type="number" value="0">
            </div>
            <div class="form-group  col-md-6">
              <label class="control-label">Tổng cộng thanh toán: </label>
              <p class="control-all-money-total">= {{Cart::subtotal(0).' '.'VNĐ'}} </p>
            </div>
            <div class="form-group  col-md-6">
              <label class="control-label">Khách hàng đưa tiền (F8): </label>
              <input class="form-control" type="number" value="290000">
            </div>
            <!-- <div class="form-group  col-md-12">
              <label class="control-label">Khách hàng còn nợ: </label>
              <p class="control-all-money"> - 129.397.213 VNĐ</p>
            </div> -->
            <div class="tile-footer col-md-12">
              <!-- <button class="btn btn-primary luu-san-pham" type="button"> Lưu đơn hàng (F9)</button> -->
              <!-- <button class="btn btn-primary luu-va-in" type="button" onclick="myApp.printTable()">Lưu và in hóa đơn (F10)</button> -->
              <button class="btn btn-primary luu-san-pham" type="button" onclick="myApp.printTable()">Lưu và in hóa đơn (F10)</button> 
              <a class="btn btn-secondary luu-va-in float-right" href="{{url('/')}}">Quay về</a>
            </div>
          </div>
        </div>
        </div>
      </div>
    </div>
    <div>
</div>
  </main>

  <!--
  MODAL
-->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
data-backdrop="static" data-keyboard="false">
<div class="modal-dialog modal-dialog-centered" role="document">
  <div class="modal-content">

    <div class="modal-body">
    <form action="{{url('user/tao-nguoi-dung')}}" method="post">
    <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}"/>
      <div class="row">
        <div class="form-group  col-md-12">
          <span class="thong-tin-thanh-toan">
            <h5>Tạo mới khách hàng</h5>
          </span>
        </div>
        <div class="form-group col-md-12">
          <label class="control-label">Họ và tên</label>
          <input class="form-control" type="text" name="user_name" required>
        </div>
        <div class="form-group col-md-6">
          <label class="control-label">Địa chỉ</label>
          <input class="form-control" type="text" name="user_adress" >
        </div>
        <div class="form-group col-md-6">
          <label class="control-label">Email</label>
          <input class="form-control" type="text" name="user_email">
        </div>
        <div class="form-group col-md-6">
          <label class="control-label">Ngày sinh</label>
          <input class="form-control" type="date" name="user_birthdate">
        </div>
        <div class="form-group col-md-6">
          <label class="control-label">Số điện thoại</label>
          <input class="form-control" type="number" name="user_phone" required>
        </div>
      </div>
      <BR>
      <button class="btn btn-save" type="sumbit">Lưu lại</button>
      <a class="btn btn-cancel" data-dismiss="modal" href="#">Hủy bỏ</a>
      <BR>
    </div>
    </form>
    <div class="modal-footer">
    </div>
  </div>
</div>
</div>
<!--
MODAL
-->


  <!-- The Modal -->
  <div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
      <div class="modal-header">
        <span class="close">X</span>
      </div>
    
     
    </div>

  </div>





  <!-- Essential javascripts for application to work-->
  <script src="{{asset('../template_Mago/doc/js/jquery-3.2.1.min.js')}}"></script>
  <script src="{{asset('../template_Mago/doc/js/popper.min.js')}}"></script>
  <script src="{{asset('../template_Mago/doc/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('../template_Mago/doc/js/main.js')}}"></script>
  <!-- The javascript plugin to display page loading on top-->
  <script src="{{asset('../template_Mago/doc/js/plugins/pace.min.js')}}"></script>
  <!-- Page specific javascripts-->
  <!-- Data table plugin-->
  <script type="text/javascript" src="{{asset('../template_Mago/doc/js/plugins/jquery.dataTables.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('../template_Mago/doc/js/plugins/dataTables.bootstrap.min.js')}}"></script>
  <script type="text/javascript">$('#sampleTable').DataTable();</script>
  <script>
    function deleteRow(r) {
      var i = r.parentNode.parentNode.rowIndex;
      document.getElementById("myTable").deleteRow(i);
    }
    //Thời Gian
    function time() {
      var today = new Date();
      var weekday = new Array(7);
      weekday[0] = "Chủ Nhật";
      weekday[1] = "Thứ Hai";
      weekday[2] = "Thứ Ba";
      weekday[3] = "Thứ Tư";
      weekday[4] = "Thứ Năm";
      weekday[5] = "Thứ Sáu";
      weekday[6] = "Thứ Bảy";
      var day = weekday[today.getDay()];
      var dd = today.getDate();
      var mm = today.getMonth() + 1;
      var yyyy = today.getFullYear();
      var h = today.getHours();
      var m = today.getMinutes();
      var s = today.getSeconds();
      m = checkTime(m);
      s = checkTime(s);
      nowTime = h + " giờ " + m + " phút " + s + " giây";
      if (dd < 10) {
        dd = '0' + dd
      }
      if (mm < 10) {
        mm = '0' + mm
      }
      today = day + ', ' + dd + '/' + mm + '/' + yyyy;
      tmp = '<span class="date"> <i class="bx bxs-calendar" ></i> ' + today + ' | <i class="fa fa-clock-o" aria-hidden="true"></i>  : ' + nowTime +
        '</span>';
      document.getElementById("clock").innerHTML = tmp;
      clocktime = setTimeout("time()", "1000", "Javascript");

      function checkTime(i) {
        if (i < 10) {
          i = "0" + i;
        }
        return i;
      }
    }
  </script>

  <script>
    // Modal popup 
    var modal = document.getElementById("myModal");
    // var btn = document.getElementById("myBtn");
    var span = document.getElementsByClassName("close")[0];
    // btn.onclick = function () {
    //   modal.style.display = "block";
    // }
    span.onclick = function () {
      modal.style.display = "none";
    }
    window.onclick = function (event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
  </script>
  <!-- in hóa đơn -->
  <script>
    var myApp = new function () {
        this.printTable = function () {
          var tab = document.getElementById('page');
          var win = window.open('', '', 'height=1000,width=1000');
          // hiện ID page
          var divOne = document.getElementById('page');
          divOne.style.display='block';
          // 
          win.document.write(tab.outerHTML);
          win.document.close();
          win.print();
          // ẩn ID page
          var divOne = document.getElementById('page');
          divOne.style.display='none';
        }
      }
  </script>
  <!-- load search -->
  <script>
    $(document).ready(function(){

    $('#country_name').keyup(function(){ //bắt sự kiện keyup khi người dùng gõ từ khóa tim kiếm
      var query = $(this).val(); //lấy gía trị ng dùng gõ
      if(query != '') //kiểm tra khác rỗng thì thực hiện đoạn lệnh bên dưới
      {
      var _token = $('input[name="_token"]').val(); // token để mã hóa dữ liệu
      $.ajax({
        url:"{{ url('search') }}", // đường dẫn khi gửi dữ liệu đi 'search' là tên route mình đặt bạn mở route lên xem là hiểu nó là cái j.
        method:"POST", // phương thức gửi dữ liệu.
        data:{query:query, _token:_token},
        success:function(data){ //dữ liệu nhận về
        $('#countryList').fadeIn();  
        $('#countryList').html(data); //nhận dữ liệu dạng html và gán vào cặp thẻ có id là countryList
      }
    });
    }
  });

    $(document).on('click', 'li', function(){  
      // $('#country_name').val($(this).text());  
      $('#countryList').fadeOut();  
    });  

  });
  </script>
    <!-- load search user -->
    <script>
    $(document).ready(function(){

    $('#user_name').keyup(function(){ //bắt sự kiện keyup khi người dùng gõ từ khóa tim kiếm
      var query = $(this).val(); //lấy gía trị ng dùng gõ
      if(query != '') //kiểm tra khác rỗng thì thực hiện đoạn lệnh bên dưới
      {
      var _token = $('input[name="_token"]').val(); // token để mã hóa dữ liệu
      $.ajax({
        url:"{{ url('search-nguoi-dung') }}", // đường dẫn khi gửi dữ liệu đi 'search' là tên route mình đặt bạn mở route lên xem là hiểu nó là cái j.
        method:"POST", // phương thức gửi dữ liệu.
        data:{query:query, _token:_token},
        success:function(data){ //dữ liệu nhận về
        $('#userList').fadeIn();  
        $('#userList').html(data); //nhận dữ liệu dạng html và gán vào cặp thẻ có id là countryList
      }
    });
    }
  });

    $(document).on('click', 'p', function(){  
      $('#user_name').val($(this).text());  
      $('#userList').fadeOut();  
    });  

  });
  </script>

  <!-- <script>
    $(document).ready(function(){
      $('.add_cart').click(function(){
        var id = $(this).data('id_pr');
        var pr_id = $('.products_id_' + id).val(  );
        var pr_name = $('.products_name_' + id).val(  );
        var _token = $('input[name="_token"]').val();
        $.ajax({
          url : "{{url('add-cart-ajax')}}",
          method:"get",
          data:{pr_id:pr_id, pr_name:pr_name, _token:_token},
          success:function(data){ //dữ liệu nhận về
            // alert(data);
          }
        });
      });
    });
  </script> -->
  <script>
    $(document).ready(function() {
      var divOne = document.getElementById('sampleTable_paginate');
      divOne.style.display='none';
      var divOne = document.getElementById('sampleTable_info');
      divOne.style.display='none';
      var divOne = document.getElementById('sampleTable_length');
      divOne.style.display='none';
      
    } );
  </script>
   <script>
    $(document).ready(function() {
      $('.users').click(function(){
        swal({
          title: "Thành công!",
          icon: "success",
          button: "Đóng",
          timer: 1200
        });
      });
    });
  </script>
</body>

</html> 