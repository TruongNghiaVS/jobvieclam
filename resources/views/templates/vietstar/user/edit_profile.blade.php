@extends('templates.vietstar.layouts.app')
@section('content') 
<!-- Header start --> 
@include('templates.vietstar.includes.header') 
<!-- Header end --> 
<!-- Inner Page Title start --> 
@include('templates.vietstar.includes.inner_page_title', ['page_title'=>__('My Profile')]) 
<!-- Inner Page Title end -->
<div class="listpgWraper">
    <div class="container">
        <div class="row">
            @include('templates.vietstar.includes.user_dashboard_menu')
            <div class="col-md-9">
                <div class="user-account">
                    <div class="formpanel mt0"> @include('flash::message')
                        <!-- Personal Information -->
                        @include('templates.vietstar.user.inc.profile')
                    </div>
                </div>
                <div class="user-account">
                    <div class="formpanel mt0">
                        <!-- Personal Information -->
                        @include('templates.vietstar.user.inc.summary')
                    </div>
                </div>
                <div class="user-account">
                    <div class="formpanel mt0">
                        <!-- Personal Information -->
                        {{--@include('templates.vietstar.user.forms.cv.cvs') --}}
                        <!-- @include('templates.vietstar.user.forms.project.projects') -->
                        @include('templates.vietstar.user.forms.experience.experience')
                        @include('templates.vietstar.user.forms.education.education')
                        @include('templates.vietstar.user.forms.skill.skills')
                        @include('templates.vietstar.user.forms.language.languages')
                        @include('templates.vietstar.user.forms.activity.activity')
                        @include('templates.vietstar.user.forms.references.references')
                    </div>
                    <div class="row">
                        <div class="col-md-9">
                            <div class="formpanel mt0 load_message"></div>
                        </div>
                        <div class="col-md-3">
                            <div class="group-button-cv-template ">
                                <button type="button" class="btn btn-light" onclick="Download_CV();">{{ __('Download CV') }}</button>
                                <a class="btn btn-primary" href="{{route('change.template')}}">{{ __('Change Template') }}</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>  
</div>
<div class="row" style="display:none;">
        <div class="col-template">
            <div class="tools-schemes show-template" id="show_template">
                @include('templates.vietstar.user.templates.template_' .$cv_template->name_template)
            </div>
        </div>
</div>
@include('templates.vietstar.includes.footer')
@endsection
@push('styles')
<style type="text/css">
    .userccount p{ text-align:left !important;}
</style>
@endpush
@push('scripts')
@include('templates.vietstar.includes.tinyMCEFront')
@include('templates.vietstar.includes.immediate_available_btn')
@endpush
@push('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>

    <script type="text/javascript">

        function Download_CV() {
             var cv = '';
             $.ajax({
                 type: 'GET',
                 async: false,
                 url: '{{ route('refresh.cv') }}',
                 data: {
                     _token: '{{ csrf_token() }}',
                     user_id: '{{ $user->id }}'
                 },
                success: function (data) {
                    cv = data;
                }
             });
            console.log(cv);
            // Final file name
            let fileName = "CV-"+'{{ $user->first_name.' '.$user->middle_name.' '.$user->last_name }}'+".pdf";

            // Assuming "pages" is an array of HTML elements or strings that are separate pages:
            let pages = [];
            $(cv).each(function() {
                pages.push($(this)[0]);
            });

            let worker = html2pdf().from(pages[0]).set({
                margin: 10,
                filename: fileName,
                html2canvas: {
                    scale: 2
                },
                jsPDF: {
                    orientation: 'portrait',
                    unit: 'pt',
                    format: 'a4',
                    compressPDF: true
                }
            }).toPdf();
            worker.save()
        }

    </script>
@endpush
