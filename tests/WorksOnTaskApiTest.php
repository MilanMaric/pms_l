<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class WorksOnTaskApiTest extends TestCase
{
    use MakeWorksOnTaskTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateWorksOnTask()
    {
        $worksOnTask = $this->fakeWorksOnTaskData();
        $this->json('POST', '/api/v1/worksOnTasks', $worksOnTask);

        $this->assertApiResponse($worksOnTask);
    }

    /**
     * @test
     */
    public function testReadWorksOnTask()
    {
        $worksOnTask = $this->makeWorksOnTask();
        $this->json('GET', '/api/v1/worksOnTasks/'.$worksOnTask->id);

        $this->assertApiResponse($worksOnTask->toArray());
    }

    /**
     * @test
     */
    public function testUpdateWorksOnTask()
    {
        $worksOnTask = $this->makeWorksOnTask();
        $editedWorksOnTask = $this->fakeWorksOnTaskData();

        $this->json('PUT', '/api/v1/worksOnTasks/'.$worksOnTask->id, $editedWorksOnTask);

        $this->assertApiResponse($editedWorksOnTask);
    }

    /**
     * @test
     */
    public function testDeleteWorksOnTask()
    {
        $worksOnTask = $this->makeWorksOnTask();
        $this->json('DELETE', '/api/v1/worksOnTasks/'.$worksOnTask->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/worksOnTasks/'.$worksOnTask->id);

        $this->assertResponseStatus(404);
    }
}
