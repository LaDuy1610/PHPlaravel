@extends('backend.layout')
@section('do-du-lieu')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập nhật sản phẩm
                </header>
                <?php
        $message = Session::get('message');
        if($message){
            echo '<h5  style="color:red;width:100%;align-item:center ;text-align:center;">'.$message.'</h5>';
            Session::put('message', null);
        }
    ?>
                <div class="panel-body">
                    <div class="position-center">
                        @foreach($edit_product as $key => $pro)
                        <form role="form" method="post"action="{{url('/update-product/'.$pro->product_id)}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên sản phẩm</label>
                            <input type="text" class="form-control" value="{{$pro->product_name}}" name="product_name" id="exampleInputEmail1" placeholder="Nhập tên danh mục">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá sản phẩm</label>
                            <input type="text" class="form-control" name="product_price" value="{{$pro->product_price}}" id="exampleInputEmail1" placeholder="Nhập tên danh mục">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ảnh sản phẩm</label>
                            <input type="file" class="form-control" name="product_image" id="exampleInputEmail1">
                            <img src="{{url('../public/upload/product/'.$pro->product_image)}}"/>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả danh mục</label>
                            <textarea style="resize:none; " rows ="8" class="form-control" id="exampleInputPassword1" placeholder="Nhập mô tả sản phẩm" name="product_desc">{{$pro->product_desc}}</textarea>
                            <script type="text/javascript">CKEDITOR.replace('product_desc');</script>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nội dung danh mục</label>
                            <textarea style="resize:none; " rows ="8" class="form-control" id="exampleInputPassword1" placeholder="Nhập mô tả sản phẩm" name="product_content">{{$pro->product_content}}</textarea>
                            <script type="text/javascript">CKEDITOR.replace('product_content');</script>
                        </div>
                        <div class="form-group">
                            <lable>Danh mục sản phẩm</lable>
                            <select name="product_cate" class="form-control m-bot15">
                                @foreach($cate_product as $key => $cate)
                                
                                <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <lable>Thương hiệu</lable>
                            <select name="product_brand" class="form-control m-bot15">
                                @foreach($brand_product as $key => $brand)
                                <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                @endforeach
                                
                            </select>
                        </div>
                        <div class="form-group">
                            <lable>Hiển thị</lable>
                            <select name="product_status" class="form-control m-bot15">
                                <option value="0">Ẩn</option>
                                <option value="1">Hiện</option>
                                
                            </select>
                        </div>
                        
                        <button type="submit" class="btn btn-info" name="add_product">Sửa sản phẩm</button>
                    </form>
                    @endforeach
                    </div>

                </div>
            </section>

    </div>
</div>
@endsection