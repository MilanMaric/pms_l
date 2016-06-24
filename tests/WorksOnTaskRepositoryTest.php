<?php

use App\Models\WorksOnTask;
use App\Repositories\WorksOnTaskRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class WorksOnTaskRepositoryTest extends TestCase
{
    use MakeWorksOnTaskTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var WorksOnTaskRepository
     */
    protected $worksOnTaskRepo;

    public function setUp()
    {
        parent::setUp();
        $this->worksOnTaskRepo = App::make(WorksOnTaskRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateWorksOnTask()
    {
        $worksOnTask = $this->fakeWorksOnTaskData();
        $createdWorksOnTask = $this->worksOnTaskRepo->create($worksOnTask);
        $createdWorksOnTask = $createdWorksOnTask->toArray();
        $this->assertArrayHasKey('id', $createdWorksOnTask);
        $this->assertNotNull($createdWorksOnTask['id'], 'Created WorksOnTask must have id specified');
        $this->assertNotNull(WorksOnTask::find($createdWorksOnTask['id']), 'WorksOnTask with given id must be in DB');
        $this->assertModelData($worksOnTask, $createdWorksOnTask);
    }

    /**
     * @test read
     */
    public function testReadWorksOnTask()
    {
        $worksOnTask = $this->makeWorksOnTask();
        $dbWorksOnTask = $this->worksOnTaskRepo->find($worksOnTask->id);
        $dbWorksOnTask = $dbWorksOnTask->toArray();
        $this->assertModelData($worksOnTask->toArray(), $dbWorksOnTask);
    }

    /**
     * @test update
     */
    public function testUpdateWorksOnTask()
    {
        $worksOnTask = $this->makeWorksOnTask();
        $fakeWorksOnTask = $this->fakeWorksOnTaskData();
        $updatedWorksOnTask = $this->worksOnTaskRepo->update($fakeWorksOnTask, $worksOnTask->id);
        $this->assertModelData($fakeWorksOnTask, $updatedWorksOnTask->toArray());
        $dbWorksOnTask = $this->worksOnTaskRepo->find($worksOnTask->id);
        $this->assertModelData($fakeWorksOnTask, $dbWorksOnTask->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteWorksOnTask()
    {
        $worksOnTask = $this->makeWorksOnTask();
        $resp = $this->worksOnTaskRepo->delete($worksOnTask->id);
        $this->assertTrue($resp);
        $this->assertNull(WorksOnTask::find($worksOnTask->id), 'WorksOnTask should not exist in DB');
    }
}
