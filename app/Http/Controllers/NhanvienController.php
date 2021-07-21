<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Session;
use App\Nhanvien;

class NhanvienController extends Controller
{
    public function index()
    {
         $listNhanvien = Nhanvien::all();
        return view('nhanvien.index',compact('listNhanvien'));
    }
    public function create()
    {
        return view('nhanvien.create');
    }

    public function store(Request $request)
    { //Lưu hình thẻ khi có file hình
        $getimage = '';
        if($request->hasFile('nv_image')){
            //Hàm kiểm tra dữ liệu
            $this->validate($request, 
                [
                    //Kiểm tra đúng file đuôi .jpg,.jpeg,.png.gif và dung lượng không quá 2M
                    'nv_image' => 'mimes:jpg,jpeg,png,gif|max:2048',
                ],          
                [
                    //Tùy chỉnh hiển thị thông báo không thõa điều kiện
                    'nv_image.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
                    'nv_image.max' => 'Hình thẻ giới hạn dung lượng không quá 2M',
                ]
            );
            
            //Lưu hình ảnh vào thư mục public/upload/image
            $nv_image = $request->file('nv_image');
            $getimage = time().'_'.$nv_image->getClientOriginalName();
            $destinationPath = public_path('upload/images');
            $nv_image->move($destinationPath, $getimage);
            }
            
            //Lấy giá trị đã nhập
            date_default_timezone_set("Asia/Ho_Chi_Minh");
            $nhanvien = new Nhanvien;
            $nhanvien->nv_name = $request->nv_name; 
            $nhanvien->nv_email = $request->nv_email;
            $nhanvien->nv_password = $request->nv_password;
            $nhanvien->nv_adress = $request->nv_adress;
            $nhanvien->role_id = 1;
            $nhanvien->nv_phone = $request->nv_phone;
            $nhanvien->nv_birthdate = $request->nv_birthdate;
            $nhanvien->nv_cmnd = $request->nv_cmnd;
            $nhanvien->nv_sex = $request->nv_sex;
            $nhanvien->nv_salary = $request->nv_salary;
            $nhanvien->nv_image = $getimage;
            $nhanvien->save();
            

            if ($nhanvien) {
                Session::flash('success', 'Đã thêm nhân viên!');
            }else {                        
                Session::flash('error', 'Thêm thất bại!');
            }
            
            //Thực hiện chuyển trang
            return redirect('nhan-vien/danh-sach-nhan-vien');
    }

    public function edit($id)
    {
        $category = Category::all();
        $listProducts = Products::all();
        return view('products.edit',compact('category','listProducts'));
    }
    public function update(Request $request)
    {
       //Cap nhat sua hoc sinh
    date_default_timezone_set("Asia/Ho_Chi_Minh");  

    //Thực hiện lưu thay đổi hình thẻ khi có file
    if($request->hasFile('nv_image')){
        $this->validate($request, 
            [
                'pr_image' => 'mimes:jpg,jpeg,png,gif|max:2048',
            ],          
            [
                'pr_image.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
                'pr_image.max' => 'Hình thẻ giới hạn dung lượng không quá 2M',
            ]
        );
        
        //Xóa file hình thẻ cũ
        $getHT = DB::table('products')->select('pr_image')->where('id',$request->id)->get();
        if($getHT[0]->pr_image != '' && file_exists(public_path('upload/images/'.$getHT[0]->pr_image)))
        {
            unlink(public_path('upload/pr_image/'.$getHT[0]->pr_image));
        }
        
        //Lưu file hình thẻ mới
        $pr_image = $request->file('pr_image');
        $getimage = time().'_'.$impr_imageage->getClientOriginalName();
        $destinationPath = public_path('upload/images');
        $pr_image->move($destinationPath, $getimage);
        $updateimage = DB::table('products')->where('id', $request->id)->update([
            'pr_image' => $getimage
        ]);
    }
    
    
        //Thực hiện câu lệnh update với các giá trị $request trả về
        $updateData = DB::table('products')->where('id', $request->id)->update([
            'pr_name' => $request->pr_name,
            'pr_price_nhap' => $request->pr_price_nhap,
            'pr_price_ban' => $request->pr_price_ban,
            'pr_name' => $request->pr_name,
            'pr_soluong' => $request->pr_soluong,
            'pr_contents' => $request->pr_contents,
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        
        //Kiểm tra lệnh update để trả về một thông báo
        if ($updateData) {
            Session::flash('success', 'Sửa danh mục thành công!');
        }else {                        
            Session::flash('error', 'Sửa thất bại!');
        }
        
        //Thực hiện chuyển trang
        return redirect('products/edit/'.$request->id);
    }

    public function destroy($id)
    {
        $deleteData = DB::table('products')->where('id', '=', $id)->delete();

            if ($deleteData) {
                
                Session::flash('success', 'Xóa  thành công!');
            }else {                        
                Session::flash('error', 'Xóa thất bại!');
            }
        return redirect('products/list');
    }
}
