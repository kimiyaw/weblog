
@include('layout.header')
<div class="row">
    <div class="col-sm-12">
        <div class="box">
            <div class="box-header with-border">
                <h1 class="box-title ml-4">
                    پست ها
                </h1>
            </div>
            <div class="box-body">
                <div class="table-responsive">
                    <table id="example5" class="table table-bordered table-striped ml-3" style="width:90%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>عنوان پست</th>
                            <th> دسته بندی</th>
                            <th> لینک پست</th>
                            <th> عکس پست</th>
                            <th>ویرایش</th>
                            <th>حذف</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{$post->id}}</td>
                                <td>{{$post->title}}</td>
                                <td>{{$post->category->title}}</td>
                                <td>{{$post->slug}}</td>
                                <td><img src="{{str_replace('public','/storage',$post->image)}}" width="80" height="50"></td>
                                <td>
                                    <a href="/adminpanel/posts/{{$post->id}}/edit" class="btn btn-sm btn-primary">ویرایش</a>
                                </td>
                                <td>
                                    <form action="/adminpanel/posts/{{$post->id}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="btn btn-danger btn-sm" value="حذف">
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>


                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layout.footer')




