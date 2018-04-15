@extends('layouts.backend.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Blog<small>All post</small>
    </h1>
    <ol class="breadcrumb">
      <li class="active">
        <i class="fa fa-dashboard"></i> All post</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <a href="{{ route('backend.blog.create') }}" class="btn btn-sm btn-success">
              <i class="fa fa-plus"></i>Add New Post   
            </a>
          </div>

          <!-- /.box-header -->
          <div class="box-body ">
            @if (session('message'))
                <div class="alert alert-info" style="width:100%">{{ session('message') }}</div>
            @endif
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Action</th>
                  <th>Title</th>
                  <th>Author</th>
                  <th>Date</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($posts as $post)
                  <tr>
                    <td>
                      {!! Form::open(['method'=>'DELETE','route'=>['backend.blog.destroy',$post->id]]) !!}
                      <button type="submit" class="btn btn-danger btn-sm">
                        <i class="fa fa-trash"></i></button>
                      <a href="{{ route('backend.blog.edit', $post->id) }}" class="btn btn-info btn-sm">
                        <i class="fa fa-edit"></i></a>
                      {!! Form::close() !!}
                    </td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->author->name }}</td>
                    <td>{{ $post->created_at }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        {{ $posts->links() }}
        <!-- /.box -->
      </div>
    </div>
    <!-- ./row -->
  </section>
  <!-- /.content -->
</div>
@endsection