@extends('admin.layouts.app')

@section('title',__('site.targeted_group'))

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>@lang('site.targeted_group')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li><a href="{{ route('admin.targeted_group.index') }}"> @lang('site.targeted_group')</a></li>
                <li class="active">@lang('site.add') </li>
            </ol>
        </section>

        <section class="content">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Add New Item</h3>
                </div><!-- end of box header -->
                <div class="box-body">


                    <form action="{{ route('admin.targeted_group.store') }}" method="post">

                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="title_for">Targeted Group</label>
                            <input type="text" class="form-control {{ $errors->has('title') ? 'has-error is-invalid' : ''  }}" name="title" placeholder="Place Enter Targeted Group" id="title_for" value="{{ old('title') }}">
                             @error('title')
                                <span style="color:red">{{$message}}</span>
                             @enderror
                         </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Save</button>
                        </div>

                    </form><!-- end of form -->

                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section>

    </div><!-- end of content wrapper -->

@endsection
