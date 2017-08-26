
<div>
<h2>{{ $sent }}</h2>
</div>

<h1>Contact Us</h1>

{!! Form::open(array('route' => 'contact_store', 'class' => 'form')) !!}

<div class="form-group">
    {!! Form::label('Your Name') !!}
    {!! Form::text('name', null,
        array('required',
              'class'=>'form-control',
              'placeholder'=>'Your name')) !!}
</div>

<div class="form-group">
    {!! Form::label('Your E-mail Address') !!}
    {!! Form::text('email', null,
        array('required',
              'class'=>'form-control',
              'placeholder'=>'Your e-mail address')) !!}
</div>

<div class="form-group">
    {!! Form::label('Your Subject') !!}
    {!! Form::text('subject', null,
        array('required',
              'class'=>'form-control',
              'placeholder'=>'Your subject')) !!}
</div>

<div class="form-group">
    {!! Form::label('Your Message') !!}
    {!! Form::textarea('message', null,
        array('required',
              'class'=>'form-control',
              'placeholder'=>'Your message')) !!}
</div>

<div class="form-group">
    {!! Form::submit('Contact Us!',
      array('class'=>'btn btn-primary')) !!}
</div>
{!! Form::close() !!}
