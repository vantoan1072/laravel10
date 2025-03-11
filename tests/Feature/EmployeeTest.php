<?php

namespace Tests\Feature;

use App\Models\Employees;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EmployeeTest extends TestCase
{
    use RefreshDatabase;

    public function test_update_employee()
    {
        // Tạo một nhân viên mới
        $employee = Employees::factory()->create([
            'name' => 'Old Name',
            'email' => 'old@example.com',
            'position' => 'Developer'
        ]);

        // Gửi request để update thông tin nhân viên
        $response = $this->putJson("/employees/{$employee->id}", [
            'name' => 'New Name',
            'email' => 'new@example.com',
            'position' => 'Senior Developer'
        ]);

        // Kiểm tra phản hồi trả về
        $response->assertStatus(200)
                 ->assertJson([
                     'message' => 'Employee updated successfully',
                     'employee' => [
                         'name' => 'New Name',
                         'email' => 'new@example.com',
                         'position' => 'Senior Developer'
                     ]
                 ]);

        // Kiểm tra trong database
        $this->assertDatabaseHas('employees', [
            'id' => $employee->id,
            'name' => 'New Name',
            'email' => 'new@example.com',
            'position' => 'Senior Developer'
        ]);
    }
}
