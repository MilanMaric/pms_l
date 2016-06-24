<?php

use App\Models\Income;
use App\Repositories\IncomeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class IncomeRepositoryTest extends TestCase
{
    use MakeIncomeTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var IncomeRepository
     */
    protected $incomeRepo;

    public function setUp()
    {
        parent::setUp();
        $this->incomeRepo = App::make(IncomeRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateIncome()
    {
        $income = $this->fakeIncomeData();
        $createdIncome = $this->incomeRepo->create($income);
        $createdIncome = $createdIncome->toArray();
        $this->assertArrayHasKey('id', $createdIncome);
        $this->assertNotNull($createdIncome['id'], 'Created Income must have id specified');
        $this->assertNotNull(Income::find($createdIncome['id']), 'Income with given id must be in DB');
        $this->assertModelData($income, $createdIncome);
    }

    /**
     * @test read
     */
    public function testReadIncome()
    {
        $income = $this->makeIncome();
        $dbIncome = $this->incomeRepo->find($income->id);
        $dbIncome = $dbIncome->toArray();
        $this->assertModelData($income->toArray(), $dbIncome);
    }

    /**
     * @test update
     */
    public function testUpdateIncome()
    {
        $income = $this->makeIncome();
        $fakeIncome = $this->fakeIncomeData();
        $updatedIncome = $this->incomeRepo->update($fakeIncome, $income->id);
        $this->assertModelData($fakeIncome, $updatedIncome->toArray());
        $dbIncome = $this->incomeRepo->find($income->id);
        $this->assertModelData($fakeIncome, $dbIncome->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteIncome()
    {
        $income = $this->makeIncome();
        $resp = $this->incomeRepo->delete($income->id);
        $this->assertTrue($resp);
        $this->assertNull(Income::find($income->id), 'Income should not exist in DB');
    }
}
