@extends('layout.frontend')

@section('title','Contact')

@section('body')
<div class="container contact-container mt-5">
    <div class="contact-form">
        <form action="" method="get">
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="fname">First Name <span style="color:red">*</span></label>
                    <input type="text" id="fname" class="form-control" required="">
                </div>
                <div class="col-md-6">
                    <label for="lname">Last Name <span style="color:red">*</span></label>
                    <input type="text"  id="lname" class="form-control" required="">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="email">Email <span style="color:red">*</span></label>
                    <input type="email" id="email" class="form-control" required="">
                </div>
                <div class="col-md-6">
                    <label for="number">Contact <span style="color:red">*</span></label>
                    <input type="number" id="number" class="form-control" required="">
                </div>
            </div>
            <div class="form-group">
                <label for="subject">Subject <span style="color:red">*</span></label>
                <input type="text" id="subject" class="form-control" required="">
            </div>
            <div class="form-group">
                <label for="number">Message <span style="color:red">*</span></label>
                <textarea id="message" cols="30" rows="10" class="form-control" required=""></textarea>
            </div>
            <center>
                <button class="btn btn-success">Sumbit</button>
            </center>
        </form>
    </div>
</div>
@endsection