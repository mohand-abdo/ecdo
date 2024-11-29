@extends('admin.layouts.app')

@section('title',__('site.save_lives'))

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('site.save_lives')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li class="active">@lang('site.save_lives')</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">
                    <div class="col-md-4">
                      <a href="{{ route('admin.save_live.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('site.add')</a>
                    </div>

                </div><!-- end of box header -->

                <div class="box-body">

                    @if ($save_lives->count() > 0)

                        <table class="table table-hover">

                            <thead>
                            <tr>
                                <th width="10%">#</th>
                                <th width="30%"> TITLE</th>
                                <th width="40%"> DESCRIPTION</th>
                                <th width="20%">ACTION</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($save_lives as $index=>$save_live)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{!! $save_live->title !!}</td>
                                    <td>{!! Str::limit(strip_tags($save_live->body), 50, '...') !!}</td>
                                    <td>
                                      <a href="{{ route('admin.save_live.edit', $save_live->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> @lang('site.edit')</a>

                                      <form action="{{ route('admin.save_live.destroy', $save_live->id) }}" method="post" style="display: inline-block">
                                          {{ csrf_field() }}
                                          {{ method_field('delete') }}
                                          <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i> @lang('site.delete')</button>
                                      </form><!-- end of form -->

                                    </td>
                                </tr>

                            @endforeach
                            </tbody>

                        </table><!-- end of table -->


                    @else
                        <div class="text-center">
                        <h2>@lang('site.no_data_found')</h2>

                        </div>

                    @endif

                </div><!-- end of box body -->


            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection
