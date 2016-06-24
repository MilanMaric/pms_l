<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TaskApiTest extends TestCase
{
    use MakeTaskTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateTask()
    {
        $task = $this->fakeTaskData();
        $this->json('POST', '/api/v1/tasks', $task);

        $this->assertApiResponse($task);
    }

    /**
     * @test
     */
    public function testReadTask()
    {
        $task = $this->makeTask();
        $this->json('GET', '/api/v1/tasks/'.$task->id);

        $this->assertApiResponse($task->toArray());
    }

    /**
     * @test
     */
    public function testUpdateTask()
    {
        $task = $this->makeTask();
        $editedTask = $this->fakeTaskData();

        $this->json('PUT', '/api/v1/tasks/'.$task->id, $editedTask);

        $this->assertApiResponse($editedTask);
    }

    /**
     * @test
     */
    public function testDeleteTask()
    {
        $task = $this->makeTask();
        $this->json('DELETE', '/api/v1/tasks/'.$task->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/tasks/'.$task->id);

        $this->assertResponseStatus(404);
    }
}
