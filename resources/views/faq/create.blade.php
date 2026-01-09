@extende('master')

@section('content')
<!--{ container start }-->
<div class="main-container container-fluid">
    <!--{ PAGE HEADER START }-->
    <div class="page-header">
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('label.dashboard')}}</a></li>
                <li class="breadcrumb-item"><a href="{{route('admin.faq.index')}}">{{__('label.website-setup')}}</a></li>
                <li class="breadcrumb-item"><a href="{{route('admin.faq.index')}}">{{__('label.faqs')}}</a></</ol>
                <li class="breadcrumb-item active"><a href="{{route('admin.faq.create')}}">{{__('label.create')}}</a></</ol>
        </div>
    </div>
    <!--{ PAGE HEADER END }-->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header mb-3 d-flex justify-content-between align-items-center">
                    <h4 class="title-site">{{ __('Faq Create') }}</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.faq.store')}}" method="POST" enctype="multipart/form-data" id="basicform">
                        @csrf
                        <div class="form-row">
                            <div class="col-12 col-md-6 form-group">
                                <x-input label="{{ __('label.title') }}" placeholder="{{ __('placeholder.enter_title') }}" type="text" name="title" />
                            </div>
                           
                            <div class="col-12 col-md-6 form-group">
                                <x-select
                                    label="Status"
                                    name="status"
                                    :options="config('site.status.default')"
                                    class="select2"
                                    placeholder="Choose Status" />
                            </div>
                            <div class="col-12 col-md-6 form-group">
                                <x-input label="{{ __('label.position') }}" placeholder="{{ __('placeholder.enter_position') }}" type="number" name="position" />
                            </div>
                            <div class="col-12 col-md-12 form-group">
                    <x-textarea label="{{ __('label.description') }}" placeholder="{{ __('placeholder.enter_description') }}" type="text" name="description" />
                </div>
                            </div>

                        <div class="j-create-btns mt-3">
                            <div class="drp-btns">
                                <button type="submit" class="manage-btn">Save Faq</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection







































































