@extends('master')
@section('title','Thêm danh mục')
@section('content')
<div class="container">
    <div class="row">
       <!-- general form elements disabled -->
       <div class="card card-warning col-sm-8 offset-sm-2">
              <div class="card-header">
                <h3 class="card-title">Thêm sản phẩm</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              @foreach($listProducts as $listPr)
              <form action="{{url('products/update')}}" method="post" enctype="multipart/form-data">
                <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}"/>
                <input type="hidden" name="user_id" value="1"/>
                <input type="hidden" name="id" value="{{$listPr->id}}"/>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input type="text" class="form-control" name="pr_name" value="{{$listPr->pr_name}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Giá nhập</label>
                                <input type="number" class="form-control" name="pr_price_nhap" value="{{$listPr->pr_price_nhap}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Giá bán</label>
                                <input type="number" class="form-control" name="pr_price_ban" value="{{$listPr->pr_price_ban}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Số lượng kho</label>
                                <input type="number" class="form-control" name="pr_soluong" value="{{$listPr->pr_soluong}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Danh mục</label>
                                <select multiple class="form-control" name="cat_id">
                                   @foreach($category as $cat)
                                   <option value="{{$cat->id}}">{{$cat->cat_name}}</option>
                                   @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea id="summernote" name="pr_contents" rows="3">
                                    {{$listPr->pr_contents}}
                                </textarea>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>hình</label>
                                <input type="file" class="form-control" name="pr_image" placeholder="Hình ảnh"  />
                            </div>
                        </div>
                    </div>
                  <center><button type="submit" class="btn btn-primary">update</button></center>
                </form>
                @endforeach
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
    </div>
</div>
@endsection