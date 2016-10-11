@extends('main')

@section('title','Contact Us')

@section('content')
        <div class="row">
            <div class="col-md-12">
               <h1>Contact Us</h1>
               <hr>
               <form>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" class="form-control">
                </div>
                 <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" id="email" class="form-control">
                 </div>
                 <div class="form-group">
                     <label for="subject">Subject</label>
                     <input type="text" id="subject" class="form-control">
                 </div>
                 <div class="form-group">
                      <label for="message">Message</label>
                      <textarea id="message" class="form-control">Type your message here...</textarea>
                 </div>

                 <input type="submit" class="btn btn-success">

               </form>
            </div>
        </div>

@endsection