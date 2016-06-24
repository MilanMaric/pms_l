<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class WorksOnProjectApiTest extends TestCase
{
    use MakeWorksOnProjectTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateWorksOnProject()
    {
        $worksOnProject = $this->fakeWorksOnProjectData();
        $this->json('POST', '/api/v1/worksOnProjects', $worksOnProject);

        $this->assertApiResponse($worksOnProject);
    }

    /**
     * @test
     */
    public function testReadWorksOnProject()
    {
        $worksOnProject = $this->makeWorksOnProject();
        $this->json('GET', '/api/v1/worksOnProjects/'.$worksOnProject->id);

        $this->assertApiResponse($worksOnProject->toArray());
    }

    /**
     * @test
     */
    public function testUpdateWorksOnProject()
    {
        $worksOnProject = $this->makeWorksOnProject();
        $editedWorksOnProject = $this->fakeWorksOnProjectData();

        $this->json('PUT', '/api/v1/worksOnProjects/'.$worksOnProject->id, $editedWorksOnProject);

        $this->assertApiResponse($editedWorksOnProject);
    }

    /**
     * @test
     */
    public function testDeleteWorksOnProject()
    {
        $worksOnProject = $this->makeWorksOnProject();
        $this->json('DELETE', '/api/v1/worksOnProjects/'.$worksOnProject->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/worksOnProjects/'.$worksOnProject->id);

        $this->assertResponseStatus(404);
    }
}
