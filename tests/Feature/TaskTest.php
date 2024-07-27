<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Task;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_task()
    {
        $response = $this->postJson('/api/tasks', [
            'title' => 'Test Task',
            'description' => 'This is a test task',
            'status' => 'Waiting List',
            'due_date' => '2024-12-31',
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('tasks', [
            'title' => 'Test Task',
        ]);
    }

    /** @test */
    public function it_can_update_a_task()
    {
        $task = Task::factory()->create();

        $response = $this->putJson('/api/tasks/' . $task->id, [
            'status' => 'In Progress',
        ]);

        $response->assertStatus(200);
        $this->assertDatabaseHas('tasks', [
            'id' => $task->id,
            'status' => 'In Progress',
        ]);
    }

    /** @test */
    public function it_can_soft_delete_a_task()
    {
        $task = Task::factory()->create(); 

        $response = $this->deleteJson('/api/tasks/' . $task->id);

        $response->assertStatus(204);
        $this->assertSoftDeleted('tasks', [
            'id' => $task->id,
        ]);
    }
}
