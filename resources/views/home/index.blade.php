@extends('master')
@section('title','Quản lý Mago shop')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="app-title">
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><a href="#"><b>Bảng điều khiển</b></a></li>
      </ul>
      <div id="clock"></div>
    </div>
  </div>
</div>
<div class="row">
  <!--Left-->
  <div class="col-md-12 col-lg-6">
    <div class="row">
    <!-- col-6 -->
    <div class="col-md-6">
    <div class="widget-small primary coloured-icon"><i class='icon bx bxs-user-account fa-3x'></i>
      <div class="info">
        <h4>Tổng khách hàng</h4>
        <p><b>{{$users}} khách hàng</b></p>
        <p class="info-tong">Tổng số khách hàng được quản lý.</p>
      </div>
    </div>
  </div>
    <!-- col-6 -->
      <div class="col-md-6">
        <div class="widget-small info coloured-icon"><i class='icon bx bxs-data fa-3x'></i>
          <div class="info">
            <h4>Tổng sản phẩm</h4>
            <p><b>{{$products}} sản phẩm</b></p>
            <p class="info-tong">Tổng số sản phẩm được quản lý.</p>
          </div>
        </div>
      </div>
        <!-- col-6 -->
      <div class="col-md-6">
        <div class="widget-small warning coloured-icon"><i class='icon bx bxs-shopping-bags fa-3x'></i>
          <div class="info">
            <h4>Tổng đơn hàng</h4>
            <p><b>247 đơn hàng</b></p>
            <p class="info-tong">Tổng số hóa đơn bán hàng trong tháng.</p>
          </div>
        </div>
      </div>
        <!-- col-6 -->
      <div class="col-md-6">
        <div class="widget-small danger coloured-icon"><i class='icon bx bxs-error-alt fa-3x'></i>
          <div class="info">
            <h4>Sắp hết hàng</h4>
            <p><b>{{$productsHethang}} sản phẩm</b></p>
            <p class="info-tong">Số sản phẩm cảnh báo hết cần nhập thêm.</p>
          </div>
        </div>
      </div>
        <!-- col-12 -->
        <div class="col-md-12">
        <div class="tile">
            <h3 class="tile-title">Đơn hàng mới</h3>
          <div>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>ID đơn hàng</th>
                  <th>Tên khách hàng</th>
                  <th>Tổng tiền</th>
                  <th>Trạng thái</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>AL3947</td>
                  <td>Phạm Thị Ngọc</td>
                  <td>
                    19.770.000 đ
                  </td>
                  <td><span class="badge bg-info">Chờ xử lý</span></td>
                </tr>
                <tr>
                  <td>ER3835</td>
                  <td>Nguyễn Thị Mỹ Yến</td>
                  <td>
                    16.770.000 đ	
                  </td>
                  <td><span class="badge bg-warning">Đang vận chuyển</span></td>
                </tr>
                <tr>
                  <td>MD0837</td>
                  <td>Triệu Thanh Phú</td>
                  <td>
                    9.400.000 đ	
                  </td>
                  <td><span class="badge bg-success">Đã hoàn thành</span></td>
                </tr>
                <tr>
                  <td>MT9835</td>
                  <td>Đặng Hoàng Phúc	</td>
                  <td>
                    40.650.000 đ	
                  </td>
                  <td><span class="badge bg-danger">Đã hủy	</span></td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- / div trống-->
        </div>
        </div>
        <!-- / col-12 -->
          <!-- col-12 -->
        <div class="col-md-12">
            <div class="tile">
              <h3 class="tile-title">Khách hàng mới</h3>
            <div>
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Tên khách hàng</th>
                    <th>Ngày sinh</th>
                    <th>Số điện thoại</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($listusers as $listU)
                  <tr>
                    <td>{{$listU->id}}</td>
                    <td>{{$listU->user_name}}</td>
                    <td>{{$listU->user_birthdate}}</td>
                    <td><span class="tag tag-success">{{$listU->user_phone}}</span></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>

          </div>
        </div>
          <!-- / col-12 -->
    </div>
  </div>
  <!--END left-->
  <!--Right-->
  <div class="col-md-12 col-lg-6">
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <h3 class="tile-title">Dữ liệu 6 tháng đầu vào</h3>
          <div class="embed-responsive embed-responsive-16by9">
            <canvas class="embed-responsive-item" id="lineChartDemo"></canvas>
          </div>
        </div>
      </div>
      <div class="col-md-12">
        <div class="tile">
          <h3 class="tile-title">Thống kê 6 tháng doanh thu</h3>
          <div class="embed-responsive embed-responsive-16by9">
            <canvas class="embed-responsive-item" id="barChartDemo"></canvas>
          </div>
          <div><span style="color:rgb(255, 212, 59);" class="fa fa-stop"></span> : Tiền lãi</div>
          <div><span style="color:rgba(9, 109, 239, 0.651);" class="fa fa-stop"></span> : Doanh thu</div>
        </div>
      </div>
    </div>

  </div>
  <!--END right-->
</div>
@endsection
@section('script')
<script type="text/javascript">
  var data = {
    labels: ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6"],
    datasets: [{
      label: "Dữ liệu đầu tiên",
      fillColor: "rgba(255, 213, 59, 0.767), 212, 59)",
      strokeColor: "rgb(255, 212, 59)",
      pointColor: "rgb(255, 212, 59)",
      pointStrokeColor: "rgb(255, 212, 59)",
      pointHighlightFill: "rgb(255, 212, 59)",
      pointHighlightStroke: "rgb(255, 212, 59)",
      data: [@foreach($dulieutheothang as $dulieutt)
            {{$dulieutt->pr_price_ban}},
          @endforeach]
      // data: [20, 59, 90, 51, 56, 100]
    },
    {
      label: "Dữ liệu kế tiếp",
      fillColor: "rgba(9, 109, 239, 0.651)  ",
      pointColor: "rgb(9, 109, 239)",
      strokeColor: "rgb(9, 109, 239)",
      pointStrokeColor: "rgb(9, 109, 239)",
      pointHighlightFill: "rgb(9, 109, 239)",
      pointHighlightStroke: "rgb(9, 109, 239)",
      data: [@foreach($dulieutheothang as $dulieutt)
            {{$dulieutt->pr_price_nhap}},
          @endforeach]
    }
    ]
  };
  var ctxl = $("#lineChartDemo").get(0).getContext("2d");
  var lineChart = new Chart(ctxl).Line(data);

  var ctxb = $("#barChartDemo").get(0).getContext("2d");
  var barChart = new Chart(ctxb).Bar(data);
</script>
@endsection