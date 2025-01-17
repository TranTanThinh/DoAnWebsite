@extends('Template.layouts.app')
@section('title', 'Blog')
@section('main')
    <style>
        .title-serach {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            padding: 6px 3px;
        }

        .title-serach>h1 {
            width: 30%;
        }

        .title-serach>form {
            width: 30%;
        }

        .title-serach>form div input {
            outline: none;
            width: 75%;
            padding: 5px 8px;
            border-radius: 5px;
            border: 1px solid #C7C7C7;
        }

        .title-serach>form div button {
            width: 20%;
            padding: 5px 12px;
            background-color: green;
            color: white;
            border: none;
            border-radius: 5px;
        }

        /* Định dạng cho danh sách blog */
        .blog-list {
            display: grid;
            /* Sử dụng CSS Grid để chia layout */
            grid-template-columns: repeat(5, 1fr);
            /* Chia thành 5 cột đều */
            gap: 20px;
            /* Khoảng cách giữa các bài viết */
            padding: 0;
            margin: 0;
            list-style-type: none;
            /* Loại bỏ dấu chấm đầu dòng */
        }

        /* Định dạng mỗi bài viết */
        .blog-item {
            display: flex;
            /* Sử dụng flexbox trong từng phần tử để căn đều nội dung */
            flex-direction: column;
            /* Xếp các phần tử bên trong theo chiều dọc */
            padding: 15px;
            border: 1px solid #ddd;
            /* Đường viền bao quanh mỗi bài viết */
            background-color: #f9f9f9;
            /* Màu nền của mỗi bài viết */
            border-radius: 5px;
            /* Bo tròn các góc */
            transition: background-color 0.3s;
            /* Hiệu ứng khi di chuột */
            height: 100%;
            /* Đảm bảo mỗi phần tử có chiều cao đầy đủ */
        }

        /* Hiệu ứng hover cho mỗi bài viết */
        .blog-item:hover {
            background-color: #e9e9e9;
            /* Đổi màu nền khi di chuột vào bài viết */
        }

        /* Định dạng cho tiêu đề bài viết */
        .blog-item h2 {
            font-size: 16px;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
            margin-top: 0;
        }

        /* Định dạng cho hình ảnh bài viết */
        .blog-image {
            width: 100%;
            /* Đảm bảo ảnh chiếm hết chiều rộng của phần tử */
            height: auto;
            margin-bottom: 10px;
        }

        /* Định dạng cho nội dung bài viết */
        .blog-item p {
            font-size: 14px;
            color: #666;
            margin-bottom: 10px;
        }

        /* Định dạng cho link "Xem chi tiết" */
        .blog-detail-link {
            color: #007bff;
            text-decoration: none;
        }

        .blog-detail-link:hover {
            text-decoration: underline;
        }

        /* Đảm bảo phân trang nằm dưới danh sách và không bị ảnh hưởng */
        .pagination {
            margin-top: 20px;
            text-align: center;
        }

        /* Chuyển thành 3 cột khi màn hình nhỏ (tablet) */
        @media (max-width: 1024px) {
            .blog-list {
                grid-template-columns: repeat(3, 1fr);
                /* Chuyển thành 3 cột khi màn hình nhỏ */
            }
        }

        /* Chuyển thành 1 cột khi màn hình rất nhỏ (mobile) */
        @media (max-width: 768px) {
            .blog-list {
                grid-template-columns: 1fr;
                /* Chuyển thành 1 cột khi màn hình rất nhỏ */
            }
        }
    </style>
    {{-- @include('Template.components.banner') --}}
    <div class="container-blog">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <h1 class="text-center mb-4">Chính Sách Công Ty FANTASTIC</h1>

                <!-- Mô tả về chính sách công ty -->
                <p class="lead">
                    Chính sách của công ty [Tên Công Ty] được xây dựng nhằm mang đến cho khách hàng những sản phẩm rau củ
                    quả chất lượng, an toàn và phục vụ tận tâm. Chúng tôi cam kết cung cấp sản phẩm tươi ngon, đạt tiêu
                    chuẩn vệ sinh an toàn thực phẩm và giao hàng đúng hẹn.
                </p>

                <!-- Các mục chính sách -->
                <div class="policy-section">
                    <h3>1. Chính Sách Chất Lượng Sản Phẩm</h3>
                    <p>Mục tiêu: Đảm bảo mọi sản phẩm rau củ quả đều được kiểm tra chất lượng và an toàn trước khi đến tay
                        khách hàng.</p>
                    <ul>
                        <li>Sản phẩm được kiểm tra kỹ lưỡng về nguồn gốc và chất lượng.</li>
                        <li>Không sử dụng hóa chất độc hại trong quá trình sản xuất và bảo quản.</li>
                        <li>Sản phẩm được đóng gói đúng quy chuẩn vệ sinh an toàn thực phẩm.</li>
                    </ul>
                </div>

                <div class="policy-section">
                    <h3>2. Chính Sách Giao Hàng</h3>
                    <p>Mục tiêu: Đảm bảo giao hàng nhanh chóng, đúng hẹn và tiết kiệm chi phí cho khách hàng.</p>
                    <ul>
                        <li>Giao hàng tận nơi trong vòng 24-48 giờ sau khi đặt hàng (tuỳ khu vực).</li>
                        <li>Miễn phí giao hàng cho các đơn hàng trên một mức giá nhất định.</li>
                        <li>Đảm bảo sản phẩm luôn tươi ngon khi đến tay khách hàng.</li>
                    </ul>
                </div>

                <div class="policy-section">
                    <h3>3. Chính Sách Thanh Toán</h3>
                    <p>Mục tiêu: Cung cấp các phương thức thanh toán linh hoạt và an toàn cho khách hàng.</p>
                    <ul>
                        <li>Thanh toán trực tuyến qua các cổng thanh toán an toàn (VNPay, MoMo, Visa, MasterCard...).</li>
                        <li>Thanh toán khi nhận hàng (COD) đối với một số khu vực nhất định.</li>
                        <li>Thông báo đơn hàng và xác nhận thanh toán qua email hoặc tin nhắn ngay khi giao dịch thành công.
                        </li>
                    </ul>
                </div>

                <div class="policy-section">
                    <h3>4. Chính Sách Đổi Trả Sản Phẩm</h3>
                    <p>Mục tiêu: Đảm bảo quyền lợi khách hàng khi gặp vấn đề về sản phẩm.</p>
                    <ul>
                        <li>Chấp nhận đổi trả trong vòng 24 giờ nếu sản phẩm không đúng chất lượng hoặc bị hư hỏng trong quá
                            trình vận chuyển.</li>
                        <li>Đảm bảo hoàn tiền hoặc đổi sản phẩm trong trường hợp có lỗi từ phía công ty.</li>
                        <li>Sản phẩm phải còn nguyên bao bì và chưa bị sử dụng.</li>
                    </ul>
                </div>

                <div class="policy-section">
                    <h3>5. Chính Sách Chăm Sóc Khách Hàng</h3>
                    <p>Mục tiêu: Đảm bảo khách hàng luôn nhận được sự hỗ trợ và dịch vụ tốt nhất từ công ty.</p>
                    <ul>
                        <li>Cung cấp dịch vụ tư vấn miễn phí về sản phẩm cho khách hàng qua điện thoại hoặc chat trực tuyến.
                        </li>
                        <li>Hỗ trợ đổi trả, hoàn tiền nhanh chóng nếu khách hàng không hài lòng với sản phẩm.</li>
                        <li>Cập nhật thông tin và khuyến mãi thường xuyên qua email và các kênh truyền thông.</li>
                    </ul>
                </div>

                <div class="policy-section">
                    <h3>6. Chính Sách Bảo Mật Thông Tin</h3>
                    <p>Mục tiêu: Bảo vệ thông tin cá nhân và dữ liệu của khách hàng một cách an toàn và bảo mật.</p>
                    <ul>
                        <li>Cam kết bảo mật thông tin cá nhân của khách hàng theo quy định của pháp luật.</li>
                        <li>Không chia sẻ thông tin khách hàng với bất kỳ bên thứ ba nào mà không có sự đồng ý của khách
                            hàng.</li>
                        <li>Đảm bảo hệ thống thanh toán an toàn và không lưu trữ thông tin thanh toán của khách hàng.</li>
                    </ul>
                </div>

                <!-- Thông tin liên hệ -->
                <div class="contact-info mt-4">
                    <h4>Liên Hệ:</h4>
                    <p>Email: <a href="mailto:contact@company.com">contact@company.com</a></p>
                    <p>Điện thoại: 0123 456 789</p>
                </div>
            </div>
        </div>
    </div>
   

        <ul class="blog-list">
            @foreach ($blogs as $blog)
                <li class="blog-item">
                    <h2>{{ $blog->title }}</h2>
                    <p><strong>Author:</strong> {{ $blog->author }}</p>
                    <img src="{{ asset('Template/images/' . $blog->image) }}" alt="{{ $blog->title }}" class="blog-image">
                    <p>{{ Str::limit($blog->content, 150) }}</p>
                    <p><strong>Lượt xem:</strong> {{ $blog->view }}</p>
                    <a href="{{ route('blogs.show', ['slug' => $blog->slug]) }}" class="blog-detail-link">Xem chi tiết</a>
                </li>
            @endforeach
        </ul>

        <!-- Phân trang -->
        <div>
            {{ $blogs->appends(request()->all())->links() }}
        </div>
    </div>


@endsection
