<?php namespace Sanatorium\Dashboards\Widgets;

class Dashboard {

	public function show($slug = null)
	{
	    // Slug of the dashboard was not specified
	    if ( $slug == null )
	        return null;

		$repository = app('sanatorium.dashboards.dashboard');

        $dashboard = $repository->with('widgets')->where('slug', $slug)->first();

        if ( !is_object($dashboard) )
            return null;

        $widgets = $dashboard->widgets()->orderBy('order')->get();

        return view('sanatorium/dashboards::dashboard', compact('dashboard', 'widgets'));
	}

}
