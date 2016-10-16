@extends('main')

@section('title','Contact Us')

@section('content')
        <div class="row">
            <div class="col-md-12">
               <h1>Contact Us</h1>
               <hr>
               <form action="{{ url('contact') }}" method="POST">
               {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                 <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control">
                 </div>
                 <div class="form-group">
                     <label for="subject">Subject</label>
                     <input type="text" name="subject" class="form-control">
                 </div>
                 <div class="form-group">
                      <label for="message">Message</label>
                      <textarea name="message" class="form-control">Type your message here...</textarea>
                 </div>

                 <input type="submit" class="btn btn-success">

               </form>
            </div>
        </div>

@endsection