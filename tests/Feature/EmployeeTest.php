<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Employee;

class EmployeeTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_creates_an_employee()
    {
        $employee = Employee::factory()->create();

        $this->assertDatabaseHas('employees', [
            'id' => $employee->id,
        ]);
    }
}
