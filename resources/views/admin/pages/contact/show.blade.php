@extends('admin.layouts.app')

@section('title',__('site.contacts'))

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>@lang('site.deteail_message')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('admin.contact.index') }}"><i class="fa fa-dashboard"></i> @lang('site.contacts')</a></li>
{{--                <li><a href="{{ route('admin.client.index') }}"> @lang('site.clients')</a></li>--}}
                <li class="active">@lang('site.deteail_message') </li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Read Mail</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body no-padding">
                            <div class="mailbox-read-info">
                                <h3>{{ $contact->subject }}</h3>
                                <h5>From: {{ $contact->email }} <span class="mailbox-read-time pull-right">{{ Carbon\Carbon::parse($contact->created_at)->format('d M. Y h:i A') }}</span></h5>
                            </div><!-- /.mailbox-read-info -->
                            <div class="mailbox-read-message">
                                <p>{{ $contact->message }}</p>
                                <p>Thanks,<br><strong>{{ $contact->name }}</strong></p>
                            </div><!-- /.mailbox-read-message -->
                        </div><!-- /.box-body -->
                    </div><!-- /. box -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </section>

    </div><!-- end of content wrapper -->

@endsection
