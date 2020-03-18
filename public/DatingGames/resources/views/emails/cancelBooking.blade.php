<!DOCTYPE html>
<html>
<head>
    <title>Event Booking Cancellation</title>
</head>
 
<body>
	<p>Hi <span class="fname" style="text-transform: capitalize">{{ $user->fname }}</span></p>
	<p>Your Booking with Booking ID: {{$booking->id}} for the Event: {{$event->name}}  has been Cancelled.</p>    
	<p>kind regards,</p>
	<p>The team at Redmox Leisure</p>
	<p>© 2006 - 2019 Redmox Leisure. All rights reserved.</p>
</body>
 
</html>