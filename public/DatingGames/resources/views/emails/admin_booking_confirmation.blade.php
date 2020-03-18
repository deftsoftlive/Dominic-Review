<!DOCTYPE html>
<html>
<head>
    <title>New Booking Confirmation</title>
</head>
 
<body>
	<p>Hi Admin <br/>
	You have a new booking for ,{{ Auth::user()->fname }} {{ Auth::user()->lname }}
</p>
	Booking details are:
			<p><strong>Event Name:</strong>{{ $event->name }}<br/>
		    <strong>Venue:</strong>{{ $venue->address }}, {{$venue->postcode}}<br/>
		   	<strong>Date:</strong>{{ \Carbon\Carbon::parse($event->event_date)->format('D dS F Y')}}<br/>
		   	<strong>Time:</strong>{{ \Carbon\Carbon::parse($event->event_time)->format('H:i')}}</p>
		   	<p>kind regards,</p>
		    <p>The team at Redmox Leisure</p>
		    <p>© 2006 - 2019 Redmox Leisure. All rights reserved.</p>  
</body>
 
</html>