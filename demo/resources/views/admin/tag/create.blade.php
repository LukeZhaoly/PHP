@extends("admin.layouts")
@section("content")
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>
                    标签<small>新增</small>
                </h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 class="">新增标签表单</h1>
                    </div>
                    <div class="panel-body">

                        @include('admin.partials.errors')

                        <form role="form" method="POST" action="/admin/tag">
                            {{csrf_field()}}

                            <div class="form-group row">
                                <label for="tag" class="col-md-3 col-form-label">标签</label>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" name="tag" id="tag" value="{{ $tag }}"
                                           autofocus>
                                </div>
                            </div>

                            @include('admin.tag._form')

                            <div class="form-group row">
                                <div class="col-md-7 col-md-offset-3">
                                    <button type="submit" class="btn btn-primary btn-md">
                                        <i class="fa fa-plus-circle"></i>
                                        添加新标签
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection