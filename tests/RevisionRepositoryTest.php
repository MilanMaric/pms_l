<?php

use App\Models\Revision;
use App\Repositories\RevisionRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RevisionRepositoryTest extends TestCase
{
    use MakeRevisionTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var RevisionRepository
     */
    protected $revisionRepo;

    public function setUp()
    {
        parent::setUp();
        $this->revisionRepo = App::make(RevisionRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateRevision()
    {
        $revision = $this->fakeRevisionData();
        $createdRevision = $this->revisionRepo->create($revision);
        $createdRevision = $createdRevision->toArray();
        $this->assertArrayHasKey('id', $createdRevision);
        $this->assertNotNull($createdRevision['id'], 'Created Revision must have id specified');
        $this->assertNotNull(Revision::find($createdRevision['id']), 'Revision with given id must be in DB');
        $this->assertModelData($revision, $createdRevision);
    }

    /**
     * @test read
     */
    public function testReadRevision()
    {
        $revision = $this->makeRevision();
        $dbRevision = $this->revisionRepo->find($revision->id);
        $dbRevision = $dbRevision->toArray();
        $this->assertModelData($revision->toArray(), $dbRevision);
    }

    /**
     * @test update
     */
    public function testUpdateRevision()
    {
        $revision = $this->makeRevision();
        $fakeRevision = $this->fakeRevisionData();
        $updatedRevision = $this->revisionRepo->update($fakeRevision, $revision->id);
        $this->assertModelData($fakeRevision, $updatedRevision->toArray());
        $dbRevision = $this->revisionRepo->find($revision->id);
        $this->assertModelData($fakeRevision, $dbRevision->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteRevision()
    {
        $revision = $this->makeRevision();
        $resp = $this->revisionRepo->delete($revision->id);
        $this->assertTrue($resp);
        $this->assertNull(Revision::find($revision->id), 'Revision should not exist in DB');
    }
}
