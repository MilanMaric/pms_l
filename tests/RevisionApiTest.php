<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RevisionApiTest extends TestCase
{
    use MakeRevisionTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateRevision()
    {
        $revision = $this->fakeRevisionData();
        $this->json('POST', '/api/v1/revisions', $revision);

        $this->assertApiResponse($revision);
    }

    /**
     * @test
     */
    public function testReadRevision()
    {
        $revision = $this->makeRevision();
        $this->json('GET', '/api/v1/revisions/'.$revision->id);

        $this->assertApiResponse($revision->toArray());
    }

    /**
     * @test
     */
    public function testUpdateRevision()
    {
        $revision = $this->makeRevision();
        $editedRevision = $this->fakeRevisionData();

        $this->json('PUT', '/api/v1/revisions/'.$revision->id, $editedRevision);

        $this->assertApiResponse($editedRevision);
    }

    /**
     * @test
     */
    public function testDeleteRevision()
    {
        $revision = $this->makeRevision();
        $this->json('DELETE', '/api/v1/revisions/'.$revision->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/revisions/'.$revision->id);

        $this->assertResponseStatus(404);
    }
}
