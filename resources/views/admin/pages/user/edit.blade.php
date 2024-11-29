@extends('admin.layouts.app')

@section('title',__('site.users'))

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>@lang('site.users')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li><a href="{{ route('admin.user.index') }}"></a></li>
                <li class="active">@lang('site.add') </li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header">
                    <h3 class="box-title">@lang('site.add')</h3>
                </div><!-- end of box header -->
                <form action="{{ route('admin.user.update',$user->id) }} " method="POST" enctype="multipart/form-data"> 
                    @csrf
                    @method('PUt')
                    <div class="form-group">
                        <label for="name">{{__('site.name')}}</label>
                        <input type="text" id="name" name="name" value="{{ old('name',$user->name) }}"  class="form-control  {{ $errors->has('name') ? 'has-error is-invalid' : '' }}"placeholder="Enter email ar">
                        @error('name')
                            <span class="error invalid-feedback" style="color:red;">{{$message}}</span>
                        @enderror
                     </div>  

                     <div class="form-group">
                        <label for="email">{{__('site.email')}}</label>
                        <input type="email" id="email" name="email" value="{{ old('email',$user->email) }}"  class="form-control  {{ $errors->has('email') ? 'has-error is-invalid' : '' }}"placeholder="Enter email ar">
                        @error('email')
                            <span class="error invalid-feedback" style="color:red;">{{$message}}</span>
                        @enderror
                     </div>  

                     <div class="form-group">
                        <label for="password">{{__('site.password')}}</label>
                        <input type="password" id="password" name="password" value="{{ old('password') }}"  class="form-control  {{ $errors->has('password') ? 'has-error is-invalid' : '' }}"placeholder="Enter email ar">
                        @error('password')
                            <span class="error invalid-feedback" style="color:red;">{{$message}}</span>
                        @enderror
                     </div>       
                    
                    <div class="form-group">
                        <label for="image">@lang('site.image')</label>
                        <div class="input-group">
                            <input type="file" name="image" class="form-control {{ $errors->has('image') ? 'has-error is-invalid' : '' }}" id="imgInp" >

                            <img id="blah" src="{{ asset('images/user/'.$user->image) }}" alt="no image" width="150" height="150" />
                            @error('image')
                                <span class="error invalid-feedback" style="color:red;">{{$message}}</span>
                            @enderror
                        </div> 
                    </div>
                    <div class="card-footer col-md-4">
                      <button type="submit" class="btn btn-primary" id="btn-save" >Submit</button>
                    </div>
                </form>
            </div><!-- end of box -->

        </section><!-- end of content -->

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
