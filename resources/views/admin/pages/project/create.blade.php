@extends('admin.layouts.app')

@section('title',__('site.project'))

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>@lang('site.project')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li><a href="{{ route('admin.project.index') }}"> @lang('site.project')</a></li>
                <li class="active">@lang('site.add') </li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header">
                    <h3 class="box-title">Add New Item</h3>
                </div><!-- end of box header -->
                <div class="box-body">


                    <form action="{{ route('admin.project.store') }}" method="post" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="title_for">Title</label>
                            <input type="text" class="form-control {{ $errors->has('title') ? 'has-error is-invalid' : ''  }}" name="title" placeholder="Place Enter Title" id="title_for" value="{{ old('title') }}">
                             @error('title')
                                <span style="color:red">{{$message}}</span>
                             @enderror
                         </div>


                         <div class="form-group">
                            <label for="images">@lang('site.image')</label>
                            <div class="input-group">
                                <input type="file" name="images[]" multiple class="form-control {{ $errors->has('images') ? 'has-error is-invalid' : '' }}" id="images" >
                                <div id="preview-container" style="margin-top: 10px;">
                                    <!-- صورة افتراضية -->
                                    <img id="default-image" src="{{ asset('images/default.jpg') }} " alt="Default Image" style="width: 150px; height: 150px; object-fit: cover; border: 1px solid #ddd; border-radius: 5px;">
                                </div>
                                @error('images')
                                <div style="color: red;">{{ $message }}</div>
                                @enderror
                                @error('images.*')
                                <div style="color: red;">{{ $message }}</div>
                                @enderror
                            </div>
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

@push('script')
    <script>
        document.getElementById('images').addEventListener('change', function (event) {
            const files = event.target.files; // الحصول على الملفات
            const previewContainer = document.getElementById('preview-container');
            const defaultImage = document.getElementById('default-image');

            // التحقق من وجود ملفات
            if (files.length > 0) {
                // تنظيف الحاوية
                previewContainer.innerHTML = '';

                Array.from(files).forEach(file => {
                    if (file.type.startsWith('image/')) { // التحقق من أن الملف صورة
                        const reader = new FileReader();

                        reader.onload = function (e) {
                            // إنشاء عنصر صورة
                            const img = document.createElement('img');
                            img.src = e.target.result;
                            img.alt = file.name;
                            img.style.width = '100px';
                            img.style.height = '100px';
                            img.style.objectFit = 'cover';
                            img.style.border = '1px solid #ddd';
                            img.style.borderRadius = '5px';
                            img.style.marginRight = '5px';

                            // إضافة الصورة إلى الحاوية
                            previewContainer.appendChild(img);
                        };

                        reader.readAsDataURL(file);
                    } else {
                        alert('يجب أن تكون الملفات صورًا فقط.');
                    }
                });
            } else {
                // إعادة عرض الصورة الافتراضية
                previewContainer.innerHTML = '';
                previewContainer.appendChild(defaultImage);
            }
        });
    </script>
@endpush
