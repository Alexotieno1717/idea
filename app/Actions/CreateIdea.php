<?php

namespace App\Action;

use Illuminate\Support\Facades\Auth;

class CreateIdea
{
    public function handle()
    {
        $idea = Auth::user()->ideas()->create($request->safe()->except('steps'));

        $idea->steps()->createMany(
            collect($request->steps)->map(fn ($step) => ['description' => $step])
        );

        $imagePath = $request->image->store('ideas', 'public');

        $idea->update(['image' => $imagePath]);
    }
}
