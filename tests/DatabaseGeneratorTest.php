<?php

use Yab\Laracogs\Generators\DatabaseGenerator;

class DatabaseGeneratorTest extends AppTest
{
    protected $generator;
    protected $config;

    public function setUp()
    {
        parent::setUp();
        $this->generator = new DatabaseGenerator();
        $this->config = [
            '_path_migrations_' => base_path('database/migrations')
        ];
    }

    public function testCreateMigrationFail()
    {
        $this->setExpectedException('Exception');

        $this->generator->createMigration('alskfdjbajlksbdfl', 'TestTable', 'lkdblkabflabsd');
    }

    public function testCreateMigrationSuccess()
    {
        $this->createMigration();
    }

    public function testCreateMigrationSuccessAlternativeLocation()
    {
        $this->createMigration('alternative_migrations_location');

        $this->assertCount(1, glob(base_path('alternative_migrations_location').'/*'));
    }

    public function testCreateSchema()
    {
        $migrations = $this->createMigration();

        $this->generator->createSchema($this->config, '', 'TestTable', [], 'id:increments,name:string');

        $this->assertContains('testtables', file_get_contents($migrations[0]));
        $this->assertContains('table->increments(\'id\')', file_get_contents($migrations[0]));
    }

    public function testCreateSchemaAlternativeLocation()
    {
        $migrations = $this->createMigration('alternative_migrations_location');

        $this->generator->createSchema($this->config, '', 'TestTable', [], 'id:increments,name:string');

        $this->assertContains('testtables', file_get_contents($migrations[0]));
        $this->assertContains('table->increments(\'id\')', file_get_contents($migrations[0]));
    }

    private function createMigration($location = null)
    {
        if ($location) {
            $this->config = [
                '_path_migrations_' => base_path($location)
            ];
        }

        $this->generator->createMigration($this->config , '', 'TestTable', []);
        $migrations = glob($this->config['_path_migrations_'].'/*');

        $this->assertCount(1, $migrations);

        return $migrations;
    }

    public function tearDown()
    {
        parent::tearDown();

        array_map('unlink', glob($this->config['_path_migrations_'] . '/*'));
    }
}
