@extends('admin.layouts.app')

@section('title',__('site.humanitarian_strtegy'))

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('site.humanitarian_strtegy')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li class="active">@lang('site.humanitarian_strtegy')</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">
                    <div class="col-md-4">
                      <a href="{{ route('admin.humanitarian_strtegy.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('site.add')</a>
                    </div>

                </div><!-- end of box header -->

                <div class="box-body">

                    @if ($humanitarian_strtegies->count() > 0)

                        <table class="table table-hover">

                            <thead>
                            <tr>
                                <th width="10%">#</th>
                                <th> Humanitarian Strtegy</th>
                                <th> Icon</th>
                                <th width="20%">ACTION</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($humanitarian_strtegies as $index=>$humanitarian_strtegy)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{!! $humanitarian_strtegy->title !!}</td>
                                    <td>{!! $humanitarian_strtegy->icon !!}</td>
                                    <td>
                                      <a href="{{ route('admin.humanitarian_strtegy.edit', $humanitarian_strtegy->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> @lang('site.edit')</a>

                                      <form action="{{ route('admin.humanitarian_strtegy.destroy', $humanitarian_strtegy->id) }}" method="post" style="display: inline-block">
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
