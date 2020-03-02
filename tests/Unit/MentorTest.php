<?php
namespace Tests\Feature;
use Illuminate\Foundation\Testing\DatabaseMigrations;
Use Tests\TestCase;

class MentorTest extends TestCase
{
    public function it_returns_a_mentor_as_a_resource_object()
    {
        $Mentor = Mentor::create([ 'name' => 'John Doe', ]);
        //$Mentor = factory(Mentor::class)->create();
        $this->getJson('/api/auth/Mentor/1')->assertStatus(200)->assertJson([

            "data" => [ "id" => '1', "type" => "Mentors", "attributes" => [ 'name' => $Mentor->name, 'created_at' => $Mentor->created_at->toJSON(), 'updated_at' => $Mentor->updated_at->toJSON(), ] ]
            ]);

    }



}
