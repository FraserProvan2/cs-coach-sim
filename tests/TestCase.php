<?php

namespace Tests;

use App\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function seedDb()
    {
        $this->artisan('db:seed');
    }
    
    public function loginAsUser($type = null)
    {
        if ($type === 'admin') {
            return $this->actingAs(User::find(2));
        }

        return $this->actingAs(User::find(1));
    }
}
