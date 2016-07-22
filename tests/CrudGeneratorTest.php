<?php

use org\bovigo\vfs\vfsStream;
use Yab\Laracogs\Generators\CrudGenerator;

class CrudGeneratorTest extends PHPUnit_Framework_TestCase
{
    protected $generator;
    protected $config;

    public function setUp()
    {
        $this->generator = new CrudGenerator();
        $this->config = [
            'bootstrap'                  => false,
            'semantic'                   => false,
            'template_source'            => '',
            '_sectionPrefix_'            => '',
            '_sectionTablePrefix_'       => '',
            '_sectionRoutePrefix_'       => '',
            '_sectionNamespace_'         => '',
            'relationships'              => null,
            'schema'                     => null,
            '_path_facade_'              => vfsStream::url('Facades'),
            '_path_service_'             => vfsStream::url('Services'),
            '_path_repository_'          => vfsStream::url('Repositories/'.ucfirst('testTable')),
            '_path_model_'               => vfsStream::url('Repositories/'.ucfirst('testTable')),
            '_path_controller_'          => vfsStream::url('Http/Controllers'),
            '_path_api_controller_'      => vfsStream::url('Http/Controllers/Api'),
            '_path_views_'               => vfsStream::url('resources/views'),
            '_path_tests_'               => vfsStream::url('tests'),
            '_path_request_'             => vfsStream::url('Http/Requests'),
            '_path_routes_'              => vfsStream::url('Http/routes.php'),
            '_path_api_routes_'          => vfsStream::url('Http/api-routes.php'),
            'routes_prefix'              => '',
            'routes_suffix'              => '',
            '_namespace_services_'       => 'App\Services',
            '_namespace_facade_'         => 'App\Facades',
            '_namespace_repository_'     => 'App\Repositories\\'.ucfirst('testTable'),
            '_namespace_model_'          => 'App\Repositories\\'.ucfirst('testTable'),
            '_namespace_controller_'     => 'App\Http\Controllers',
            '_namespace_api_controller_' => 'App\Http\Controllers\Api',
            '_namespace_request_'        => 'App\Http\Requests',
            '_lower_case_'               => strtolower('testTable'),
            '_lower_casePlural_'         => str_plural(strtolower('testTable')),
            '_camel_case_'               => ucfirst(camel_case('testTable')),
            '_camel_casePlural_'         => str_plural(camel_case('testTable')),
            'template_source'            => __DIR__.'/../src/Templates',
        ];
    }

    public function testApiGenerator()
    {
        $this->crud = vfsStream::setup("Http/Controllers/Api");

        $this->generator->createApi($this->config, false);
        $contents = $this->crud->getChild('Http/Controllers/Api/TestTableController.php');

        $this->assertTrue($this->crud->hasChild('Http/Controllers/Api/TestTableController.php'));
        $this->assertContains('class TestTableController extends Controller', $contents->getContent());
    }

    public function testControllerGenerator()
    {
        $this->crud = vfsStream::setup("Http/Controllers");
        $this->generator->createController($this->config);

        $this->assertTrue($this->crud->hasChild('Http/Controllers/TestTableController.php'));
        $contents = $this->crud->getChild('Http/Controllers/TestTableController.php');

        $this->assertContains('class TestTableController extends Controller', $contents->getContent());
    }

    public function testRepositoryGenerator()
    {
        $this->crud = vfsStream::setup("Repositories/TestTable");

        $this->generator->createRepository($this->config);
        $contents = $this->crud->getChild('Repositories/TestTable/TestTableRepository.php');

        $this->assertTrue($this->crud->hasChild('Repositories/TestTable/TestTableRepository.php'));
        $this->assertContains('class TestTableRepository', $contents->getContent());
    }

    public function testRequestGenerator()
    {
        $this->crud = vfsStream::setup("Http/Requests");

        $this->generator->createRequest($this->config);
        $contents = $this->crud->getChild('Http/Requests/TestTableRequest.php');

        $this->assertTrue($this->crud->hasChild('Http/Requests/TestTableRequest.php'));
        $this->assertContains('class TestTableRequest', $contents->getContent());
    }

    public function testServiceGenerator()
    {
        $this->crud = vfsStream::setup("Services");

        $this->generator->createService($this->config);
        $contents = $this->crud->getChild('Services/TestTableService.php');

        $this->assertTrue($this->crud->hasChild('Services/TestTableService.php'));
        $this->assertContains('class TestTableService', $contents->getContent());
    }

    public function testRoutesGenerator()
    {
        $this->crud = vfsStream::setup("Http");
        file_put_contents(vfsStream::url('Http/routes.php'), 'test');

        $this->generator->createRoutes($this->config, false);
        $contents = $this->crud->getChild('Http/routes.php');

        $this->assertContains('TestTableController', $contents->getContent());
        $this->assertContains('\'as\' => \'testtables.search\'', $contents->getContent());
        $this->assertContains('\'uses\' => \'TestTableController@search\'', $contents->getContent());
    }

    public function testViewsGenerator()
    {
        $this->crud = vfsStream::setup("resources/views");

        $this->generator->createViews($this->config);
        $contents = $this->crud->getChild('resources/views/testtables/index.blade.php');

        $this->assertTrue($this->crud->hasChild('resources/views/testtables/index.blade.php'));
        $this->assertContains('$testtable', $contents->getContent());
    }

    public function testTestGenerator()
    {
        $this->crud = vfsStream::setup("tests");

        $this->assertTrue($this->generator->createTests($this->config, false));

        $contents = $this->crud->getChild('tests/acceptance/TestTableAcceptanceTest.php');
        $this->assertTrue($this->crud->hasChild('tests/acceptance/TestTableAcceptanceTest.php'));
        $this->assertContains('class TestTableAcceptanceTest', $contents->getContent());

        $contents = $this->crud->getChild('tests/integration/TestTableRepositoryIntegrationTest.php');
        $this->assertTrue($this->crud->hasChild('tests/integration/TestTableRepositoryIntegrationTest.php'));
        $this->assertContains('class TestTableRepositoryIntegrationTest', $contents->getContent());

        $contents = $this->crud->getChild('tests/integration/TestTableServiceIntegrationTest.php');
        $this->assertTrue($this->crud->hasChild('tests/integration/TestTableServiceIntegrationTest.php'));
        $this->assertContains('class TestTableServiceIntegrationTest', $contents->getContent());
    }

    public function testTestGeneratorServiceOnly()
    {
        $this->crud = vfsStream::setup("tests");

        $this->assertTrue($this->generator->createTests($this->config, true));

        $this->assertFalse($this->crud->hasChild('tests/acceptance/TestTableAcceptanceTest.php'));

        $contents = $this->crud->getChild('tests/integration/TestTableRepositoryIntegrationTest.php');
        $this->assertTrue($this->crud->hasChild('tests/integration/TestTableRepositoryIntegrationTest.php'));
        $this->assertContains('class TestTableRepositoryIntegrationTest', $contents->getContent());

        $contents = $this->crud->getChild('tests/integration/TestTableServiceIntegrationTest.php');
        $this->assertTrue($this->crud->hasChild('tests/integration/TestTableServiceIntegrationTest.php'));
        $this->assertContains('class TestTableServiceIntegrationTest', $contents->getContent());
    }
}
