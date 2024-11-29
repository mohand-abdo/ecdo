@extends('admin.layouts.app')

@section('title',__('site.ecdo_strtegy'))

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('site.ecdo_strtegy')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li class="active">@lang('site.ecdo_strtegy')</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">
                    <div class="col-md-4">
                      <a href="{{ route('admin.ecdo_strtegy.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('site.add')</a>
                    </div>

                </div><!-- end of box header -->

                <div class="box-body">

                    @if ($ecdo_strtegies->count() > 0)

                        <table class="table table-hover">

                            <thead>
                            <tr>
                                <th width="10%">#</th>
                                <th> Ecdo Strtegy</th>
                                <th width="20%">ACTION</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($ecdo_strtegies as $index=>$ecdo_strtegy)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{!! $ecdo_strtegy->title !!}</td>
                                    <td>
                                      <a href="{{ route('admin.ecdo_strtegy.edit', $ecdo_strtegy->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> @lang('site.edit')</a>

                                      <form action="{{ route('admin.ecdo_strtegy.destroy', $ecdo_strtegy->id) }}" method="post" style="display: inline-block">
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
