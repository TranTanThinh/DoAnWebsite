@extends('Template.layouts.app')
@section('title', 'Blog')
@section('main')

{{-- @include('Template.components.banner') --}}
<div class="container-blog">
  <div class="row">
      <div class="col-lg-8 offset-lg-2">
          <h1 class="text-center mb-4">Chính Sách Công Ty FANTASTIC</h1>

          <!-- Mô tả về chính sách công ty -->
          <p class="lead">
              Chính sách của công ty [Tên Công Ty] được xây dựng nhằm mang đến cho khách hàng những sản phẩm rau củ quả chất lượng, an toàn và phục vụ tận tâm. Chúng tôi cam kết cung cấp sản phẩm tươi ngon, đạt tiêu chuẩn vệ sinh an toàn thực phẩm và giao hàng đúng hẹn.
          </p>

          <!-- Các mục chính sách -->
          <div class="policy-section">
              <h3>1. Chính Sách Chất Lượng Sản Phẩm</h3>
              <p>Mục tiêu: Đảm bảo mọi sản phẩm rau củ quả đều được kiểm tra chất lượng và an toàn trước khi đến tay khách hàng.</p>
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
                  <li>Thông báo đơn hàng và xác nhận thanh toán qua email hoặc tin nhắn ngay khi giao dịch thành công.</li>
              </ul>
          </div>

          <div class="policy-section">
              <h3>4. Chính Sách Đổi Trả Sản Phẩm</h3>
              <p>Mục tiêu: Đảm bảo quyền lợi khách hàng khi gặp vấn đề về sản phẩm.</p>
              <ul>
                  <li>Chấp nhận đổi trả trong vòng 24 giờ nếu sản phẩm không đúng chất lượng hoặc bị hư hỏng trong quá trình vận chuyển.</li>
                  <li>Đảm bảo hoàn tiền hoặc đổi sản phẩm trong trường hợp có lỗi từ phía công ty.</li>
                  <li>Sản phẩm phải còn nguyên bao bì và chưa bị sử dụng.</li>
              </ul>
          </div>

          <div class="policy-section">
              <h3>5. Chính Sách Chăm Sóc Khách Hàng</h3>
              <p>Mục tiêu: Đảm bảo khách hàng luôn nhận được sự hỗ trợ và dịch vụ tốt nhất từ công ty.</p>
              <ul>
                  <li>Cung cấp dịch vụ tư vấn miễn phí về sản phẩm cho khách hàng qua điện thoại hoặc chat trực tuyến.</li>
                  <li>Hỗ trợ đổi trả, hoàn tiền nhanh chóng nếu khách hàng không hài lòng với sản phẩm.</li>
                  <li>Cập nhật thông tin và khuyến mãi thường xuyên qua email và các kênh truyền thông.</li>
              </ul>
          </div>

          <div class="policy-section">
              <h3>6. Chính Sách Bảo Mật Thông Tin</h3>
              <p>Mục tiêu: Bảo vệ thông tin cá nhân và dữ liệu của khách hàng một cách an toàn và bảo mật.</p>
              <ul>
                  <li>Cam kết bảo mật thông tin cá nhân của khách hàng theo quy định của pháp luật.</li>
                  <li>Không chia sẻ thông tin khách hàng với bất kỳ bên thứ ba nào mà không có sự đồng ý của khách hàng.</li>
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
<section class="ftco-section ftco-degree-bg">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 ftco-animate">
                      <div class="row">
                          <div class="col-md-12 d-flex ftco-animate">
                  <div class="blog-entry align-self-stretch d-md-flex">
                    <a href="blogsingle" class="block-20" style="background-image: url('Template/images/image_1.jpg');">
                    </a>
                    <div class="text d-block pl-md-4">
                        <div class="meta mb-3">
                        <div><a href="#">July 20, 2019</a></div>
                        <div><a href="#">Admin</a></div>
                        <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                      </div>
                      <h3 class="heading"><a href="blogsingle">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                      <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                      <p><a href="blogsingle" class="btn btn-primary py-2 px-3">Read more</a></p>
                    </div>
                  </div>
                </div>
                <div class="col-md-12 d-flex ftco-animate">
                  <div class="blog-entry align-self-stretch d-md-flex">
                    <a href="blogsingle" class="block-20" style="background-image: url('Template/images/image_2.jpg');">
                    </a>
                    <div class="text d-block pl-md-4">
                        <div class="meta mb-3">
                        <div><a href="#">July 20, 2019</a></div>
                        <div><a href="#">Admin</a></div>
                        <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                      </div>
                      <h3 class="heading"><a href="blogsingle">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                      <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                      <p><a href="blogsingle" class="btn btn-primary py-2 px-3">Read more</a></p>
                    </div>
                  </div>
                </div>
                <div class="col-md-12 d-flex ftco-animate">
                  <div class="blog-entry align-self-stretch d-md-flex">
                    <a href="blogsingle" class="block-20" style="background-image: url('Template/images/image_3.jpg');">
                    </a>
                    <div class="text d-block pl-md-4">
                        <div class="meta mb-3">
                        <div><a href="#">July 20, 2019</a></div>
                        <div><a href="#">Admin</a></div>
                        <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                      </div>
                      <h3 class="heading"><a href="blogsingle">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                      <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                      <p><a href="blogsingle" class="btn btn-primary py-2 px-3">Read more</a></p>
                    </div>
                  </div>
                </div>
                <div class="col-md-12 d-flex ftco-animate">
                  <div class="blog-entry align-self-stretch d-md-flex">
                    <a href="blogsingle" class="block-20" style="background-image: url('Template/images/image_4.jpg');">
                    </a>
                    <div class="text d-block pl-md-4">
                        <div class="meta mb-3">
                        <div><a href="#">July 20, 2019</a></div>
                        <div><a href="#">Admin</a></div>
                        <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                      </div>
                      <h3 class="heading"><a href="blogsingle">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                      <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                      <p><a href="blogsingle" class="btn btn-primary py-2 px-3">Read more</a></p>
                    </div>
                  </div>
                </div>
                <div class="col-md-12 d-flex ftco-animate">
                  <div class="blog-entry align-self-stretch d-md-flex">
                    <a href="blogsingle" class="block-20" style="background-image: url('Template/images/image_5.jpg');">
                    </a>
                    <div class="text d-block pl-md-4">
                        <div class="meta mb-3">
                        <div><a href="#">July 20, 2019</a></div>
                        <div><a href="#">Admin</a></div>
                        <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                      </div>
                      <h3 class="heading"><a href="blogsingle">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                      <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                      <p><a href="blogsingle" class="btn btn-primary py-2 px-3">Read more</a></p>
                    </div>
                  </div>
                </div>
                <div class="col-md-12 d-flex ftco-animate">
                  <div class="blog-entry align-self-stretch d-md-flex">
                    <a href="blogsingle" class="block-20" style="background-image: url('Template/images/image_6.jpg');">
                    </a>
                    <div class="text d-block pl-md-4">
                        <div class="meta mb-3">
                        <div><a href="#">July 20, 2019</a></div>
                        <div><a href="#">Admin</a></div>
                        <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                      </div>
                      <h3 class="heading"><a href="blogsingle">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                      <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                      <p><a href="blogsingle" class="btn btn-primary py-2 px-3">Read more</a></p>
                    </div>
                  </div>
                </div>
                      </div>
        </div> <!-- .col-md-8 -->
        <div class="col-lg-4 sidebar ftco-animate">
          <div class="sidebar-box">
            <form action="#" class="search-form">
              <div class="form-group">
                <span class="icon ion-ios-search"></span>
                <input type="text" class="form-control" placeholder="Search...">
              </div>
            </form>
          </div>
          <div class="sidebar-box ftco-animate">
              <h3 class="heading">Categories</h3>
            <ul class="categories">
              <li><a href="#">Vegetables <span>(12)</span></a></li>
              <li><a href="#">Fruits <span>(22)</span></a></li>
              <li><a href="#">Juice <span>(37)</span></a></li>
              <li><a href="#">Dries <span>(42)</span></a></li>
            </ul>
          </div>

          <div class="sidebar-box ftco-animate">
            <h3 class="heading">Recent Blog</h3>
            <div class="block-21 mb-4 d-flex">
              <a class="blog-img mr-4" style="background-image: url(Template/images/image_1.jpg);"></a>
              <div class="text">
                <h3 class="heading-1"><a href="blogsingle">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                <div class="meta">
                  <div><a href="#"><span class="icon-calendar"></span> April 09, 2019</a></div>
                  <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                  <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                </div>
              </div>
            </div>
            <div class="block-21 mb-4 d-flex">
              <a class="blog-img mr-4" style="background-image: url(Template/images/image_2.jpg);"></a>
              <div class="text">
                <h3 class="heading-1"><a href="blogsingle">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                <div class="meta">
                  <div><a href="#"><span class="icon-calendar"></span> April 09, 2019</a></div>
                  <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                  <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                </div>
              </div>
            </div>
            <div class="block-21 mb-4 d-flex">
              <a class="blog-img mr-4" style="background-image: url(Template/images/image_3.jpg);"></a>
              <div class="text">
                <h3 class="heading-1"><a href="blogsingle">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                <div class="meta">
                  <div><a href="#"><span class="icon-calendar"></span> April 09, 2019</a></div>
                  <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                  <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                </div>
              </div>
            </div>
          </div>

          <div class="sidebar-box ftco-animate">
            <h3 class="heading">Tag Cloud</h3>
            <div class="tagcloud">
              <a href="#" class="tag-cloud-link">fruits</a>
              <a href="#" class="tag-cloud-link">tomatoe</a>
              <a href="#" class="tag-cloud-link">mango</a>
              <a href="#" class="tag-cloud-link">apple</a>
              <a href="#" class="tag-cloud-link">carrots</a>
              <a href="#" class="tag-cloud-link">orange</a>
              <a href="#" class="tag-cloud-link">pepper</a>
              <a href="#" class="tag-cloud-link">eggplant</a>
            </div>
          </div>
          

          <div class="sidebar-box ftco-animate">
            <h3 class="heading">Paragraph</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
          </div>
        </div>

      </div>
    </div>
  </section> <!-- .section -->

@endsection