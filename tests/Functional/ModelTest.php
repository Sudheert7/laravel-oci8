<?php

namespace Yajra\Oci8\Tests\Functional;

use Yajra\Oci8\Tests\TestCase;
use Yajra\Oci8\Tests\UserWithGuardedProperty;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ModelTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_can_insert_by_setting_the_property()
    {
        $user        = new UserWithGuardedProperty;
        $user->name  = 'Test';
        $user->email = 'test@example.com';
        $user->save();

        $this->assertDatabaseCount('users', 21);
    }

    /** @test */
    public function it_can_insert_using_create_method()
    {
        $user = UserWithGuardedProperty::create([
            'name'  => 'Test',
            'email' => 'test@example.com',
        ]);

        $this->assertDatabaseCount('users', 21);
    }
}
