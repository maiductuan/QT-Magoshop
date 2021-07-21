@extends('master')
@section('title','Thêm sản phẩm')
@section('content')

<div class="app-title">
    <ul class="app-breadcrumb breadcrumb">
    <li class="breadcrumb-item">Danh sách sản phẩm</li>
    <li class="breadcrumb-item"><a href="#">Thêm sản phẩm</a></li>
    </ul>
</div>
<div class="row">
<div class="col-md-12">
<div class="tile">
    <h3 class="tile-title">Tạo mới sản phẩm</h3>
    <div class="tile-body">
    <div class="row element-button">
        <div class="col-sm-2">
        <a class="btn btn-add btn-sm" data-toggle="modal" data-target="#exampleModalCenter"><i
            class="fas fa-folder-plus"></i> Thêm nhà cung cấp</a>
        </div>
        <div class="col-sm-2">
        <a class="btn btn-add btn-sm" data-toggle="modal" data-target="#adddanhmuc"><i
            class="fas fa-folder-plus"></i> Thêm danh mục</a>
        </div>
    </div>
    <form action="{{url('san-pham/tao-san-pham')}}" method="post" enctype="multipart/form-data" class="row">
        <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}"/>
        <input type="hidden" name="user_id" value="1"/>
        <div class="form-group col-md-3">
        <label class="control-label">Mã sản phẩm </label>
        <input class="form-control" disabled placeholder="Auto">
        </div>
        <div class="form-group col-md-3">
        <label class="control-label">Tên sản phẩm</label>
        <input class="form-control" type="text" name="pr_name">
        </div>


        <div class="form-group  col-md-3">
        <label class="control-label">Số lượng</label>
        <input class="form-control" type="number" name="pr_soluong">
        </div>
        <div class="form-group col-md-3 ">
        <label for="exampleSelect1" class="control-label">Tình trạng</label>
        <select class="form-control" id="exampleSelect1">
            <option>-- Chọn tình trạng --</option>
            <option>Còn hàng</option>
            <option>Hết hàng</option>
        </select>
        </div>
        <div class="form-group col-md-3">
        <label for="exampleSelect1" class="control-label">Danh mục</label>
        <select class="form-control" id="exampleSelect1" name="cat_id">
            <option>-- Chọn danh mục --</option>
            @foreach($category as $cat)
            <option value="{{$cat->id}}">{{$cat->cat_name}}</option>
            @endforeach
        </select>
        </div>
        <div class="form-group col-md-3 ">
        <label for="exampleSelect1" class="control-label">Nhà cung cấp</label>
        <select class="form-control" id="exampleSelect1" name="work_id">
            <option>-- Chọn nhà cung cấp --</option>
            @foreach($workshop as $work)
            <option value="{{$work->id}}">{{$work->work_name}}</option>
            @endforeach
        </select>
        </div>
        <div class="form-group col-md-3">
        <label class="control-label">Giá bán</label>
        <input class="form-control" type="text"  name="pr_price_ban">
        </div>
        <div class="form-group col-md-3">
        <label class="control-label">Giá vốn</label>
        <input class="form-control" type="text"  name="pr_price_nhap">
        </div>
        <div class="form-group col-md-12">
        <label class="control-label">Ảnh sản phẩm</label>
        <div id="myfileupload">
            <input type="file" id="uploadfile"name="pr_image" onchange="readURL(this);" />
        </div>
        <div id="thumbbox">
            <img height="450" width="400" alt="Thumb image" id="thumbimage" style="display: none" />
            <a class="removeimg" href="javascript:"></a>
        </div>
        <div id="boxchoice">
            <a href="javascript:" class="Choicefile"><i class="fas fa-cloud-upload-alt"></i> Chọn ảnh</a>
            <p style="clear:both"></p>
        </div>

        </div>
        <div class="form-group col-md-12">
        <label class="control-label">Mô tả sản phẩm</label>
        <textarea class="form-control" name="pr_contents" ></textarea>
        </div>

    </div>
    <button class="btn btn-save" type="submit">Lưu lại</button>
    <a class="btn btn-cancel" href="{{url('san-pham/danh-sach-san-pham')}}">Hủy bỏ</a>
    </form>
</div>

  <!--
  MODAL CHỨC VỤ 
-->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body">
        <form action="{{url('nhan-cung-cap/tao-nha-cung-cap')}}" method="post">
        <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}"/>
          <div class="row">
            <div class="form-group  col-md-12">
              <span class="thong-tin-thanh-toan">
                <h5>Thêm mới nhà cung cấp</h5>
              </span>
            </div>
            <div class="form-group col-md-12">
              <label class="control-label">Nhập tên nhà cung cấp mới</label>
              <input class="form-control" type="text" name="work_name" required>
            </div>
            <div class="form-group col-md-12">
              <label class="control-label">Nhập thông tin nhà cung cấp</label>
              <textarea class="form-control" name="work_contents"></textarea>
            </div>
            <div class="form-group col-md-12">
              <label class="control-label">Nhà cung cấp hiện đang có</label>
                @foreach($workshop as $work)
                <li>{{$work->work_name}}</li>
                @endforeach
            </div>
          </div>
          <BR>
          <button class="btn btn-save" type="sumbit">Lưu lại</button>
          <a class="btn btn-cancel" data-dismiss="modal" href="#">Hủy bỏ</a>
          <BR>
        </form>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>
  <!--
MODAL
-->



  <!--
  MODAL DANH MỤC
-->
  <div class="modal fade" id="adddanhmuc" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body">
        <form action="{{url('danh-muc/tao-danh-muc')}}" method="post">
        <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}"/>
          <div class="row">
            <div class="form-group  col-md-12">
              <span class="thong-tin-thanh-toan">
                <h5>Thêm mới danh mục </h5>
              </span>
            </div>
            <div class="form-group col-md-12">
              <label class="control-label">Nhập tên danh mục mới</label>
              <input class="form-control" type="text" name="cat_name" required>
            </div>
            <div class="form-group col-md-12">
              <label class="control-label">Danh mục sản phẩm hiện đang có</label>
              <ul style="padding-left: 20px;">
                @foreach($category as $cat)
                <li>{{$cat->cat_name}} <a href="{{url('danh-muc/delete',$cat->id)}}" class="float-right text-danger"><span class="fa fa-close"></span></a></li>
                @endforeach
              </ul>
            </div>
          </div>
          <BR>
          <button class="btn btn-save" type="submit">Lưu lại</button>
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

@endsection
@section('script')
<style>
    .Choicefile {
      display: block;
      background: #14142B;
      border: 1px solid #fff;
      color: #fff;
      width: 150px;
      text-align: center;
      text-decoration: none;
      cursor: pointer;
      padding: 5px 0px;
      border-radius: 5px;
      font-weight: 500;
      align-items: center;
      justify-content: center;
    }

    .Choicefile:hover {
      text-decoration: none;
      color: white;
    }

    #uploadfile,
    .removeimg {
      display: none;
    }

    #thumbbox {
      position: relative;
      width: 100%;
      margin-bottom: 20px;
    }

    .removeimg {
      height: 25px;
      position: absolute;
      background-repeat: no-repeat;
      top: 5px;
      left: 5px;
      background-size: 25px;
      width: 25px;
      /* border: 3px solid red; */
      border-radius: 50%;

    }

    .removeimg::before {
      -webkit-box-sizing: border-box;
      box-sizing: border-box;
      content: '';
      border: 1px solid red;
      background: red;
      text-align: center;
      display: block;
      margin-top: 11px;
      transform: rotate(45deg);
    }

    .removeimg::after {
      /* color: #FFF; */
      /* background-color: #DC403B; */
      content: '';
      background: red;
      border: 1px solid red;
      text-align: center;
      display: block;
      transform: rotate(-45deg);
      margin-top: -2px;
    }
  </style>
<!-- <script type="text/javascript" src="{{asset('../template_Mago/ckeditor/ckeditor.js')}}"></script> -->
<script src="http://code.jquery.com/jquery.min.js" type="text/javascript"></script>
<script>
    const inpFile = document.getElementById("inpFile");
    const loadFile = document.getElementById("loadFile");
    const previewContainer = document.getElementById("imagePreview");
    const previewImage = previewContainer.querySelector(".image-preview__image");
    const previewDefaultText = previewContainer.querySelector(".image-preview__default-text");
    inpFile.addEventListener("change", function () {
      const file = this.files[0];
      if (file) {
        const reader = new FileReader();
        previewDefaultText.style.display = "none";
        previewImage.style.display = "block";
        reader.addEventListener("load", function () {
          previewImage.setAttribute("src", this.result);
        });
        reader.readAsDataURL(file);
      }
    });

</script>

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