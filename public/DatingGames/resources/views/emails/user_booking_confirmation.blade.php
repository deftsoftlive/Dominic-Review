<!DOCTYPE html>
<html>
<head>
    <title>Event Booking Confirmation</title>
</head>
 
<body>
	<p>Hi <span class="fname" style="text-transform: capitalize" >{{ $username }}</span></p>
	<p>Thank you for booking your event with Fun and Games Dating, Manchester. Your booking has now been confirmed.</p>

	<p>Your Booking details are:</p>
		    <p><strong>Event Name: </strong> {{ $event->name }}<br/>
		    <strong>Venue: </strong> {{ $venue->address }}, {{$venue->postcode}}<br/>
		   	<strong>Date: </strong> {{ \Carbon\Carbon::parse($event->event_date)->format('D dS F Y')}}<br/>
		   	<strong>Time: </strong> {{ \Carbon\Carbon::parse($event->event_time)->format('H:i')}}</p>
		   	<p>Please remember you will need a valid photo of yourself to attend the event. Please upload a suitable picture by logging into your account with us. </p>
		       <p>We will see you there!</p>
		       <p>kind regards,</p>
		       <p>The team at Redmox Leisure</p>
		       <p>© 2006 - 2019 Redmox Leisure. All rights reserved.</p>
</body>
 
</html>