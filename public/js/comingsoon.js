$(document).ready(function(){





setTimeout(() => {
  startTimer();
 }, 1000);
     









    function comingsoon(start_date, days, hours, minutes, seconds) {
      const second = 1000,
          minute = second * 60,
          hour = minute * 60,
          day = hour * 24;

    const date_val = $(`#${start_date}`).val()
    let countDown = new Date(date_val).getTime(),
        x = setInterval(function() {

          let now = new Date().getTime(),
              distance = countDown - now;

          document.getElementById(`${days}`).innerText = Math.floor(distance / (day)),
          document.getElementById(`${hours}`).innerText = Math.floor((distance % (day)) / (hour)),
          document.getElementById(`${minutes}`).innerText = Math.floor((distance % (hour)) / (minute)),
          document.getElementById(`${seconds}`).innerText = Math.floor((distance % (minute)) / second);
        }, second)
    }


 function comingsoon2(start_date, days, hours, minutes, seconds) {
      const second = 1000,
          minute = parseInt(second * 60),
          hour = parseInt(minute * 60),
          day = parseInt(hour * 24);

    const date_val = $('#'+start_date).val();
    let countDown = parseInt(new Date(date_val).getTime());
               
        x = setInterval(function() {
          var date = new Date();
              date.setDate(date.getDate());
          let now = date.getTime(),
              distance = parseInt(countDown) - now;


          var cday = parseInt(Math.floor(distance / (day)));
          var chours = parseInt(Math.floor((distance % (day)) / (hour)));
          var cminutes = parseInt(Math.floor((distance % (hour)) / (minute)));
          var cseconds = parseInt(Math.floor((distance % (minute)) / second));

           
                  $(days).text(cday);
                  $(hours).text(chours);
                  $(minutes).text(cminutes);
                  $(seconds).text(cseconds);
        }, second);
}


    function startTimer() {
          
            $("body").find('.timerWatch').each(function() {
                 var $this = $( this );
                 var start_date = $this.attr('id');
                 var days = $this.attr('data-days');
                 var hours = $this.attr('data-hours');
                 var minutes = $this.attr('data-minutes');
                 var seconds = $this.attr('data-seconds');
                 comingsoon2(start_date, days, hours, minutes, seconds);
            });
    }


});







