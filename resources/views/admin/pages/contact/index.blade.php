@extends('admin.layouts.app')

@section('title',__('site.contacts'))

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('site.contacts')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li class="active">@lang('site.contacts')</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-body">

                    @if ($contacts->count() > 0)

                        <table class="table table-hover">

                            <thead>
                            <tr>
                                <th width="10%">#</th>
                                <th >@lang('site.name')</th>
                                <th >@lang('site.mobile')</th>
                                <th >@lang('site.email')</th>
                                <th >status</th>
                                <th >@lang('site.message')</th>
                                <th width="20%">@lang('site.action')</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($contacts as $index=>$contact)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{!! $contact->name !!}</td>
                                    <td>{!! $contact->mobile !!}</td>
                                    <td>{!! $contact->email !!}</td>
                                    <td>{!! $contact->is_read == '1' ? 'read' : 'unread' !!}</td>
                                    <td>{!! $contact->message !!}</td>
                                    <td>
                                      <a href="{{ route('admin.contact.show', $contact->id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> view</a>

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
