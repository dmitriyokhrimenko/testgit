@extends('layouts.clear')

@section('content')
    <div class="col-sm-12 blog-main">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="errors-validation">
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{route('post.store')}}" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="row">
                <div class="col">
                    <label for="title">@lang('postCreate.Title')</label>
                    <input type="text" class="form-control" id="title" name="title">
                </div>
                <div class="col">
                    <label for="title">{{trans('postCreate.Alias')}}</label>
                    <input type="text" class="form-control" id="alias" name="alias">
                </div>
            </div>

            <div class="form-group">
                <label for="preview">@lang('postCreate.Preview')</label>
                <textarea class="form-control" id="preview" name="preview"></textarea>
            </div>
            <div class="form-group">
                <textarea id="body" class="form-control" name="body"></textarea>
            </div>
            <div class="form-group container">
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-auto mr-auto">
                        <div class="post-thumbnail">
                            <span id="output"></span>
                        </div>
                        <div class="clr"></div>
                        <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />

                        <div id="croppic"></div>
                        <input id="thumbnail" name="thumbnail" type="hidden" class="thumbnail" />
                        <div id="cropContainerHeaderButton" class="file-upload post-thumb">
                            <label>
                                <span id="cropContainerHeaderButton">@lang('postCreate.Select thumbnail')</span>
                            </label>
                        </div>

                    </div>
                    <div class="col-auto align-self-end">
                      <input type="submit" class="btn btn-primary" value="@lang('postCreate.Save')" name='save'>
                      <input type="submit" class="btn btn-primary" value="@lang('postCreate.Save and publish')" name="savepublish">
                    </div>
                  </div>
              </div>
        </form>
    </div>
@endsection
