<?php

use Faker\Factory as Faker;
use App\Models\Revision;
use App\Repositories\RevisionRepository;

trait MakeRevisionTrait
{
    /**
     * Create fake instance of Revision and save it in database
     *
     * @param array $revisionFields
     * @return Revision
     */
    public function makeRevision($revisionFields = [])
    {
        /** @var RevisionRepository $revisionRepo */
        $revisionRepo = App::make(RevisionRepository::class);
        $theme = $this->fakeRevisionData($revisionFields);
        return $revisionRepo->create($theme);
    }

    /**
     * Get fake instance of Revision
     *
     * @param array $revisionFields
     * @return Revision
     */
    public function fakeRevision($revisionFields = [])
    {
        return new Revision($this->fakeRevisionData($revisionFields));
    }

    /**
     * Get fake data of Revision
     *
     * @param array $postFields
     * @return array
     */
    public function fakeRevisionData($revisionFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'Date' => $fake->word,
            'Number' => $fake->word,
            'description' => $fake->word,
            'file' => $fake->word,
            'document_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word,
            'deleted_at' => $fake->word
        ], $revisionFields);
    }
}
