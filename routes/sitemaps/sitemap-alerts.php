<?php

Route::get('sitemap-alerts', function() {
    $sitemap = App::make('sitemap');

    if (!$sitemap->isCached()) {

        $alerts = \App\Models\Alert::where('deleted_at', '=', null)->get();

        foreach($alerts as $a){
            $url = route('alerts.show', ['slug' => $a->slug]);
            $sitemap->add($url, $a->updated_at->toW3cString(), '1.0', 'daily');
        }
    }

    return $sitemap->render('xml');
});