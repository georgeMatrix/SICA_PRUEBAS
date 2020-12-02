<?php

namespace Tests\Feature\App\Http\Controllers\Backend\Role_User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use Illuminate\Support\Facades\Gate;
use App\Helpers\DefaultDataSeed;
use App\Models\Role_User\Role;
use Illuminate\Http\UploadedFile as HttpUploadedFile;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class UserControllerTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    public function list_of_users_test()
    {
        $this->withoutExceptionHandling();

        DefaultDataSeed::default_data_seed();

        $user = User::first();

        $response = $this->actingAs($user)->get('/user');

        $response->assertOk();

        Gate::authorize('haveaccess', 'user.index');

        $users = User::with('roles')->get();

        $response->assertViewIs('role_user.user.index');

        $response->assertViewHas('users', $users);
        
    }


    /** @test */

    public function show_user_test()
    {
        $this->withoutExceptionHandling();

        DefaultDataSeed::default_data_seed();
        
        $user = User::first();

        $response = $this->actingAs($user)->get('/user/' . $user->id);
        
        Gate::authorize('view', [$user, ['user.show', 'userown.show']]);
        
        $roles = Role::orderBy('name')->get();

        
        $response->assertOk();
        
        
        
        $response->assertViewIs('role_user.user.show');
        
        $response->assertViewHas('user', $user);
        $response->assertViewHas('roles', $roles);
    }
    
    /** @test */
    public function edit_user_test()
    {
        $this->withoutExceptionHandling();
   
        DefaultDataSeed::default_data_seed();
        
        $user = User::first();


        $response = $this->actingAs($user)->get('/user/' . $user->id . '/edit');

        Gate::authorize('update', [$user, ['user.edit', 'userown.edit']]);

        $roles = Role::orderBy('name')->get();


        $response->assertOk();



        $response->assertViewIs('role_user.user.edit');

        $response->assertViewHas('user', $user);
        $response->assertViewHas('roles', $roles);
    }


    /** @test */
    public function update_user_with_role_test()
    {
        $this->withoutExceptionHandling();

        DefaultDataSeed::default_data_seed();

        $user = User::first();

        factory(Role::class, 1)->create(
            [
                'name' => 'guest',
                'slug' => 'guest',
                'description' => 'User guest',
                'full_access' => 'no'
            ]
        );

        $last_role = Role::orderBy('id', 'DESC')->first();


        $response = $this->actingAs($user)->put('/user/' . $user->id, [
            'name' => 'update user',
            'email' => 'update@update.com',
            'roles' => $last_role

        ]);




        Gate::authorize('update', [$user, ['user.edit', 'userown.edit']]);


        $this->assertCount(1, User::all());

        $user = $user->fresh();

        $current_role = array();

        foreach ($user->roles as $role) {
            array_push($current_role, $role->id);
        }



        $this->assertEquals($user->name, 'update user');
        $this->assertEquals($user->email, 'update@update.com');
        $this->assertEquals($current_role[0], $last_role->id);



        $response->assertRedirect('/user');
    }


    /** @test */
    public function update_user_test()
    {
        $this->withoutExceptionHandling();

        DefaultDataSeed::default_data_seed();

        $user = User::first();

        $response = $this->actingAs($user)->put('/user/' . $user->id, [
            'name' => 'update user',
            'email' => 'update@update.com'
        ]);

        Gate::authorize('update', [$user, ['user.edit', 'userown.edit']]);


        $this->assertCount(1, User::all());

        $user = $user->fresh();

        $this->assertEquals($user->name, 'update user');
        $this->assertEquals($user->email, 'update@update.com');

        $response->assertRedirect('/user');
    }


    /** @test */
    public function delete_user_test()
    {
        $this->withoutExceptionHandling();

        DefaultDataSeed::default_data_seed();

        $user = User::first();

        $response = $this->actingAs($user)->delete('/user/' . $user->id);

        Gate::authorize('haveaccess', 'user.destroy');
        $this->assertCount(0, User::all());


        $response->assertRedirect('/user');
    }
}
