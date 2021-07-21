@extends('master')
@section('title','Quảng lý khách hàng')
@section('content')
<div class="app-title">
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item">Danh sách nhân viên</li>
        <li class="breadcrumb-item"><a href="#">Thêm nhân viên</a></li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">

        <div class="tile">

          <h3 class="tile-title">Tạo mới nhân viên</h3>
          <div class="tile-body">
            <div class="row element-button">
              <div class="col-sm-2">
                <a class="btn btn-add btn-sm" data-toggle="modal" data-target="#exampleModalCenter"><b><i
                      class="fas fa-folder-plus"></i> Tạo chức vụ mới</b></a>
              </div>

            </div>
            <form action="{{url('nhan-vien/tao-nhan-vien')}}" method="post" enctype="multipart/form-data" class="row">
              <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}"/>
              <div class="form-group col-md-4">
                <label class="control-label">Họ và tên</label>
                <input class="form-control" type="text" name="nv_name" required>
              </div>
              <div class="form-group col-md-4">
                <label class="control-label">Địa chỉ email</label>
                <input class="form-control" type="text"  name="nv_email">
              </div>
              <div class="form-group col-md-4">
                <label class="control-label">Mật khẩu</label>
                <input class="form-control" id="password" type="password"  name="nv_password" required>
              </div>
              <div class="form-group col-md-4">
                <label class="control-label">Địa chỉ thường trú</label>
                <input class="form-control" type="text"  name="nv_adress">
              </div>
              <div class="form-group  col-md-4">
                <label class="control-label">Số điện thoại</label>
                <input class="form-control" type="number"  name="nv_phone" required>
              </div>
              <div class="form-group col-md-4">
                <label class="control-label">Ngày sinh</label>
                <input class="form-control" type="date"  name="nv_birthdate">
              </div>
              <div class="form-group col-md-3">
                <label class="control-label">Số CMND</label>
                <input class="form-control" type="number" name="nv_cmnd" required>
              </div>
              <div class="form-group col-md-3">
                <label class="control-label">Lương</label>
                <input class="form-control" type="number" name="nv_salary" >
              </div>
              <div class="form-group col-md-3">
                <label class="control-label">Giới tính</label>
                <select class="form-control" name="nv_sex" required>
                  <option>-- Chọn giới tính --</option>
                  <option>Nam</option>
                  <option>Nữ</option>
                </select>
              </div>

              <div class="form-group  col-md-3">
                <label for="exampleSelect1" class="control-label">Chức vụ</label>
                <select class="form-control" name="role_id">
                  <option>-- Chọn chức vụ --</option>
                  <option>Bán hàng</option>
                  <option>Tư vấn</option>
                  <option>Dịch vụ</option>
                  <option>Thu Ngân</option>
                  <option>Quản kho</option>
                  <option>Bảo trì</option>
                  <option>Kiểm hàng</option>
                  <option>Bảo vệ</option>
                  <option>Tạp vụ</option>
                </select>
              </div>
              <div class="form-group col-md-12">
                <label class="control-label">Ảnh 3x4 nhân viên</label>
                <div id="myfileupload">
                  <input type="file" id="uploadfile" name="nv_image" onchange="readURL(this);" />
                </div>
                <div id="thumbbox">
                  <img height="300" width="300" alt="Thumb image" id="thumbimage" style="display: none" />
                  <a class="removeimg" href="javascript:"></a>
                </div>
                <div id="boxchoice">
                  <a href="javascript:" class="Choicefile"><i class='bx bx-upload'></i></a>
                  <p style="clear:both"></p>
                </div>

              </div>



          </div>
          <button class="btn btn-save" type="submit">Lưu lại</button>
          <a class="btn btn-cancel" href="">Hủy bỏ</a>
          </form>
        </div>


  <!--
  MODAL
-->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">

        <div class="modal-body">
          <div class="row">
            <div class="form-group  col-md-12">
              <span class="thong-tin-thanh-toan">
                <h5>Tạo chức vụ mới</h5>
              </span>
            </div>
            <div class="form-group col-md-12">
              <label class="control-label">Nhập tên chức vụ mới</label>
              <input class="form-control" type="text" required>
            </div>
          </div>
          <BR>
          <button class="btn btn-save" type="button">Lưu lại</button>
          <a class="btn btn-cancel" data-dismiss="modal" href="#">Hủy bỏ</a>
          <BR>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>
  <!--
  MODAL
-->


@endsection
@section('script')
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- <script src="{{asset('../template_Mago/doc/src/jquery.table2excel.js')}}"></script> -->
<!-- The javascript plugin to display page loading on top-->
<script src="{{asset('../template_Mago/doc/js/plugins/pace.min.js')}}"></script>
<!-- Page specific javascripts-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<!-- Data table plugin-->
<script type="text/javascript" src="{{asset('../template_Mago/doc/js/plugins/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('../template_Mago/doc/js/plugins/dataTables.bootstrap.min.js')}}"></script>
<script>

    function readURL(input, thumbimage) {
      if (input.files && input.files[0]) { //Sử dụng  cho Firefox - chrome
        var reader = new FileReader();
        reader.onload = function (e) {
          $("#thumbimage").attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
      }
      else { // Sử dụng cho IE
        $("#thumbimage").attr('src', input.value);

      }
      $("#thumbimage").show();
      $('.filename').text($("#uploadfile").val());
      $('.Choicefile').css('background', '#14142B');
      $('.Choicefile').css('cursor', 'default');
      $(".removeimg").show();
      $(".Choicefile").unbind('click');

    }
    $(document).ready(function () {
      $(".Choicefile").bind('click', function () {
        $("#uploadfile").click();

      });
      $(".removeimg").click(function () {
        $("#thumbimage").attr('src', '').hide();
        $("#myfileupload").html('<input type="file" id="uploadfile"  onchange="readURL(this);" />');
        $(".removeimg").hide();
        $(".Choicefile").bind('click', function () {
          $("#uploadfile").click();
        });
        $('.Choicefile').css('background', '#14142B');
        $('.Choicefile').css('cursor', 'pointer');
        $(".filename").text("");
      });
    })
  </script>
@endsection