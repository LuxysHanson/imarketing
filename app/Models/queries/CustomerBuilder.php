<?php

namespace App\Models\queries;

use Illuminate\Database\Eloquent\Builder;

class CustomerBuilder extends Builder
{

    public function byUser(): self
    {
        if (!auth()->guest()) {
            return $this->where('user_id', auth()->user()->id);
        }

        return $this->where('session_id', session()->getId());
    }

}
