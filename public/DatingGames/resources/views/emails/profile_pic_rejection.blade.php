<!DOCTYPE html>
<html>
<head>
    <title>Profile Picture Rejected</title>
</head>
 
<body>
	<p>Hi <span class="fname" style="text-transform: capitalize">{{ $user->fname }}</span></p>
	<p>We are very sorry but your profile picture has been rejected due to the following reason:</p>
	<p>{!! $reason !!}</p>
	<p>Please can you upload a more suitable picture for your profile. You will need a suitable picture to attend an event.</p>
	<p>Many thanks,</p>
   <p>The team at Redmox Leisure</p>
   <p>© 2006 - 2019 Redmox Leisure. All rights reserved.</p>
</body>
 
</html>