<?php
namespace Tests\Feature;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Laravel\Passport\Passport;
use App\Story;
use App\User;

class StorysTest extends TestCase
 {
     use DatabaseMigrations;
/** * @test
 * * @watch
 */
public function it_returns_an_Story_as_a_resource_object() {
    $Story = factory(Story::class)->create();
    $user = factory(User::class)->create();
    Passport::actingAs($user);
    $this->getJson('/api/auth/Story/1', [
         'accept' => 'application/vnd.api+json',
          'content-type' => 'application/vnd.api+json'
          , ])
           ->assertStatus(200)
            ->assertStatus(200)
            ->assertJson([
                "data" => [
                    "id" => '1',
                    "type" => "Story",
                    "attributes" => [
                        'title' => $Story->title,
                        'description' => $Story->description,

                        'created_at' => $Story->created_at->toJSON(),
                        'updated_at' => $Story->updated_at->toJSON(),
                    ]
                ]
            ]);

}
/** * @test
 * * @watch
 */


public function it_returns_all_Storys_as_a_collection_of_resource_objects() {

    $user = factory(User::class)->create();
    Passport::actingAs($user);
    $Story = factory(Story::class, 3)->create();

    $this->get('/api/auth/Story', [
        'accept' => 'application/vnd.api+json',
        'content-type' => 'application/vnd.api+json',
    ])->assertStatus(200)->assertJson([
        "data" => [
            [
                "id" => '1',
                "type" => "Story",
                "attributes" => [
                    'title' => $Story[0]->title,
                    'description' => $Story[0]->description,

                    'created_at' => $Story[0]->created_at->toJSON(),
                    'updated_at' => $Story[0]->updated_at->toJSON(),
                ]
            ],
            [
                "id" => '2',
                "type" => "Story",
                "attributes" => [
                    'title' => $Story[1]->title,
                    'description' => $Story[1]->description,

                    'created_at' => $Story[1]->created_at->toJSON(),
                    'updated_at' => $Story[1]->updated_at->toJSON(),
                ]
            ],
            [
                "id" => '3',
                "type" => "Story",
                "attributes" => [
                    'title' => $Story[2]->title,
                    'description' => $Story[2]->description,

                    'created_at' => $Story[2]->created_at->toJSON(),
                    'updated_at' => $Story[2]->updated_at->toJSON(),
                ]
            ],
        ]
    ]);
}
/** * @test */
public function it_can_create_an_Story_from_a_resource_object() {


}
/** * @test */
 public function it_validates_that_the_type_member_is_given_when_creating_an_Story () {

}
/** * @test */
public function it_validates_that_the_type_member_has_the_value_of_Storys_when_creating_an_Story () {

}
/** * @test */
public function it_validates_that_the_attributes_member_has_been_given_when_creating_an_Story ()
{

}
/** * @test */
public function it_validates_that_the_attributes_member_is_an_object_given_when_creating_an_Story () {

}
/** * @test */
public function it_validates_that_a_title_attribute_is_given_when_creating_an_Story () {
}
/** * @test */
public function it_validates_that_a_title_attribute_is_a_string_when_creating_an_Story () {
}
/** * @test */
public function it_validates_that_a_description_attribute_is_given_when_creating_an_Story ()


{
}
/** * @test */
public function it_validates_that_a_description_attribute_is_a_string_when_creating_an_Story () {

}
/** * @test */
public function it_validates_that_a_publication_year_attribute_is_given_when_creating_an_Story () {

}
/** * @test */
public function it_validates_that_a_publication_year_attribute_is_a_string_when_creating_an_Story () {

}
/** * @test */ public function it_can_update_an_Story_from_a_resource_object() {


}
/** * @test */
public function it_validates_that_an_id_member_is_given_when_updating_an_Story () {

}
/** * @test */
public function it_validates_that_an_id_member_is_a_string_when_updating_an_Story () {

}
/** * @test */
 public function it_validates_that_the_type_member_is_given_when_updating_an_Story () {

}
/** * @test */
 public function it_validates_that_the_type_member_has_the_value_of_Storys_when_updating_an_Story () {



}
/** * @test */
public function it_validates_that_the_attributes_member_has_been_given_when_updating_an_Story () {

}
/** * @test */
 public function it_validates_that_the_attributes_member_is_an_object_given_when_updating_an_Story () {

}
/** * @test */
public function it_validates_that_a_title_attribute_is_a_string_when_updating_an_Story () {

}
/** * @test */
public function it_validates_that_a_description_attribute_is_a_string_when_updating_an_Story () {


}
/** * @test */
 public function it_validates_that_a_publication_year_attribute_is_a_string_when_updating_an_Story () {

}
/** * @test */
 public function it_can_delete_an_Story_through_a_delete_request() {

}
/** * @test */
 public function it_can_sort_Storys_by_title_through_a_sort_query_parameter() {

}
/** * @test */
 public function it_can_sort_Storys_by_title_in_descending_order_through_a_sort_query_parameter () {

}
/**
* @test */

public function it_can_sort_Storys_by_multiple_attributes_through_a_sort_query_parameter () {

}
/** * @test */
 public function it_can_sort_Storys_by_multiple_attributes_in_descending_order_through_a_sort_query_parameter () {

}
/** * @test */
public function it_can_paginate_Storys_through_a_page_query_parameter() {

}
/** * @test */
 public function it_can_paginate_Storys_through_a_page_query_parameter_and_show_different_pages () {

}
}
