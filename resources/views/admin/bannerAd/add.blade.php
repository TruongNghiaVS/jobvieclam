@extends('admin.layouts.admin_layout')
@section('content')
<div class="page-content-wrapper"> 
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content"> 
        <!-- BEGIN PAGE HEADER--> 
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li> <li> <a href="{{ route('admin.home') }}">{{__('Home')}}</a> <i class="fa fa-circle"></i> </li>
                <li> <a href="{{ route('list.cms') }}">BANNER THEO VỊ TRÍ</a> <i class="fa fa-circle"></i> </li>
                <li> <span>Thêm BANNER</span> </li>
            </ul>
        </div>
        <!-- END PAGE BAR --> 
        <!-- BEGIN PAGE TITLE-->
        <!--<h3 class="page-title">Edit User <small>Users</small> </h3>-->
        <!-- END PAGE TITLE--> 
        <!-- END PAGE HEADER-->
        <br />
        @include('flash::message')
        <div class="row">
            <div class="col-md-12">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-red-sunglo"> <i class="icon-settings font-red-sunglo"></i> <span class="caption-subject bold uppercase">Mẫu banner quảng cáo theo vị trí</span> </div>
                    </div>
                    <div class="portlet-body form">          
                        <form id="bannerCreateForm" >
                                       
                               @include('admin.bannerAd.forms.form')
                                
                            
                          
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END CONTENT BODY --> 
</div>
@endsection







@push('scripts')
<script type="text/javascript">
    
     $(document).ready(function () {
        // Handle file input change to preview images
        $('#linkDesktop, #linkMobile').change(function () {
            readURL(this);
        });

        // Handle form submission
        $('#advertisementForm').submit(function (event) {
            event.preventDefault();
            // Your form submission logic here
            console.log('Form submitted!');
        });

        // Function to preview images
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    var targetId = $(input).attr('id') === 'linkDesktop' ? 'desktopPreview' : 'mobilePreview';
                    $('#' + targetId)
                        .attr('src', e.target.result)
                        .css('display', 'block');
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

       
        document.getElementById('bannerCreateForm').addEventListener('submit', function (event) {
            // Reset previous error messages
            resetErrors();

            if (this.checkValidity()) {
                event.preventDefault(); // Prevent form submission if validation fails

                // Form is valid, make Ajax call
                var formData = {
                    linkDesktop: `${document.getElementById('linkDesktop').value}`,
                    linkMobile: `${document.getElementById('linkMobile').value}`,
                    position: `${document.getElementById('position').value}`,
                    status: `${document.getElementById('status').value}`
                };
                console.log(formData);
              
                // Ajax call
                $.ajax({
                    url: `{{ route('admin.advertisementBanner.createOrUpdate' )}}`,
                    type: 'POST',
                    data: formData,
                    success: function (response) {
                        // Handle success
                        console.log(response);
                    },
                    error: function (xhr, status, error) {
                        // Handle error
                        console.error('Error:', error);
                    }
                });
            } else {
                // Form is invalid, display error messages
                displayErrors();
            }
        });

        function displayErrors() {
            // Display error messages based on validation constraints
            var linkDesktop = document.getElementById('linkDesktop');
            if (linkDesktop.validity.valueMissing) {
                document.getElementById('linkDesktopError').textContent = 'Please enter a link for desktop.';
            }

            var linkMobile = document.getElementById('linkMobile');
            if (linkMobile.validity.valueMissing) {
                document.getElementById('linkMobileError').textContent = 'Please enter a link for mobile.';
            }

            var position = document.getElementById('position');
            if (position.validity.valueMissing) {
                document.getElementById('positionError').textContent = 'Please select a position.';
            }

            var status = document.getElementById('status');
            if (status.validity.valueMissing) {
                document.getElementById('statusError').textContent = 'Please select a status.';
            }
        }

        function resetErrors() {
            // Reset all error messages
            var errors = document.querySelectorAll('.error');
            errors.forEach(function (error) {
                error.textContent = '';
            });
        }
    });

</script>
@endpush
