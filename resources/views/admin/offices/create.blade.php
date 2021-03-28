@extends('layouts.main')
@section('page_title')
أضافة مكتب
@endsection




@section('content')

<section class="content-header">
    <h1>
        لوحة التحكم
        <small>أضافة مكتب</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> لوحة التحكم</a></li>
        <li><a href="{{route('office.index')}}">  المكاتب </a></li>
        <li class="active">أضافة مكتب</li>
    </ol>
</section>




<section class="content">
    <!-- row opened -->
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
                <h4 class="card-title mg-b-0"> أضافة مكتب</h4>
                <i class="mdi mdi-dots-horizontal text-gray"></i>
            </div><!-- /.box-header -->
            <div class="box-body">

                                        <!-- row -->
                <div class="row">


                    <div class="col-lg-12 col-md-12">

                        @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong>خطا</strong>
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <div class="card">
                            <div class="card-body">
                                <div class="col-lg-12 margin-tb">
                                    <div class="pull-right">
                                        <a class="btn btn-primary btn-sm" href="{{ route('office.index') }}">رجوع</a>
                                    </div>
                                </div><br>
                                <form class="parsley-style-1" id="selectForm2" autocomplete="off" name="selectForm2"
                                    action="{{route('office.store','test')}}" method="post">
                                    {{csrf_field()}}


                                        <div class="row mg-b-20">


                                            <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" >
                                                <label>الاسم: <span class="tx-danger">*</span></label>
                                                <input class="form-control form-control-sm mg-b-20"
                                                    name="name" type="text">
                                            </div>


                                            <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0">
                                                <label>الايميل: <span class="tx-danger">*</span></label>
                                                <input class="form-control" name="email" type="email">
                                            </div>
                                        </div>


                                        <div class="row mg-b-20">


                                            <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                                <label>الهاتف: <span class="tx-danger">*</span></label>
                                                <input class="form-control form-control-sm mg-b-20" name="phone" type="text">
                                            </div>


                                            <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0">

                                                <label>العنوان: <span class="tx-danger">*</span></label>
                                                <input class="form-control form-control-sm mg-b-20"name="address" type="text">

                                            </div>

                                        </div>


                                    <div class="col-xs-12 col-sm-12 col-md-12 text-center ">
                                        <button class="btn btn-primary" type="submit">تاكيد</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- row closed -->
            </div><!-- /.box-body -->
          </div><!-- /.box -->

        </div><!-- /.col -->


    <!-- main-content closed -->
</section>


@endsection
@push('js')

@endpush
