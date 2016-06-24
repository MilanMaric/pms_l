<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class IncomeApiTest extends TestCase
{
    use MakeIncomeTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateIncome()
    {
        $income = $this->fakeIncomeData();
        $this->json('POST', '/api/v1/incomes', $income);

        $this->assertApiResponse($income);
    }

    /**
     * @test
     */
    public function testReadIncome()
    {
        $income = $this->makeIncome();
        $this->json('GET', '/api/v1/incomes/'.$income->id);

        $this->assertApiResponse($income->toArray());
    }

    /**
     * @test
     */
    public function testUpdateIncome()
    {
        $income = $this->makeIncome();
        $editedIncome = $this->fakeIncomeData();

        $this->json('PUT', '/api/v1/incomes/'.$income->id, $editedIncome);

        $this->assertApiResponse($editedIncome);
    }

    /**
     * @test
     */
    public function testDeleteIncome()
    {
        $income = $this->makeIncome();
        $this->json('DELETE', '/api/v1/incomes/'.$income->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/incomes/'.$income->id);

        $this->assertResponseStatus(404);
    }
}
