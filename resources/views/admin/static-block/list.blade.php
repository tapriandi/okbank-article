@extends('backpack::layout')

@section('header')
    <section class="content-header">
      <h1>
        {{ trans('backpack::base.dashboard') }}<small>{{ trans('backpack::base.first_page_you_see') }}</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url(config('backpack.base.route_prefix', 'admin')) }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">{{ trans('backpack::base.dashboard') }}</li>
      </ol>
    </section>
@endsection


@section('content')
<!-- Default box -->
  <div class="row">

    <!-- THE ACTUAL CONTENT -->
    <div class="col-md-12">
      <div class="box">
        <div class="box-header hidden-print">


          <div id="datatable_button_stack" class="pull-right text-right hidden-xs"></div>
        </div>

        <div class="box-body overflow-hidden">


        <table id="crudTable" class="table table-striped table-hover display responsive nowrap" cellspacing="0">
            <thead>
              <tr>
                <th data-orderable="" data-priority="">Block Key</th>
                <th data-orderable="false" data-priority="">Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($blocks as $block)
                <tr>
                  <td>{{ $block }}</td>
                  <td>
                    <a href="static-block/edit/{{ $block }}" class="btn btn-xs btn-default">
                      <i class="fa fa-edit"></i> Edit
                    </a>
                  </td>
                </tr>
              @endforeach
            </tbody>
            <tfoot>
              <tr>
              </tr>
            </tfoot>
          </table>

        </div><!-- /.box-body -->


      </div><!-- /.box -->
    </div>

  </div>

@endsection
