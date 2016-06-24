<?php

use App\Models\WorksOnProject;
use App\Repositories\WorksOnProjectRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class WorksOnProjectRepositoryTest extends TestCase
{
    use MakeWorksOnProjectTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var WorksOnProjectRepository
     */
    protected $worksOnProjectRepo;

    public function setUp()
    {
        parent::setUp();
        $this->worksOnProjectRepo = App::make(WorksOnProjectRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateWorksOnProject()
    {
        $worksOnProject = $this->fakeWorksOnProjectData();
        $createdWorksOnProject = $this->worksOnProjectRepo->create($worksOnProject);
        $createdWorksOnProject = $createdWorksOnProject->toArray();
        $this->assertArrayHasKey('id', $createdWorksOnProject);
        $this->assertNotNull($createdWorksOnProject['id'], 'Created WorksOnProject must have id specified');
        $this->assertNotNull(WorksOnProject::find($createdWorksOnProject['id']), 'WorksOnProject with given id must be in DB');
        $this->assertModelData($worksOnProject, $createdWorksOnProject);
    }

    /**
     * @test read
     */
    public function testReadWorksOnProject()
    {
        $worksOnProject = $this->makeWorksOnProject();
        $dbWorksOnProject = $this->worksOnProjectRepo->find($worksOnProject->id);
        $dbWorksOnProject = $dbWorksOnProject->toArray();
        $this->assertModelData($worksOnProject->toArray(), $dbWorksOnProject);
    }

    /**
     * @test update
     */
    public function testUpdateWorksOnProject()
    {
        $worksOnProject = $this->makeWorksOnProject();
        $fakeWorksOnProject = $this->fakeWorksOnProjectData();
        $updatedWorksOnProject = $this->worksOnProjectRepo->update($fakeWorksOnProject, $worksOnProject->id);
        $this->assertModelData($fakeWorksOnProject, $updatedWorksOnProject->toArray());
        $dbWorksOnProject = $this->worksOnProjectRepo->find($worksOnProject->id);
        $this->assertModelData($fakeWorksOnProject, $dbWorksOnProject->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteWorksOnProject()
    {
        $worksOnProject = $this->makeWorksOnProject();
        $resp = $this->worksOnProjectRepo->delete($worksOnProject->id);
        $this->assertTrue($resp);
        $this->assertNull(WorksOnProject::find($worksOnProject->id), 'WorksOnProject should not exist in DB');
    }
}
