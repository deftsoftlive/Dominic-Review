function getTimeRemaining(endtime) {
   // var calculatedTime = document.getElementById("calculatedTime").split('-');
  
  var t = Date.parse(endtime) - Date.parse(new Date());
  
  /*var year = Math.floor(t / (1000 * 3600 * 24 * 30 * 12)) ;
  var month = Math.floor (t / (1000 * 3600 * 24 * 31) % 12);*/
  var days = Math.floor(t / (1000 * 60 * 60 * 24 ));
  var seconds = Math.floor((t / 1000) % 60);
  var minutes = Math.floor((t / 1000 / 60) % 60);
  var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
  
 
  return {
    'total': t, 
     
    'days': days,
    'hours': hours,
    'minutes': minutes,
    'seconds': seconds
  };
}

function initializeClock(id, endtime) {
    
  
  
  var clock = document.getElementById(id);

  var daysSpan = clock.querySelector('.Cdays'); 
  var hoursSpan = clock.querySelector('.Chr');
  var minutesSpan = clock.querySelector('.Cmin');
  var secondsSpan = clock.querySelector('.Csec');
  var specificId = id.split('_');

  
  function updateClock() {
    var t = getTimeRemaining(endtime);
    
   
    daysSpan.innerHTML = t.days;
    hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
    minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
    secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

    if (t.total <= 0) {
      clearInterval(timeinterval);
    }
  }

  updateClock();
  var timeinterval = setInterval(updateClock, 1000);
}
 

