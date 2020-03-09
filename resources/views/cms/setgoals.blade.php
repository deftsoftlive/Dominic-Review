<!-- Header section -->
@extends('inc.homelayout')

@section('title', 'DRH|Listing')

@section('content')

    <section class="account-sec">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="account-sec-content">
              <h2 class="account-sec-heading">Account</h2>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="account-menu-sec">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="account-menu-sec-heading">
                      <h1>ACCOUNT menu</h1>
            </div>
          </div>
        </div>
        <div class="row">
            <div class="col-md-12">
              <nav>
                      <div class="nav nav-tabs account-menu-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link menu-tab-link active" id="nav-goals-tab" data-toggle="tab" href="#nav-goals" role="tab" aria-controls="nav-home" aria-selected="true"><span><i class="fas fa-bullseye"></i></span>Player Goals</a>
                        <a class="nav-item nav-link menu-tab-link" id="nav-badges-tab" data-toggle="tab" href="#nav-badges" role="tab" aria-controls="nav-profile" aria-selected="false"><span><i class="fas fa-trophy"></i></span>Player Badges</a>
                        <a class="nav-item nav-link menu-tab-link" id="nav-reports-tab" data-toggle="tab" href="#nav-reports" role="tab" aria-controls="nav-contact" aria-selected="false"><span><i class="fas fa-clipboard-list"></i></span>Player Reports</a>
                        <a class="nav-item nav-link menu-tab-link" id="nav-family-tab" data-toggle="tab" href="#nav-family" role="tab" aria-controls="nav-home" aria-selected="true"><span><i class="fas fa-users"></i></span>My Family</a>
                        <a class="nav-item nav-link menu-tab-link" id="nav-bookings-tab" data-toggle="tab" href="#nav-bookings" role="tab" aria-controls="nav-bookings" aria-selected="false"><span><i class="fas fa-calendar-alt"></i></span>My Bookings</a>
                        <a class="nav-item nav-link menu-tab-link" id="nav-settings-tab" data-toggle="tab" href="#nav-settings" role="tab" aria-controls="nav-settings" aria-selected="false"><span><i class="fas fa-cog"></i></span>Settings</a>
                      </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                      <div class="tab-pane fade show active" id="nav-goals" role="tabpanel" aria-labelledby="nav-goals-tab">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="page-description">
                              <p class="goal-setting-text">The above goal setting sheet is meant to help you start to have more control, become more accountable and be more motivated to work hard to
achieve the things they want. It acts as just one of many elements that will be put in place over your tennis develop and improve. Don’t worry if you
find it difficult to think of things to write down or you’re not sure what you want to achieve. You can ask your parent or coach to help you if you are notsure but they cannot do it for you. At the end of the term you need to review your goals and set new ones.</p> 
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <form class="select-player-goal-form">
                              <div class="form-row">
                                <div class="form-group col-md-4">
                                  <label for="inputPlayer">Select Player :</label>
                                  <select id="inputPlayer" class="form-control">
                                    <option selected>Marbel Freytag</option>
                                    <option>...</option>
                                  </select>                                                               
                                </div>   
                                <div class="form-group col-md-4">
                                  <label for="inputGoal">Select Goals :</label>
                                  <select id="inputGoal" class="form-control">
                                    <option selected>Level 1</option>
                                    <option>...</option>
                                  </select>                                                               
                                </div>  
                              </div>
                            </form>                           
                          </div>
                          <div class="col-md-12">
                              <div class="player-goal-heading">
                                <h1>All of your goals apart from your Big Dreams should follow the acronym S.M.A.R.T.</h1>
                              </div>
                          </div>
                          <div class="col-md-12">
                            <fieldset class="player-goal-card">
                              <legend>MY BIG DREAMS</legend>
                              <p>What do you want to do or be when you are grown up? This doesn’t have to be tennis related</p>
                              <form>
                                <div class="form-group">
                                      <textarea class="form-control goal-textarea" rows="3"></textarea>
                                    </div>
                              </form>
                            </fieldset>
                            <div class="goal-reciew-feedback">
                              <p>Write goal review feedback</p>
                              <form>
                                <div class="form-group">
                                  <textarea class="form-control goal-textarea" rows="3"></textarea>
                                </div>
                              </form>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <fieldset class="player-goal-card">
                              <legend>SHORT TERM TENNIS GOALS</legend>
                              <p>Between now and the end of the term</p>
                              <form>
                                <div class="form-group">
                                      <textarea class="form-control goal-textarea" rows="3"></textarea>
                                    </div>
                              </form>
                            </fieldset>
                            <div class="goal-reciew-feedback">
                              <p>Write goal review feedback</p>
                              <form>
                                <div class="form-group">
                                  <textarea class="form-control goal-textarea" rows="3"></textarea>
                                </div>
                              </form>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <fieldset class="player-goal-card">
                              <legend>MEDIUM TERM TENNIS GOALS</legend>
                              <p>3 to 6 months from now</p>
                              <form>
                                <div class="form-group">
                                      <textarea class="form-control goal-textarea" rows="3"></textarea>
                                    </div>
                              </form>
                            </fieldset>
                            <div class="goal-reciew-feedback">
                              <p>Write goal review feedback</p>
                              <form>
                                <div class="form-group">
                                  <textarea class="form-control goal-textarea" rows="3"></textarea>
                                </div>
                              </form>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <fieldset class="player-goal-card">
                              <legend>LONG TERM TENNIS GOALS</legend>
                              <p>6 to 12 months from now</p>
                              <form>
                                <div class="form-group">
                                      <textarea class="form-control goal-textarea" rows="3"></textarea>
                                    </div>
                              </form>
                            </fieldset>
                            <div class="goal-reciew-feedback">
                              <p>Write goal review feedback</p>
                              <form>
                                <div class="form-group">
                                  <textarea class="form-control goal-textarea" rows="3"></textarea>
                                </div>
                              </form>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="player-goal-info">
                              <ul class="player-goal-inner-text-wrap">
                              <li>
                                <h2><span>S</span>pecific:</h2>
                                <p>Well defined, clear and unambiguous. What is the goal and how are you going to achieve it?</p>
                              </li>
                              <li>
                                <h2><span>M</span>easurable:</h2>
                                <p>With specific criteria that measure your progress towards the accomplishment of the goal. How will you know  if you’ve reached your goal?</p>
                              </li>
                              <li>
                                <h2><span>A</span>chievable:</h2>
                                <p>The achievability of the goal should be such that it makes you feel challenged, but defined well enough that you can actually achieve it. </p>
                              </li>
                              <li>
                                <h2><span>R</span>ealistic:</h2>
                                <p>Your SMART goal should be realistic and something you believe you can realistically achieve.</p>
                              </li>
                              <li>
                                <h2><span>T</span>imed:</h2>
                                <p>Your goal must be time-bound in that it has a start and finish date. If the goal is not time constrained, there will be no sense of urgency and motivation to achieve the goal.</p>
                              </li>
                              </ul>
                              <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">“I promise to work hard and do my best to achieve the goals that I have set for myself”</label>
                              </div>
                              <div class="player-goal-date">
                                <p><span>Date :</span> 21 February 2020 </p>
                              </div>
                              <div class="set-goal-btn-wrap">
                                <a href="javascript:void(0);" class="cstm-btn">set goals</a>
                              </div>
                            </div>                          
                          </div>
                        </div>
                      </div>
                      <div class="tab-pane fade" id="nav-badges" role="tabpanel" aria-labelledby="nav-badges-tab">
                        <div class="row">
                          <div class="col-md-12">
                            <form class="select-player-goal-form">
                              <div class="form-row">
                                <div class="form-group col-md-4">
                                  <label for="inputPlayer">Select Player :</label>
                                  <select id="inputPlayer" class="form-control">
                                    <option selected>Marbel Freytag</option>
                                    <option>...</option>
                                  </select>                                                               
                                </div> 
                              </div>  
                            </form>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="player-achievements-card">
                              <div class="row">
                                <div class="col-md-4">
                                  <div class="player-info">
                                    <figure class="player-img-wrap">
                                      <img src="{{ URL::asset('public/images/player-img.png')}}">
                                    </figure>
                                    <div class="player-name-points">
                                      <h2>MARBEL FREYTAG</h2>
                                      <h2>Points : 2000 Points</h2>
                                    </div>
                                  </div> 
                                </div>
                                <div class="col-md-3">
                                  <div class="player-group-season">
                                    <p><span>Group :</span>xyz</p>
                                    <p><span>Season :</span>xyz</p>
                                  </div>
                                </div>
                                <div class="col-md-5">
                                  <div class="player-achievements">
                                    <h2>achievements</h2>
                                    <ul class="achievement-medals">
                                      <li>
                                        <figure>
                                          <img src="{{ URL::asset('public/images/achievement-medal-1.png')}}">
                                        </figure>
                                      </li>
                                      <li>
                                        <figure>
                                          <img src="{{ URL::asset('public/images/achievement-medal-2.png')}}">
                                        </figure>
                                      </li>
                                      <li>
                                        <figure>
                                          <img src="{{ URL::asset('public/images/achievement-medal-3.png')}}">
                                        </figure>
                                      </li>
                                      <li>
                                        <figure>
                                          <img src="{{ URL::asset('public/images/achievement-medal-4.png')}}">
                                        </figure>
                                      </li>
                                      <li>
                                        <figure>
                                          <img src="{{ URL::asset('public/images/achievement-medal-5.png')}}">
                                        </figure>
                                      </li>
                                      <li>
                                        <figure>
                                          <img src="{{ URL::asset('public/images/achievement-medal-6.png')}}">
                                        </figure>
                                      </li>
                                      <li>
                                        <figure>
                                         <img src="{{ URL::asset('public/images/achievement-medal-7.png')}}">
                                        </figure>
                                      </li>
                                    </ul>
                                  </div> 
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="achievement-day">
                              <!-- <h2>Day 1</h2> -->
                            </div>
                          </div>  
                          <div class="col-md-12">
                            <div class="school-bages-card">
                              <div class="row">   
                                <div class="col-md-3">
                                  <div class="school-card">
                                    <figure>
                                      <img src="{{ URL::asset('public/images/school-img-1.png')}}>
                                    </figure>
                                    <p>RALLY WITH COACH</p>
                                  </div>
                                </div>
                                <div class="col-md-6 offset-md-1">
                                  <div class="school-details">
                                    <p><span>Venu :</span> xyz school, uk</p>
                                    <p><span>Date :</span> Mon 10 February 2020</p>
                                    <p><span>Result :</span> Lorem Ipsum is simply dummy text of the printing</p>
                                  </div>
                                </div>
                                <div class="col-md-2">
                                  <div class="day-medal-wrap">
                                   <figure ><img src="{{ URL::asset('public/images/achievement-medal-1.png')}}"></figure>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="achievement-day">
                              <!-- <h2>Day 2</h2> -->
                            </div>
                          </div>  
                          <div class="col-md-12">
                            <div class="player-bages-card">
                              <div class="row">   
                                <div class="col-md-3">
                                  <div class="school-card">
                                    <figure>
                                      <img src="{{ URL::asset('public/images/school-img-1.png')}}">
                                    </figure>
                                    <p>RALLY WITH COACH</p>
                                  </div>
                                </div>
                                <div class="col-md-6 offset-md-1">
                                  <div class="school-details">
                                    <p><span>Venu :</span> xyz school, uk</p>
                                    <p><span>Date :</span> Mon 10 February 2020</p>
                                    <p><span>Result :</span> Lorem Ipsum is simply dummy text of the printing</p>
                                  </div>
                                </div>
                                <div class="col-md-2">
                                  <div class="day-medal-wrap">
                                   <figure ><img src="{{ URL::asset('public/images/achievement-medal-6.png')}}"></figure>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="achievement-day">
                              <!-- <h2>Day 3</h2> -->
                            </div>
                          </div>  
                          <div class="col-md-12">
                            <div class="player-bages-card">
                              <div class="row">   
                                <div class="col-md-3">
                                  <div class="school-card">
                                    <figure>
                                      <img src="{{ URL::asset('public/images/school-img-1.png')}}">
                                    </figure>
                                    <p>RALLY WITH COACH</p>
                                  </div>
                                </div>
                                <div class="col-md-6 offset-md-1">
                                  <div class="school-details">
                                    <p><span>Venu :</span> xyz school, uk</p>
                                    <p><span>Date :</span> Mon 10 February 2020</p>
                                    <p><span>Result :</span> Lorem Ipsum is simply dummy text of the printing</p>
                                  </div>
                                </div>
                                <div class="col-md-2">
                                  <div class="day-medal-wrap">
                                   <figure ></figure>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="achievement-day">
                              <!-- <h2>Day 4</h2> -->
                            </div>
                          </div>  
                          <div class="col-md-12">
                            <div class="player-bages-card">
                              <div class="row">   
                                <div class="col-md-3">
                                  <div class="school-card">
                                    <figure>
                                      <img src="{{ URL::asset('public/images/school-img-1.png')}}">
                                    </figure>
                                    <p>RALLY WITH COACH</p>
                                  </div>
                                </div>
                                <div class="col-md-6 offset-md-1">
                                  <div class="school-details">
                                    <p><span>Venu :</span> xyz school, uk</p>
                                    <p><span>Date :</span> Mon 10 February 2020</p>
                                    <p><span>Result :</span> Lorem Ipsum is simply dummy text of the printing</p>
                                  </div>
                                </div>
                                <div class="col-md-2">
                                  <div class="day-medal-wrap">
                                   <figure ><img src="{{ URL::asset('public/images/achievement-medal-2.png') }}"></figure>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="achievement-day">
                              <!-- <h2>Day 5</h2> -->
                            </div>
                          </div>  
                          <div class="col-md-12">
                            <div class="player-bages-card">
                              <div class="row">   
                                <div class="col-md-3">
                                  <div class="school-card">
                                    <figure>
                                      <img src="{{ URL::asset('public/images/school-img-1.png')}}>
                                    </figure>
                                    <p>RALLY WITH COACH</p>
                                  </div>
                                </div>
                                <div class="col-md-6 offset-md-1">
                                  <div class="school-details">
                                    <p><span>Venu :</span> xyz school, uk</p>
                                    <p><span>Date :</span> Mon 10 February 2020</p>
                                    <p><span>Result :</span> Lorem Ipsum is simply dummy text of the printing</p>
                                  </div>
                                </div>
                                <div class="col-md-2">
                                  <div class="day-medal-wrap">
                                   <figure ><img src="{{ URL::asset('public/images/achievement-medal-1.png')}}"></figure>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="achievement-day">
                              <!-- <h2>Day 6</h2> -->
                            </div>
                          </div>  
                          <div class="col-md-12">
                            <div class="player-bages-card">
                              <div class="row">   
                                <div class="col-md-3">
                                  <div class="school-card">
                                    <figure>
                                      <img src="{{ URL::asset('public/images/school-img-1.png')}}">
                                    </figure>
                                    <p>RALLY WITH COACH</p>
                                  </div>
                                </div>
                                <div class="col-md-6 offset-md-1">
                                  <div class="school-details">
                                    <p><span>Venu :</span> xyz school, uk</p>
                                    <p><span>Date :</span> Mon 10 February 2020</p>
                                    <p><span>Result :</span> Lorem Ipsum is simply dummy text of the printing</p>
                                  </div>
                                </div>
                                <div class="col-md-2">
                                  <div class="day-medal-wrap">
                                   <figure ><img src="{{ URL::asset('public/images/achievement-medal-6.png')}}"></figure>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="achievement-day">
                              <!-- <h2>Day 7</h2> -->
                            </div>
                          </div>  
                          <div class="col-md-12">
                            <div class="player-bages-card">
                              <div class="row">   
                                <div class="col-md-3">
                                  <div class="school-card">
                                    <figure>
                                      <img src="{{ URL::asset('public/images/school-img-1.png')}}">
                                    </figure>
                                    <p>RALLY WITH COACH</p>
                                  </div>
                                </div>
                                <div class="col-md-6 offset-md-1">
                                  <div class="school-details">
                                    <p><span>Venu :</span> xyz school, uk</p>
                                    <p><span>Date :</span> Mon 10 February 2020</p>
                                    <p><span>Result :</span> Lorem Ipsum is simply dummy text of the printing</p>
                                  </div>
                                </div>
                                <div class="col-md-2">
                                  <div class="day-medal-wrap">
                                   <figure ></figure>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="leader-bord-heading-wrap">
                              <h1>Leaderboard</h1>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="leader-board-table">
                              <div class="leadertable-wrap">
                              <table>
                                <thead>
                                  <tr>
                                    <th>Sr. No.</th>
                                    <th>Player Name</th>
                                    <th>Points</th>
                                    <th>Badges</th>
                                  </tr>
                                </thead>
                                <tbody> 
                                  <tr>
                                    <td><p>1</p></td>
                                    <td><p>Matteo</p></td>
                                    <td><p>1200</p></td>
                                    <td>
                                      <ul class="leader-bord-bages">
                                        <li>
                                          <figure><img src="{{ URL::asset('public/images/leaderboard-bages-img-1.png')}}"></figure>
                                        </li>
                                      </ul>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td><p>2</p></td>
                                    <td><p>Marbel Freytag</p></td>
                                    <td><p>280</p></td>
                                    <td>
                                      <ul class="leader-bord-bages">
                                        <li>
                                          <figure><img src="{{ URL::asset('public/images/leaderboard-bages-img-2.png')}}"></figure>
                                        </li>
                                      </ul>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td><p>3</p></td>
                                    <td><p>Francesco</p></td>
                                    <td><p>103</p></td>
                                    <td>
                                      <ul class="leader-bord-bages">
                                        <li>
                                          <figure><img src="{{ URL::asset('public/images/leaderboard-bages-img-1.png')}}"></figure>
                                        </li>
                                       
                                      </ul>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td><p>4</p></td>
                                    <td><p>Khouma</p></td>
                                    <td><p>1500</p></td>
                                    <td>
                                      <ul class="leader-bord-bages">
                                        <li>
                                          <figure><img src="{{ URL::asset('public/images/leaderboard-bages-img-2.png')}}"></figure>
                                        </li>
                                      </ul>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="tab-pane fade" id="nav-reports" role="tabpanel" aria-labelledby="nav-reports-tab">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="tab-page-heading">
                              <h1>My Competitions and reports</h1>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <form class="select-player-report-form">
                              <div class="form-row">
                                <div class="form-group col-md-4">
                                  <label for="inputPlayer-report">Select Player :</label>
                                  <select id="inputPlayer-report" class="form-control">
                                    <option selected>Marbel Freytag</option>
                                    <option>...</option>
                                  </select>                                                               
                                </div> 
                                <a href="javascript:void(0);" class="cstm-btn">Submit Report</a>
                              </div>  
                            </form>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="player-achievements-card">
                              <div class="row">
                                <div class="col-md-4">
                                  <div class="player-info">
                                    <figure class="player-img-wrap">
                                      <img src="{{ URL::asset('public/images/player-img.png')}}">
                                    </figure>
                                    <div class="player-name-points">
                                      <h2>MARBEL FREYTAG</h2>
                                      <h2>Points : 2000 Points</h2>
                                    </div>
                                  </div> 
                                </div>
                                <div class="col-md-3">
                                  <div class="player-group-season">
                                    <p><span>Group :</span>xyz</p>
                                    <p><span>Season :</span>xyz</p>
                                  </div>
                                </div>
                                <div class="col-md-5">
                                  <div class="player-achievements">
                                    <h2>achievements</h2>
                                    <ul class="achievement-medals">
                                      <li>
                                        <figure>
                                          <img src="{{ URL::asset('public/images/achievement-medal-1.png')}}">
                                        </figure>
                                      </li>
                                      <li>
                                        <figure>
                                          <img src="{{ URL::asset('public/images/achievement-medal-2.png') }}">
                                        </figure>
                                      </li>
                                      <li>
                                        <figure>
                                          <img src="{{ URL::asset('public/images/achievement-medal-3.png') }}">
                                        </figure>
                                      </li>
                                      <li>
                                        <figure>
                                          <img src="{{ URL::asset('public/images/achievement-medal-4.png') }}">
                                        </figure>
                                      </li>
                                      <li>
                                        <figure>
                                          <img src="{{ URL::asset('public/images/achievement-medal-5.png') }}">
                                        </figure>
                                      </li>
                                      <li>
                                        <figure>
                                          <img src="{{ URL::asset('public/images/achievement-medal-6.png') }}">
                                        </figure>
                                      </li>
                                      <li>
                                        <figure>
                                         <img src="{{ URL::asset('public/images/achievement-medal-7.png') }}">
                                        </figure>
                                      </li>
                                    </ul>
                                  </div> 
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="player-report-table">
                              <div class="report-table-wrap">
                              <table>
                                <thead>
                                  <tr>
                                    <th>Date</th>
                                    <th>Report ID</th>
                                    <th>Report Type</th>
                                    <th>Report Type</th>
                                    <th>Created By</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody> 
                                  <tr>
                                    <td><p>22 Jan 2020</p></td>
                                    <td><p>123456</p></td>
                                    <td><p>End of term group report</p></td>
                                    <td><p>Spring</p></td>
                                    <td><p>John Deo</p></td>
                                    <td><p>Read</p></td>
                                    <td><p>Read Report</p></td> 
                                  </tr>
                                  <tr>
                                    <td><p>02 Feb 2020</p></td>
                                    <td><p>963254</p></td>
                                    <td><p>End of term group report</p></td>
                                    <td><p>Summer</p></td>
                                    <td><p>Smith</p></td>
                                    <td><p>UnRead</p></td>
                                    <td><p>Read Report</p></td>
                                  </tr>
                                  <tr>
                                    <td><p>15 Feb 2020</p></td>
                                    <td><p>258452</p></td>
                                    <td><p>End of term group report</p></td>
                                    <td><p>Autumn - 2020</p></td>
                                    <td><p>John Deo</p></td>
                                    <td><p>Read</p></td>
                                    <td><p>Read Report</p></td>
                                  </tr>
                                  <tr>
                                    <td><p>20 Feb 2020</p></td>
                                    <td><p>975232</p></td>
                                    <td><p>End of term group report</p></td>
                                    <td><p>Spring</p></td>
                                    <td><p>Smith</p></td>
                                    <td><p>UnRead</p></td>
                                    <td><p>Read Report</p></td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="tab-pane fade" id="nav-family" role="tabpanel" aria-labelledby="nav-family-tab">
                        
                      </div>
                      <div class="tab-pane fade" id="nav-booking" role="tabpanel" aria-labelledby="nav-bookings-tab">
                        
                      </div>
                      <div class="tab-pane fade" id="nav-settings" role="tabpanel" aria-labelledby="nav-settings-tab">
                        
                      </div>
                    </div>                
            </div>
          </div>
        </div>
    </section>
    <section class="drh-activity-sec football-services-sec">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="drh-activity-heading text-center">
              <div class="section-heading">
                  <h1 class="sec-heading">DRH ACTIVITIES</h1>
                </div>
            </div>    
          </div>
            <div class="col-lg-4 col-md-6">
              <div class="activity-card text-center">
                  <figure class="activity-card-img">
                    <img src="{{ URL::asset('public/images/drh-activity-img-1.png') }}">
                  </figure>
                  <figcaption class="activity-caption"> 
                    <h2>Tennis Coaching Courses</h2>
                    <p>Courses for all ages & abilities</p>
                    <a href="javascript:void(0);" class="book-now-link">Book Now</a>  
                  </figcaption>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="activity-card text-center">
                  <figure class="activity-card-img">
                    <img src="{{ URL::asset('public/images/drh-activity-img-2.png') }}">
                  </figure>
                  <figcaption class="activity-caption"> 
                    <h2>Football coaching</h2>
                    <p>Coming soon!</p>
                    <a href="javascript:void(0);" class="book-now-link">Book Now</a>  
                  </figcaption>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="activity-card text-center">
                  <figure class="activity-card-img">
                    <img src="{{ URL::asset('public/images/drh-activity-img-3.png') }}">
                  </figure>
                  <figcaption class="activity-caption"> 
                    <h2>Camp Go!</h2>
                    <p>Holidays camps for kids</p>
                    <a href="javascript:void(0);" class="book-now-link">Book Now</a>  
                  </figcaption>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="click-here-sec">
      <div class="container">
        <div class="row">
          <div class="col-md-8 offset-md-2">
            <div class="click-sec-content">
              <h2 class="click-sec-tagline">Need help with kids camps or our coaching courses?</h2>
                <ul class="click-btn-content">
                  <li>
                    <figure>
                    <img src="{{ URL::asset('public/images/click-btn-img.png') }}">
                </figure>
                </li>
                <li>
                  <a href="javascript:void(0);" class="cstm-btn">click here</a>
                </li>
                <li>
                    <figure>
                    <img src="{{ URL::asset('public/images/click-btn-img.png') }}">
                </figure>
                </li>
                </ul>
            </div>
          </div>
        </div>
      </div>
    </section>

@endsection
<!-- Footer Section-->