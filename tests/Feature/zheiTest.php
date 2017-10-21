<?php

namespace Tests\Feature;

use App\Http\Controllers\HomeController;

use App\Order;
use Tests\APIStatus;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class zheiTest extends TestCase
{

    public $status;

    /**
     * zheiTest constructor.
     * @param null $name
     * @param array $data
     * @param string $dataName
     */
    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->status = new APIStatus();
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }


    /**
     * @test
     * @group now
     * 行為測試
     */
    public function 測試return200()
    {
        /* arrange */

        /* act */
        $target = $this->get(url('/zheyu'));
        /* assert */

        $target->assertStatus(200);
        $target->assertJson($this->status->indexStatus());
    }

    /**
     * Controller 單元測試
     */
    public function testHomeController()
    {
        $mock = \Mockery::mock(Order::class);
        $mock->shouldReceive('create')
            ->times(1)
            ->andReturnNull();

        $target = new HomeController($mock);
        $target->useOrder();
    }

    /**
     * @expectedException \Exception
     * Controller 單元測試
     */
    public function testFun3()
    {
        $mock = \Mockery::mock(Order::class);
        $target = new HomeController($mock);

        $target->fun2(2);
    }

    /**
     * Controller 單元測試
     */
    public function testFun2()
    {
        $mock = \Mockery::mock(Order::class);
        $target = new HomeController($mock);

        $this->expectException(\Exception::class);
        $target->fun2(2);

    }
}
