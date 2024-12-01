@extends('admin.layouts.app')

@section('title', __('site.stories'))

@push('style')
    <style>
        #preview {
            width: 150px;
            height: 150px;
            border: 1px solid #ccc;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }

        #preview video,
        #preview img {
            max-width: 100%;
            max-height: 100%;
        }
    </style>
@endpush

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>@lang('site.stories')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li><a href="{{ route('admin.story.index') }}"> @lang('site.stories')</a></li>
                <li class="active">@lang('site.edit') </li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header">
                    <h3 class="box-title">Update Itemm</h3>
                </div><!-- end of box header -->
                <div class="box-body">


                    <form action="{{ route('admin.story.update', $story->id) }}" method="post"
                        enctype="multipart/form-data">

                        {{ csrf_field() }}
                        @method('PUT')

                        <div class="form-group">
                            <label for="title_for">Title</label>
                            <input type="text"
                                class="form-control {{ $errors->has('title') ? 'has-error is-invalid' : '' }}"
                                name="title" placeholder="Place Enter Title" id="title_for"
                                value="{{ old('title', $story->title) }}">
                            @error('title')
                                <span style="color:red">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="title_for">Section</label>
                            <select class="form-control  {{ $errors->has('section_id') ? 'has-error is-invalid' : '' }}"
                                name="section_id" placeholder="Place Enter Section" id="section_for">
                                @foreach ($sections as $section)
                                    <option @selected(old('section_id', $section->id) == $story->section_id) value="{{ $section->id }}">{{ $section->title }}
                                    </option>
                                @endforeach
                            </select>
                            @error('section_id')
                                <span style="color:red">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="title_en_for">Description</label>
                            <textarea class="textarea {{ $errors->has('title_en') ? 'has-error is-invalid' : '' }}" name="body"
                                placeholder="Place Enter Description"
                                style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"
                                id="title_en_for">{!! old('body', $story->body) !!}</textarea>
                            @error('body')
                                <span style="color:red">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="image">@lang('site.image')</label>
                            <div class="input-group">
                                <input type="file" name="image"
                                    class="form-control {{ $errors->has('image') ? 'has-error is-invalid' : '' }}"
                                    id="file">
                                <div id="preview">
                                    @if (strpos($story->image, '.mp4') !== false ||
                                            strpos($story->image, '.mov') !== false ||
                                            strpos($story->image, '.avi') !== false)
                                        <video id="currentMedia" src="{{ asset('images/story/' . $story->image) }}"
                                            controls width="300"></video>
                                    @else
                                        <img id="currentMedia" src="{{ asset('images/story/' . $story->image) }}"
                                            alt="{{ $story->title }}" width="300">
                                    @endif 
                                @error('image')
                                    <span class="error invalid-feedback" style="color:red;">{{ $message }}</span>
                                @enderror
                            </div>
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
    const fileInput = document.getElementById('file');
    const preview = document.getElementById('preview');
    const uploadForm = document.getElementById('uploadForm');
    const currentMedia = document.getElementById('currentMedia');

    // عرض معاينة الملف المرفوع
    fileInput.addEventListener('change', () => {
        const file = fileInput.files[0];
        if (!file) return;

        const fileURL = URL.createObjectURL(file);

        // تحديث المعاينة
        if (file.type.startsWith('video/')) {
            preview.innerHTML =
                `<video controls><source src="${fileURL}" type="${file.type}" width="150" height="150"></video>`;
        } else if (file.type.startsWith('image/')) {
            preview.innerHTML = `<img src="${fileURL}" alt="المعاينة" width="150" height="150">`;
        } else {
            alert('الرجاء اختيار صورة أو فيديو فقط.');
        }
    });
</script>
@endpush
