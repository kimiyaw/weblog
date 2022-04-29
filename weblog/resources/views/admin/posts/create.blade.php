
@include('layout.header')

<div class="container">
    <div class="row align-items-center">
        <div class="col-md-8">
            <h3>افزودن پست جدید</h3>
            <div class="contact-form">
                <form method="post" action="/adminpanel/posts/store" enctype="multipart/form-data">
                    @csrf

                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="عنوان پست را وارد کنید" name="title" />
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="slug" placeholder="لینک را وارد کنید" />
                        </div>

                    <div class="form-group">
                        <select class="form-control"  name="category_id">
                            <option>دسته بندی مورد نظر را وارد کنید</option>
                            @foreach($categories as $category)

                                <option value="{{$category->id}}">{{$category->title}}</option>

                            @endforeach

                        </select>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="body" placeholder="متن پست را وارد کنید"></textarea>
                    </div>

                    <div class="form-group">
                        <input type="file" name="image" class="form-control" placeholder="آپلود عکس مربوط به پست">
                    </div>
                    <div><button class="btn" name="submit" type="submit">ارسال</button></div>
                </form>
                @include('layout.errors')
            </div>
        </div>
        <div class="col-md-4">
            <div class="contact-info">
                <h3>Get in Touch</h3>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. In condimentum quam ac mi viverra dictum. In efficitur ipsum diam, at dignissim lorem tempor in. Vivamus tempor hendrerit finibus.
                </p>
                <h4><i class="fa fa-map-marker"></i>123 News Street, NY, USA</h4>
                <h4><i class="fa fa-envelope"></i>info@example.com</h4>
                <h4><i class="fa fa-phone"></i>+123-456-7890</h4>
                <div class="social">
                    <a href=""><i class="fab fa-twitter"></i></a>
                    <a href=""><i class="fab fa-facebook-f"></i></a>
                    <a href=""><i class="fab fa-linkedin-in"></i></a>
                    <a href=""><i class="fab fa-instagram"></i></a>
                    <a href=""><i class="fab fa-youtube"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@include('layout.footer')
