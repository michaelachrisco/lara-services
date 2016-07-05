<?php

abstract class TestCase extends Illuminate\Foundation\Testing\TestCase
{
    use VladaHejda\AssertException;
    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

        return $app;
    }

    public function assertBelongsTo($relation, $relationName)
    {
      $this->assertEquals('Illuminate\Database\Eloquent\Relations\BelongsTo', get_class($relation));

      $this->assertEquals($relationName, get_class($relation->getRelated()));
    }

    public function assertHasOne($relation, $relationName)
    {
      $this->assertEquals('Illuminate\Database\Eloquent\Relations\HasOne', get_class($relation));

      $this->assertEquals($relationName, get_class($relation->getRelated()));
    }

    public function assertHasMany($relation, $relationName)
    {
      $this->assertEquals('Illuminate\Database\Eloquent\Relations\HasMany', get_class($relation));

      $this->assertEquals($relationName, get_class($relation->getRelated()));
    }
}
