@extends('backpack::layout')

@section('header')
{{--
    <section class="content-header">
      <h1>
        <span class="text-capitalize">{{ $crud->entity_name_plural }}</span>
        <small>{{ trans('backpack::crud.edit').' '.$crud->entity_name }}.</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url(config('backpack.base.route_prefix'),'dashboard') }}">{{ trans('backpack::crud.admin') }}</a></li>
        <li><a href="{{ url($crud->route) }}" class="text-capitalize">{{ $crud->entity_name_plural }}</a></li>
        <li class="active">{{ trans('backpack::crud.edit') }}</li>
      </ol>
    </section>
--}}
@endsection

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
          <form method="post" action="">
          {!! csrf_field() !!}
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title" style="line-height: 30px;">{{ trans('backpack::crud.edit') }}</h3>
            </div>
            <div class="box-body row display-flex-wrap" style="display: flex;flex-wrap: wrap;">
              <div class="form-group col-xs-12">
                @if (count(config('app.supported_locale')) > 1)
                  <div class="nav-tabs-custom">
                      <ul class="nav nav-tabs">
                        @foreach (config('app.supported_locale') as $locale)
                        <li {!! $loop->first ? 'class="active"' : '' !!}><a href="#tab_{{ $loop->iteration }}" data-toggle="tab">{{ $locale }}</a></li>
                        @endforeach
                      </ul>
                      <div class="tab-content">
                  @foreach (config('app.supported_locale') as $locale)
                        <div class="tab-pane {{ $loop->first ? 'active': '' }}" id="tab_{{ $loop->iteration }}">
                          @include('admin.static-page.form-data', [ 'locale' => $locale, 'data' => array_get($data, $locale) ])
                          <hr>
                          @include('admin.static-page.form-edit', [ 'locale' => $locale ])
                        </div>
                  @endforeach
                      </div>
                    </div>
                @else
                  @include('admin.static-page.form-data', [ 'locale' => config('app.locale'), 'data' => array_get($data, $locale) ])
                  <hr>
                  @include('admin.static-page.form-edit', [ 'locale' => config('app.locale') ])
                @endif
              </div>
            </div><!-- /.box-body -->

            <div class="box-footer">
              <div id="saveActions" class="form-group">

                  <input type="hidden" name="save_action" value="{{-- $saveAction['active']['value'] --}}">

                  <div class="btn-group">

                      <button type="submit" class="btn btn-success">
                          <span class="fa fa-save" role="presentation" aria-hidden="true"></span> &nbsp;
                          <span data-value="{{-- $saveAction['active']['value'] --}}">{{-- $saveAction['active']['label'] --}}</span>
                      </button>

                      <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aira-expanded="false">
                          <span class="caret"></span>
                          <span class="sr-only">&#x25BC;</span>
                      </button>

                      <ul class="dropdown-menu">
                        {{--
                          @foreach( $saveAction['options'] as $value => $label)
                          <li><a href="javascript:void(0);" data-value="{{ $value }}">{{ $label }}</a></li>
                          @endforeach
                        --}}
                      </ul>

                  </div>

                  <a href="{{-- $crud->hasAccess('list') ? url($crud->route) : url()->previous() --}}" class="btn btn-default"><span class="fa fa-ban"></span> &nbsp;{{ trans('backpack::crud.cancel') }}</a>
              </div>

            </div><!-- /.box-footer-->
          </div><!-- /.box -->
          </form>
    </div>
</div>
@endsection

@section('after_scripts')
    <script src="{{ asset('vendor/backpack/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('vendor/backpack/ckeditor/adapters/jquery.js') }}"></script>
@endsection
