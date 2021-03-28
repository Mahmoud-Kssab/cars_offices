@extends('layouts.main')
@section('page_title')
السائقين
@endsection



@section('content')

<section class="content-header">
    <h1>
        لوحة التحكم
        <small>السائقين  </small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> لوحة التحكم</a></li>
        <li class="active"> الفئات</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="modal" id="modaldemo8">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">حذف </h6><button aria-label="Close" class="close"
                            data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>

                    <form action="{{ route('driver.destroy', 'test') }}" method="post">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <p>هل انت متاكد من عملية الحذف ؟</p><br>
                            <input type="hidden" name="drive_id" id="user_id" value="">
                            <input class="form-control" name="username" id="username" type="text" readonly>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                            <button type="submit" class="btn btn-danger">تاكيد</button>
                        </div>
                    </div>
                    </form>

            </div>
    </div>
    <div id="multimodel" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">{{ trans('admin.delete') }}</h4>
            </div>
            <div class="modal-body">

                <div class="alert alert-danger">
                    <div class="empty_record hidden">
                    <h4>{{ trans('admin.please_check_some_records') }} </h4>
                    </div>
                    <div class="not_empty_record hidden">
                    <h4>{{ trans('admin.ask_delete_itme') }} <span class="record_count"></span> ? </h4>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="empty_record hidden">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('admin.close') }}</button>
                </div>
                <div class="not_empty_record hidden">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('admin.no') }}</button>
                <input type="submit"  value="{{ trans('admin.yes') }}"  class="btn btn-danger del_all" />
                </div>
            </div>
            </div>
        </div>
    </div>


    

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                   <h3 class="box-title">السائقين  </h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                   @include('flash::message')

                    {!! Form::open(['id'=>'form_data','url'=>url('admin/driver/destroy/all'),'method'=>'delete']) !!}
                
                    {!! $dataTable->table([
                    'class'=>'dataTable table table-striped table-hover  table-bordered'
                    ]) !!}
                    {!! Form::close() !!}

                </div><!-- /.box-body -->
             </div><!-- /.box -->

      </div><!-- /.col -->
    </div><!-- /.row -->


    <!-- Container closed -->
    </div>
    <!-- main-content closed -->

</section><!-- /.content -->

@push('dt_js')
    <script>
    delete_all();
    </script>
    {!! $dataTable->scripts() !!}
@endpush
@endsection
@push('js')
    <script>
        $('#modaldemo8').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var user_id = button.data('user_id')
            var username = button.data('username')
            var modal = $(this)
            modal.find('.modal-body #user_id').val(user_id);
            modal.find('.modal-body #username').val(username);
        })
    </script>
@endpush
