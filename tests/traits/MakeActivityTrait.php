<?php

use Faker\Factory as Faker;
use App\Models\Activity;
use App\Repositories\ActivityRepository;

trait MakeActivityTrait
{
    /**
     * Create fake instance of Activity and save it in database
     *
     * @param array $activityFields
     * @return Activity
     */
    public function makeActivity($activityFields = [])
    {
        /** @var ActivityRepository $activityRepo */
        $activityRepo = App::make(ActivityRepository::class);
        $theme = $this->fakeActivityData($activityFields);
        return $activityRepo->create($theme);
    }

    /**
     * Get fake instance of Activity
     *
     * @param array $activityFields
     * @return Activity
     */
    public function fakeActivity($activityFields = [])
    {
        return new Activity($this->fakeActivityData($activityFields));
    }

    /**
     * Get fake data of Activity
     *
     * @param array $postFields
     * @return array
     */
    public function fakeActivityData($activityFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'Description' => $fake->word,
            'Date' => $fake->word,
            'task_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word,
            'deleted_at' => $fake->word
        ], $activityFields);
    }
}
