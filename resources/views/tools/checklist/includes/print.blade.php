<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
    <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>jQuery.Print</title>
        <meta name="description" content="jQuery.print is a plugin for printing specific parts of a page">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="css/normalize.min.css">
        <style type='text/css'>
        .a {
            background: black;
            color: white;
        }
        .b {
            color: #aaa;
        }
        </style>
        <!--[if lt IE 9]>
        <script src="js/vendor/html5-3.6-respond-1.1.0.min.js"></script>
        <![endif]-->
    </head>
    <body>


<h3><button class="print-link" style="padding: 8px 20px; background: #36496c; color:#fff; border: 0px; border-radius: 4px; cursor: pointer;">
            Print
            </button></h3>





<div id="ele4">

@include('tools.checklist.includes.pdf')



</div>








       
            
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script type="text/javascript" src="{{url('/pintable/dist/jQuery.print.min.js')}}"></script>
        <script type='text/javascript'>
        //<![CDATA[
        jQuery(function($) { 'use strict';
            $("body").find('.print-link').on('click', function() {
                //Print ele2 with default options
                
                //Print ele4 with custom options
                $("#ele4").print({
                    //Use Global styles
                    globalStyles : false,
                    //Add link with attrbute media=print
                    mediaPrint : false,
                    //Custom stylesheet
                    stylesheet : "http://fonts.googleapis.com/css?family=Inconsolata",
                    //Print in a hidden iframe
                    iframe : false,
                    //Don't print this
                    noPrintSelector : ".avoid-this",
                    //Add this at top
                    //prepend : "Hello World!!!<br/>",
                    //Add this on bottom
                    //append : "<span><br/>Buh Bye!</span>",
                    //Log to console when printing is done via a deffered callback
                    deferred: $.Deferred().done(function() { console.log('Printing done', arguments); })
                });
            });
            // Fork https://github.com/sathvikp/jQuery.print for the full list of options
        });
        //]]>
        </script>
    </body>
</html>
