<?php

namespace App\Providers;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\Settings;
use App\Booking;
use App\Event;
use App\Venue;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        $mydate = Carbon::now()->toDateString();
        $settings = Settings::first();
        $usercount = User::all();
        $event_data = Event::join('venues', function($join) use ($mydate)
            {
                $join->on('events.venue_id', '=', 'venues.id')
                     ->where('events.status', '=', 1)
                     ->where('events.event_date', '>', $mydate);
            })
          ->select('events.*', 'venues.address','venues.name as venue_name', 'venues.image', 'venues.postcode')
          ->orderBy('events.event_date', 'asc')
          ->paginate(10);
        $count = $usercount->count();
        View::share('settings', $settings);
        View::share('count', $count);
        View::share('event_data', $event_data);
    }
}
