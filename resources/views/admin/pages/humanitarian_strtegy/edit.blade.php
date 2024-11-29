@extends('admin.layouts.app')

@section('title',__('site.humanitarian_strtegy'))

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>@lang('site.humanitarian_strtegy')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li><a href="{{ route('admin.humanitarian_strtegy.index') }}"> @lang('site.humanitarian_strtegy')</a></li>
                <li class="active">@lang('site.edit') </li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header">
                    <h3 class="box-title">Update Itemm</h3>
                </div><!-- end of box header -->
                <div class="box-body">


                    <form action="{{ route('admin.humanitarian_strtegy.update',$humanitarian_strtegy->id) }}" method="post">

                        {{ csrf_field() }}
                        @method('PUT')

                        <div class="form-group">
                            <label for="title_for">Humanitarian Strtegy</label>
                            <input type="text" class="form-control {{ $errors->has('title') ? 'has-error is-invalid' : ''  }}" name="title" placeholder="Place Enter Humanitarian Strtegy" id="title_for" value="{{ old('title',$humanitarian_strtegy->title) }}">
                             @error('title')
                                <span style="color:red">{{$message}}</span>
                             @enderror
                         </div>

                        <div class="form-group">
                            <label for="humanitarian_strtegy_for">Icon</label>
                            <input type="text" class="form-control {{ $errors->has('icon') ? 'has-error is-invalid' : ''  }}" name="icon" placeholder="Place Enter Icon" id="humanitarian_strtegy_for" value="{{ old('icon',$humanitarian_strtegy->icon) }}">
                            @error('icon')
                            <span style="color:red">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>Update</button>
                        </div>

                    </form><!-- end of form -->

                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section>

    </div><!-- end of content wrapper -->

@endsection
