<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title w-100 text-center">{{__('Account Information')}}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <!-- adding Bootstrap Form here -->

                <form id="myForm" class="needs-validation" novalidate>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="Company_Name">Email</label>
                                    <input type="text" class="form-control" name="email" disabled id="email" value="{{ old('email') ? old('email') : $company->email }}" placeholder="{{__('Company Email')}} " required>
                                    <div class="invalid-feedback">
                                        Please choose a Name.
                                    </div>
                                    <label for="id" class="col-sm-2 col-form-label">Name</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group" id="show_hide_password">
                                    <label for="CEO_Name">{{__('Password')}}</label>
                                        <input type="password" class="form-control" id="password" placeholder="{{__('Password')}}" required>
                                    <div class="invalid-feedback">
                                        Please choose a Name.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-center">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@push('scripts')
<script type="text/javascript">
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');


                    if (form.checkValidity() === true) {
                        //enter your code here 
                        event.preventDefault();
                        document.forms[0].reset(); //reseting the form
                        document.getElementById('myForm').classList.remove("was-validated"); //reseting the form validation

                    }
                    $('#myModal').modal('hide');

                }, false);
            });
        }, false);
    })();
</script>
@endpush