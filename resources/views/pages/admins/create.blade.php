
@extends('layouts.main2')

@section('content')

<div class="row">
    <div class="col-md-8">
        <div class="allcp-form theme-primary tab-pane mw600" id="register" role="tabpanel">
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title pn">Registration form</span>
                    <hr>
                </div>
                <!-- /Panel Heading -->
                <form method="post" action="/admins" id="form-register">
                    @csrf
                    <div class="panel-body pn">
                        <div class="section row mh10m">
                            <div class="col-md-6">
                                <label for="firstname2" class="field prepend-icon">First Name :</label>
                                <input type="text" value="{{ old('firstname') }}" name="firstname" class="form-control" id="firstname2"
                                       class="gui-input"
                                       placeholder="e.g John" required>
                            </div>
                            <!-- /section -->
                            <div class="col-md-6">
                                <label for="lastname2" class="field prepend-icon">Last Name :</label>
                                <input type="text" name="lastname" value="{{ old('lastname') }}" id="lastname2" class="form-control"
                                       placeholder="e.g Snow" required>
                            </div>
                            <!-- /section -->

                        <!-- /section -->

                        <div class="col-md-12">
                            <label for="email5" class="field prepend-icon">Email Address :</label>
                            <input type="email" value="{{ old('email') }}" name="email" id="email5" class="form-control"
                                   placeholder="e.g jonsnow@got.com" required>

                        </div>
                        <!-- /section -->
                        <div class="col-md-6">
                            <label for="username2" class="field prepend-icon">Phone Number :</label>
                            <input type="text" name="msisdn" {{ old('msisdn') }} id="username2" class="form-control"
                                   placeholder="e.g 099### ####" required>
                        </div>
                        </div>

                        <div class="section">
                            <div class="bs-component pull-left mt10">
                                <div class="checkbox-custom checkbox-primary mb10">
                                    <input type="checkbox" name="agreed" id="agree">
                                    <label for="agree" class="fs14">I agree to the
                                    <a href="#"> terms of use. </a></label>
                                </div>
                            </div>
                            <div class="pull-right">
                                <button type="submit" class="btn btn-primary fs14">I Agree -
                                Create Account
                                </button>
                            </div>
                        </div>
                        <!-- /section -->
                    </div>
                    <!-- /Form -->
                    <div class="panel-footer"></div>
                </form>
            </div>
            <!-- /Panel -->
        </div>
    </div>
</div>
<script>
    alert = function(mesg) {console.trace(mesg)}
</script>
@endsection
