@extends('layouts.backend.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Add New Post
    </h1>
    <ol class="breadcrumb">
      <li class="active">
        <i class="fa fa-dashboard"></i> All post</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-9">
        <div class="box">
          <div class="box-body">
            {!! Form::model($posts,[
              'method' => 'PUT',
              'route' => ['backend.blog.update',$posts->id],
              'files' => true,
            ])!!}

            @csrf
            
            <div class="form-group" {{ $errors->has('title') ? 'has-error' : '' }}>
              {!! Form::label('title') !!}
              {!! Form::text('title', null, ['class' =>'form-control']) !!}

              @if ($errors->has('title'))
                <span class="help-block">{{ $errors->first('title') }}</span>
              @endif
            </div>

            <div class="form-group" {{ $errors->has('slug') ? 'has-error' : '' }}>
              {!! Form::label('slug') !!}
              {!! Form::text('slug', null, ['class' =>'form-control']) !!}
              <p class="help-block">Example block-level help text here.</p>

              @if ($errors->has('slug'))
                <span class="help-block">{{ $errors->first('slug') }}</span>
              @endif
            </div>

            <div class="form-group" {{ $errors->has('excerpt') ? 'has-error' : '' }}>
              {!! Form::label('excerpt') !!}
              {!! Form::textArea('excerpt', null, ['class' =>'form-control']) !!}

              @if ($errors->has('excerpt'))
                <span class="help-block">{{ $errors->first('excerpt') }}</span>
              @endif
            </div>
            <div class="form-group" {{ $errors->has('content') ? 'has-error' : '' }}>
              {!! Form::label('content') !!}
              {!! Form::textArea('content', null, ['class' =>'form-control']) !!}

              @if ($errors->has('content'))
                <span class="help-block">{{ $errors->first('content') }}</span>
              @endif
            </div>
            <hr/>
            <button type="submit" class="btn btn-primary">Submit</button>

            {!! Form::close() !!}
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <div class="col-md-3">
          <div class="box">
              <div class="box-header with-border">
                  <h3 class="box-title">Publish</h3>
              </div>
              <div class="box-body">
                  <div class="form-group">
                    <label for="published_at">Publish date</label>
                    <input type="text" class="form-control">
                  </div>
              </div>
              <div class="box-footer clearfix">
                  <div class="pull-left">
                      <a href="#" class="btn btn-default">Save Draft</a>
                  </div>
                  <div class="pull-right">
                      <a href="#" class="btn btn-primary">Publish</a>
                  </div>
              </div>
          </div>
          <div class="box">
              <div class="box-header with-border">
                  <h3 class="box-title">Category</h3>
              </div>
              <div class="box-body">
                  <div class="radio">
                      <label>
                        <input type="radio" name="category" id="category-1" value="option1">
                        Web Programming
                      </label>
                  </div>
                  <div class="radio">
                      <label>
                        <input type="radio" name="category" id="category-2" value="option1">
                        Web Design
                      </label>
                  </div>
                  <div class="radio">
                      <label>
                        <input type="radio" name="category" id="category-3" value="option1">
                        Java
                      </label>
                  </div>
              </div>
          </div>
          <div class="box">
              <div class="box-header with-border">
                  <h3 class="box-title">Feature Image</h3>
              </div>
              <div class="box-body text-center">
                  <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                        <img src="http://placehold.it/200x200" width="100%" alt="...">
                    </div>
                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                    <div>
                        <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span>
                        <input type="file" name="...">
                        </span>
                        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                    </div>
                </div>
              </div>
          </div>
      </div>
    </div>
    <!-- ./row -->
  </section>
  <!-- /.content -->
</div>
@endsection