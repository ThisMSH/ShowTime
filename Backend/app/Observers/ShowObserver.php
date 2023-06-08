<?php

namespace App\Observers;

use App\Models\Show;

class ShowObserver
{
    /**
     * Handle the Show "created" event.
     */
    public function created(Show $show): void
    {
        if ($show->prequel) {
            Show::find($show->prequel)->update(['sequel' => $show->id]);
        }

        if ($show->sequel) {
            Show::find($show->sequel)->update(['prequel' => $show->id]);
        }
    }

    /**
     * Handle the Show "updated" event.
     */
    public function updated(Show $show): void
    {
        if ($show->prequel) {
            Show::where('prequel', $show->prequel)->updated(['sequel' => null]);
            Show::find($show->prequel)->update(['sequel' => $show->id]);
        }

        if ($show->sequel) {
            Show::where('sequel', $show->sequel)->updated(['prequel' => null]);
            Show::find($show->sequel)->update(['prequel' => $show->id]);
        }
    }

    /**
     * Handle the Show "deleted" event.
     */
    public function deleted(Show $show): void
    {
        if ($show->prequel) {
            Show::find($show->prequel)->update(['sequel' => null]);
        }

        if ($show->sequel) {
            Show::find($show->sequel)->update(['prequel' => null]);
        }
    }

    /**
     * Handle the Show "restored" event.
     */
    public function restored(Show $show): void
    {
        //
    }

    /**
     * Handle the Show "force deleted" event.
     */
    public function forceDeleted(Show $show): void
    {
        //
    }
}
