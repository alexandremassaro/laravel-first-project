@component('mail::message')
# Introduction

**Name:** {{ $data['name'] }} <br/>
**Email:** {{ $data['email'] }} <br/>

**Message:** <br/> 
{{ $data['message'] }} <br/>


Thanks,<br>
@endcomponent
