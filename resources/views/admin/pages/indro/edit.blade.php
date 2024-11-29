@extends('admin.layouts.app')

@section('title',__('site.indros'))

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>@lang('site.indros')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li><a href="{{ route('admin.indro.index') }}"> @lang('site.indros')</a></li>
                <li class="active">@lang('site.edit') </li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header">
                    <h3 class="box-title">Update Itemm</h3>
                </div><!-- end of box header -->
                <div class="box-body">


                    <form action="{{ route('admin.indro.update',$indro->id) }}" method="post" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        @method('PUT')

                        <div class="form-group">
                            <label for="title_for">Title</label>
                            <input type="text" class="form-control {{ $errors->has('title') ? 'has-error is-invalid' : ''  }}" name="title" placeholder="Place Enter Title" id="title_for" value="{{ old('title',$indro->title) }}">
                             @error('title')
                                <span style="color:red">{{$message}}</span>
                             @enderror                        
                         </div>

                        
                        <div class="form-group">
                            <label for="title_en_for">Description</label>
                            <textarea class="textarea {{ $errors->has('title_en') ? 'has-error is-invalid' : ''  }}" name="body" placeholder="Place Enter Description" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" id="title_en_for">{!! old('body',$indro->body)  !!}</textarea>
                             @error('body')
                                <span style="color:red">{{$message}}</span>
                             @enderror                        
                         </div>

                         <div class="form-group">
                            <label for="image">@lang('site.image')</label>
                            <div class="input-group">
                                <input type="file" name="image" class="form-control {{ $errors->has('image') ? 'has-error is-invalid' : '' }}" id="imgInp" >

                                <img id="blah" src="{{ asset('images/indro/'.$indro->image) }}" alt="no image" width="150" height="150" />
                                @error('image')
                                    <span class="error invalid-feedback" style="color:red;">{{$message}}</span>
                                @enderror
                            </div> 
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

@push('script')
    <script>
        $(document).ready(function () {
            imgInp.onchange = evt => {
                const [file] = imgInp.files
                if (file) {
                    blah.src = URL.createObjectURL(file)
                }
            }

            
        });

    </script>
@endpush
