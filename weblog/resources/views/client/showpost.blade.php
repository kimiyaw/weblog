@include('layout.header')


<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <div class="sn-container">
                <div class="sn-img">

                    <img src="{{str_replace('public','/storage',$post->image)}}" class="mt-4" />

                </div>
                <div class="sn-content">
                    <h1 class="sn-title">{{$post->title}}</h1>
                    <p>
                        {{$post->body}}
                    </p>

                </div>
            </div>
            <div class="sn-related">
                <h2>مشابهات</h2>

                <div class="row sn-slider">
                    @foreach($posts as $posties)

                   @if($post->category_id == $posties->category_id)
                    <div class="col-md-4">
                        <div class="sn-img">
                            <img src="{{str_replace('public','/storage',$posties->image)}}" width="200" />
                            <div class="sn-title">
                                <a href="{{$posties->title}}">{{$posties->title}}</a>
                            </div>
                        </div>
                    </div>
                        @endif
                    @endforeach


                </div>

            </div>
        </div>

        <div class="col-lg-4">
            <div class="sidebar">
                <div class="sidebar-widget">
                    <h2 class="sw-title">در این دسته بندی</h2>
                    <div class="news-list">
                        @foreach($posts as $posties)
                            @if($post->category_id == $posties->category_id)
                        <div class="nl-item">
                            <div class="nl-img">
                                <img src="{{str_replace('public','/storage',$posties->image)}}" width="200" />
                            </div>
                            <div class="nl-title">
                                <a href="">{{$posties->title}}</a>
                            </div>
                        </div>
                            @endif
                        @endforeach

                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
</div>

@include('layout.footer')
