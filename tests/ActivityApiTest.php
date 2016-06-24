<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ActivityApiTest extends TestCase
{
    use MakeActivityTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateActivity()
    {
        $activity = $this->fakeActivityData();
        $this->json('POST', '/api/v1/activities', $activity);

        $this->assertApiResponse($activity);
    }

    /**
     * @test
     */
    public function testReadActivity()
    {
        $activity = $this->makeActivity();
        $this->json('GET', '/api/v1/activities/'.$activity->id);

        $this->assertApiResponse($activity->toArray());
    }

    /**
     * @test
     */
    public function testUpdateActivity()
    {
        $activity = $this->makeActivity();
        $editedActivity = $this->fakeActivityData();

        $this->json('PUT', '/api/v1/activities/'.$activity->id, $editedActivity);

        $this->assertApiResponse($editedActivity);
    }

    /**
     * @test
     */
    public function testDeleteActivity()
    {
        $activity = $this->makeActivity();
        $this->json('DELETE', '/api/v1/activities/'.$activity->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/activities/'.$activity->id);

        $this->assertResponseStatus(404);
    }
}
