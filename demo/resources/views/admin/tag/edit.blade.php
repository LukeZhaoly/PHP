@extends("admin.layouts")
@section("content")
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>
                    标签&nbsp;&nbsp;&nbsp;<small>Edit</small>
                </h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 class="">修改标签表单</h1>
                    </div>
                    <div class="panel-body">

                        @include('admin.partials.errors')

                        <form role="form" method="POST" action="/admin/tag/{{$id}}">
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="id" value="{{$id}}">
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
                                        修改标签
                                    </button>
                                    <button type="button" class="btn-danger btn btn-primary" data-toggle="modal" data-target="#modal-delete">删除标签</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{--    删除--}}
    <div class="modal fade" id="modal-delete" tabIndex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        ×
                    </button>
                    <h4 class="modal-title">请确认</h4>
                </div>
                <div class="modal-body">
                    <p class="lead">
                        <i class="fa fa-question-circle fa-lg"></i>
                        确定要删除这个标签?
                    </p>
                </div>
                <div class="modal-footer">
                    <form method="POST" action="/admin/tag/{{ $id }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-times-circle"></i> 确认
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection