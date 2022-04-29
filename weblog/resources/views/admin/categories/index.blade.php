
@include('layout.header')
    <div class="row">
        <div class="col-sm-12">
            <div class="box">
                <div class="box-header with-border">
                    <h1 class="box-title ml-4">
                        دسته بندی ها
                    </h1>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example5" class="table table-bordered table-striped ml-3" style="width:90%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th> دسته بندی</th>
                                <th>ویرایش</th>
                                <th>حذف</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->title}}</td>
                                    <td>
                                        <a href="/adminpanel/categories/{{$category->id}}/edit" class="btn btn-sm btn-primary">ویرایش</a>
                                    </td>
                                    <td>
                                        <form action="/adminpanel/categories/{{$category->id}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" class="btn btn-danger btn-sm" value="حذف">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                            @include('layout.errors')


                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@include('layout.footer')




