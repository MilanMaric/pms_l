<?php

use Faker\Factory as Faker;
use App\Models\Income;
use App\Repositories\IncomeRepository;

trait MakeIncomeTrait
{
    /**
     * Create fake instance of Income and save it in database
     *
     * @param array $incomeFields
     * @return Income
     */
    public function makeIncome($incomeFields = [])
    {
        /** @var IncomeRepository $incomeRepo */
        $incomeRepo = App::make(IncomeRepository::class);
        $theme = $this->fakeIncomeData($incomeFields);
        return $incomeRepo->create($theme);
    }

    /**
     * Get fake instance of Income
     *
     * @param array $incomeFields
     * @return Income
     */
    public function fakeIncome($incomeFields = [])
    {
        return new Income($this->fakeIncomeData($incomeFields));
    }

    /**
     * Get fake data of Income
     *
     * @param array $postFields
     * @return array
     */
    public function fakeIncomeData($incomeFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'project_id' => $fake->randomDigitNotNull,
            'Description' => $fake->word,
            'Amount' => $fake->randomDigitNotNull,
            'activity_id' => $fake->randomDigitNotNull,
            'Date' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word,
            'deleted_at' => $fake->word
        ], $incomeFields);
    }
}
