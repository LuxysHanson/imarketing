<?php

namespace App\Components\Traits;

use App\Models\queries\CustomerBuilder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

trait Customer
{

    public function loadData(): void
    {
        $this->user_id = !Auth::guest() ? Auth::user()->id : null;
        $this->session_id = Session::getId();
    }

    public function newEloquentBuilder($query): CustomerBuilder
    {
        return new CustomerBuilder($query);
    }

}
