@extends('admin.layouts.app')

@section('title',__('site.targeted_group'))

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('site.targeted_group')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li class="active">@lang('site.targeted_group')</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">
                    <div class="col-md-4">
                      <a href="{{ route('admin.targeted_group.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('site.add')</a>
                    </div>

                </div><!-- end of box header -->

                <div class="box-body">

                    @if ($targeted_groups->count() > 0)

                        <table class="table table-hover">

                            <thead>
                            <tr>
                                <th width="10%">#</th>
                                <th> Targeted Group</th>
                                <th width="20%">ACTION</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($targeted_groups as $index=>$targeted_group)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{!! $targeted_group->title !!}</td>
                                    <td>
                                      <a href="{{ route('admin.targeted_group.edit', $targeted_group->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> @lang('site.edit')</a>

                                      <form action="{{ route('admin.targeted_group.destroy', $targeted_group->id) }}" method="post" style="display: inline-block">
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
