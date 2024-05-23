<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Employee;
use App\Models\Department;

class EmployeeControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_displays_employees_index()
    {
        $department = Department::factory()->create();
        $employee = Employee::factory()->create(['department_id' => $department->id]);

        $response = $this->get('employee');

        $response->assertStatus(200);
        $response->assertSee($employee->name);
    }
}
