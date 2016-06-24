<?php

use App\Models\Task;
use App\Repositories\TaskRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TaskRepositoryTest extends TestCase
{
    use MakeTaskTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TaskRepository
     */
    protected $taskRepo;

    public function setUp()
    {
        parent::setUp();
        $this->taskRepo = App::make(TaskRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateTask()
    {
        $task = $this->fakeTaskData();
        $createdTask = $this->taskRepo->create($task);
        $createdTask = $createdTask->toArray();
        $this->assertArrayHasKey('id', $createdTask);
        $this->assertNotNull($createdTask['id'], 'Created Task must have id specified');
        $this->assertNotNull(Task::find($createdTask['id']), 'Task with given id must be in DB');
        $this->assertModelData($task, $createdTask);
    }

    /**
     * @test read
     */
    public function testReadTask()
    {
        $task = $this->makeTask();
        $dbTask = $this->taskRepo->find($task->id);
        $dbTask = $dbTask->toArray();
        $this->assertModelData($task->toArray(), $dbTask);
    }

    /**
     * @test update
     */
    public function testUpdateTask()
    {
        $task = $this->makeTask();
        $fakeTask = $this->fakeTaskData();
        $updatedTask = $this->taskRepo->update($fakeTask, $task->id);
        $this->assertModelData($fakeTask, $updatedTask->toArray());
        $dbTask = $this->taskRepo->find($task->id);
        $this->assertModelData($fakeTask, $dbTask->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteTask()
    {
        $task = $this->makeTask();
        $resp = $this->taskRepo->delete($task->id);
        $this->assertTrue($resp);
        $this->assertNull(Task::find($task->id), 'Task should not exist in DB');
    }
}
