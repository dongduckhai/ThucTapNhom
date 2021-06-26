<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use App\Product;
use App\Cat;
use App\Order;

class AdminProductController extends Controller
{
    function __construct()
    {
        $this->middleware(function ($request, $next) {
            session(['module_active' => 'product']);
            return $next($request);
        });
    }
    //===================Danh sách======================
    function list(Request $request)
    {
        //Các trường tìm kiếm
        $cat_id = "";
        if ($request->input('keyword')) {
            $keyword = $request->input('keyword');
            if ($request->input('cat') == NULL || $request->input('cat') == 'all') {
                $data = [
                    ['name', 'LIKE', "%{$keyword}%"],
                ];
            } else {
                $cat_id = $request->input('cat');
                $data = [
                    ['name', 'LIKE', "%{$keyword}%"],
                    ['cat_id', '=', "{$cat_id}"]
                ];
            }
        } else {
            $keyword = "";
            if (!$request->input('cat') || $request->input('cat') == 'all' || $request->input('cat') == NULL) {
                $data = [
                    ['name', 'LIKE', "%{$keyword}%"]
                ];
            } else {
                $cat_id = $request->input('cat');
                $data = [
                    ['name', 'LIKE', "%{$keyword}%"],
                    ['cat_id', '=', "{$cat_id}"]
                ];
            }
        }
        //lọc sản phẩm theo giá
        if ($request->input('min_price')) {
            $min_price = $request->input('min_price');
            if ($request->input('max_price')) {
                $max_price = $request->input('max_price');
            } else {
                $max_price = Product::withTrashed()->max('price');
            }
        } else {
            $min_price = 0;
            if ($request->input('max_price')) {
                $max_price = $request->input('max_price');
            } else {
                $max_price = Product::withTrashed()->max('price');
            }
        }
        //Dropdown act_list
        $act_list = [
            'delete' => 'Xóa tạm thời',
            'hot' => 'Nổi bật',
            'changeStatus' => 'Duyệt'
        ];
        //Danh sách dựa theo status
        if ($request->input('status')) {
            $status = $request->input('status');
            if ($status == 'trash') {
                $act_list = [
                    'restore' => 'Khôi phục',
                    'forceDelete' => 'Xóa vĩnh viễn'
                ];
                $products = Product::onlyTrashed()
                    ->where($data)
                    ->where('price', '>', "{$min_price}")
                    ->where('price', '<=', "{$max_price}")
                    ->orderBy('brand_id')
                    ->paginate(5);
                $product_active = 'trash';
            }
            if ($status == 'wait') {
                $act_list = [
                    'delete' => 'Xóa tạm thời',
                    'changeStatus' => 'Duyệt'
                ];
                $products = Product::where($data)
                    ->where('status', '=', '1')
                    ->where('price', '>', "{$min_price}")
                    ->where('price', '<=', "{$max_price}")
                    ->orderBy('brand_id')
                    ->paginate(5);
                $product_active = 'wait';
            }
            if ($status == 'hot') {
                $act_list = [
                    'delete' => 'Xóa tạm thời',
                    'normal' => 'Bình thường'
                ];
                $products = Product::where($data)
                    ->where('hot', '=', 'On')
                    ->where('price', '>', "{$min_price}")
                    ->where('price', '<=', "{$max_price}")
                    ->orderBy('brand_id')
                    ->paginate(5);
                $product_active = 'hot';
            }
            if ($status == 'all') {
                $products = Product::where($data)
                    ->where('price', '>', "{$min_price}")
                    ->where('price', '<=', "{$max_price}")
                    ->orderBy('brand_id')
                    ->paginate(5);
                $product_active = 'all';
            }
        } else {
            $status = "all";
            $products = Product::where($data)
                ->where('price', '>', "{$min_price}")
                ->where('price', '<=', "{$max_price}")
                ->orderBy('brand_id')
                ->paginate(5);
            $product_active = 'all';
        }

        //Dropdown cat_list
        $cat_list = Cat::all();
        //số lượng phần tử theo từng loại
        $count_all_product = Product::count();
        $count_trash_product = Product::onlyTrashed()->count();
        $count_wait_product = Product::where('status', '=', '1')->count();
        $count_hot_product = Product::where('hot', '=', 'On')->count();
        $count = [$count_all_product, $count_trash_product, $count_wait_product, $count_hot_product];
        return view('admin.product.list', compact(
            'products',
            'count',
            'act_list',
            'product_active',
            'cat_list',
            'status',
            'keyword',
            'cat_id',
            'min_price',
            'max_price'
        ));
    }
    //===================Thêm mới=======================
    function add()
    {
        $brand_list = Brand::all()->where('status', '=', '2');
        return view('admin.product.add', compact('brand_list'));
    }
    function store(Request $request)
    {
        $request->validate(
            [
                'file' => 'required|image',
                'price' => 'required|integer|min:0',
                'name' => 'required|string|max:255',
                'desc' => 'required|string|max:255',
                'details' => 'required',
                'brand_id' => 'required',
                'status' => 'required'
            ],
            [
                'required' => 'Không được để trống :attribute',
                'max' => ':attribute có độ dài tối đa :max ký tự',
                'image' => ':attribute phải là ảnh',
                'string' => ':attribute phải có chữ',
                'integer' => ':attribute phải là số',
                'min' => ':attribute phải > 0'

            ],
            [
                'file' => 'Ảnh tiêu đề',
                'price' => 'Giá sản phẩm',
                'old_price' => 'Giá cũ',
                'name' => 'Tên sản phẩm',
                'desc' => 'Mô tả',
                'details' => 'Chi tiết',
                'brand_id' => 'Danh mục',
                'status' => 'Trạng thái'
            ]
        );
        /* Xử lý đường dẫn đến thumbnail */
        if ($request->hasFile('file')) {
            $file = $request->file;
            $filename = $file->getClientOriginalName();
            $file->move('public/uploads', $filename);
            $thumbnail = 'public/uploads/' . $filename;
        }
        /* Dựa vào brand_id tìm cat_id */
        $brand_id = $request->input('brand_id');
        $brand = Brand::find($brand_id);
        Product::create([
            'thumbnail' => $thumbnail,
            'price' => $request->input('price'),
            'old_price' => $request->input('old_price'),
            'name' => $request->input('name'),
            'desc' => $request->input('desc'),
            'details' => $request->input('details'),
            'brand_id' => $request->input('brand_id'),
            'cat_id' => $brand->cat_id,
            'status' => $request->input('status'),
            'hot' => $request->input('hot'),
        ]);
        //phải thêm các trường này vào model product protected $fillable
        return redirect('admin/product/list')->with('status', 'Thêm sản phẩm mới thành công');
    }
    //====================Xóa===========================
    function delete($id)
    {
        if (Product::find($id) != null) {
            $product = Product::find($id);
            $product->update(['status' => '3', 'hot' => NULL]);
            $product->delete();
            return redirect('admin/product/list')->with('status', 'Đã thêm vào thùng rác');
        } else {
            $product = Product::onlyTrashed()->find($id);
            if ($product->order->count() == 0) {
                $product->forceDelete();
                return redirect('admin/product/list')->with('status', 'Xóa vĩnh viễn thành công');
            } else {
                return redirect('admin/product/list')->with('alert', 'Không thể xóa vĩnh viễn vì sản phẩm đã ở trong 1 hóa đơn khác');
            }
        }
    }
    //===================Chỉnh sửa======================
    function edit($id)
    {
        $brand_list = Brand::all()->where('status', '2');
        $product = Product::withTrashed()->find($id);
        return view('admin.product.edit', compact('product', 'brand_list'));
    }
    function update(Request $request, $id)
    {
        $request->validate(
            [
                'file' => 'image',
                'price' => 'required|integer|min:0',
                'name' => 'required|string|max:255',
                'desc' => 'required|string|max:255',
                'details' => 'required',
                'brand_id' => 'required',
                'status' => 'required'
            ],
            [
                'required' => 'Không được để trống :attribute',
                'max' => ':attribute có độ dài tối đa :max ký tự',
                'image' => ':attribute phải là ảnh',
                'string' => ':attribute phải có chữ',
                'integer' => ':attribute phải là số',
                'min' => ':attribute phải > 0'

            ],
            [
                'file' => 'Ảnh tiêu đề',
                'price' => 'Giá sản phẩm',
                'old_price' => 'Giá cũ',
                'name' => 'Tên sản phẩm',
                'desc' => 'Mô tả',
                'details' => 'Chi tiết',
                'brand_id' => 'Danh mục',
                'status' => 'Trạng thái'
            ]
        );
        // Dựa vào brand_id tìm cat_id
        $brand_id = $request->input('brand_id');
        $brand = Brand::find($brand_id);
        //Cập nhật
        if ($request->hasFile('file')) {
            $file = $request->file;
            $filename = $file->getClientOriginalName();
            $file->move('public/uploads', $filename);
            $thumbnail = 'public/uploads/' . $filename;
            Product::withTrashed()->where('id', $id)->update([
                'thumbnail' => $thumbnail,
                'price' => $request->input('price'),
                'old_price' => $request->input('old_price'),
                'name' => $request->input('name'),
                'desc' => $request->input('desc'),
                'details' => $request->input('details'),
                'brand_id' => $request->input('brand_id'),
                'cat_id' => $brand->cat_id,
                'status' => $request->input('status'),
                'hot' => $request->input('hot'),
            ]);
        } else {
            Product::withTrashed()->where('id', $id)->update([
                'price' => $request->input('price'),
                'old_price' => $request->input('old_price'),
                'name' => $request->input('name'),
                'desc' => $request->input('desc'),
                'details' => $request->input('details'),
                'brand_id' => $request->input('brand_id'),
                'cat_id' => $brand->cat_id,
                'status' => $request->input('status'),
                'hot' => $request->input('hot'),
            ]);
        }
        return redirect('admin/product/list')->with('status', 'Cập nhật thành công');
    }
    //====================Action========================
    function action(Request $request)
    {
        $check_list = $request->input('check_list');
        if ($check_list) {
            if ($request->input('act') != 'NULL') {
                $act = $request->input('act');
                if ($act == 'delete') {
                    Product::whereIn('id', $check_list)
                        ->update(['status' => '3', 'hot' => NULL]);
                    Product::destroy($check_list);
                    return redirect('admin/product/list')->with('status', 'Đã thêm vào thùng rác');
                }
                if ($act == 'changeStatus') {
                    Product::whereIn('id', $check_list)
                        ->update(['status' => '2']);
                    return redirect('admin/product/list')->with('status', 'Duyệt thành công');
                }
                if ($act == 'hot') {
                    Product::whereIn('id', $check_list)
                        ->update(['hot' => 'On', 'status' => '2']);
                    return redirect('admin/product/list')->with('status', 'Cập nhật thành công');
                }
                if ($act == 'normal') {
                    Product::whereIn('id', $check_list)
                        ->update(['hot' => NULL]);
                    return redirect('admin/product/list')->with('status', 'Cập nhật thành công');
                }
                if ($act == 'restore') {
                    Product::onlyTrashed()
                        ->whereIn('id', $check_list)
                        ->update(['status' => '1', 'hot' => NULL]);
                    Product::onlyTrashed()
                        ->whereIn('id', $check_list)
                        ->restore();
                    return redirect('admin/product/list')->with('status', 'Khôi phục dữ liệu thành công');
                }
                if ($act == 'forceDelete') {
                    Product::onlyTrashed()
                        ->whereIn('id', $check_list)
                        ->forceDelete();
                    return redirect('admin/product/list')->with('status', 'Xóa vĩnh viễn thành công');
                }
            } else {
                return redirect('admin/product/list')->with('alert', 'Hãy chọn 1 tác vụ');
            }
        } else {
            return redirect('admin/product/list')->with('alert', 'Hãy chọn ít nhất 1 phần tử');
        }
    }
}
