@php 
   $header = DB::table('email_templates')->where('id',17)->first();
   $footer = DB::table('email_templates')->where('id',18)->first();
@endphp

{!! $header->body !!}

<br/><br/>

   @yield('content')

<br/><br/>

{!! $footer->body !!}



 








