<?php

namespace Tests\Unit;

use App\Models\Tasks;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\TestResponse;

// use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class TasksTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function user_can_store_a_task()
    {
        $data = [
            'title' => $this->faker()->sentence,
            'description' => $this->faker()->paragraph,
            'completed' => false,
        ];

        /* $response =  */
        $this->post('/tasks', $data)->assertRedirect('/tasks');
        $task = Tasks::first();
        $this->assertEquals($data['title'], $task->title);
        $this->assertEquals($data['description'], $task->description);
        $this->assertEquals($data['completed'], $task->completed);
        // $response->assertStatus(302);
        // $this->assertDatabaseHas('tasks', $data);
    }

    /** @test */
    public function user_can_update_a_task()
    {
        $task = Tasks::factory()->create();

        $newData = [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'completed' => true,
        ];

        $this->put("/tasks/{$task->id}", $newData)->assertRedirect('/tasks');

        $task->refresh();

        $this->assertEquals($newData['title'], $task->title);
        $this->assertEquals($newData['description'], $task->description);
        $this->assertEquals($newData['completed'], $task->completed);
    }

    /** @test */
    public function user_can_delete_a_task()
    {
        $task = Tasks::factory()->create();

        $this->delete("/tasks/{$task->id}")->assertStatus(302);
        $this->assertNull(Tasks::find($task->id));
    }
    /** @test */
     public function user_can_visit_tasks_index()
    {
        $tasks = Tasks::factory()->count(3)->create();
        $response =  $this->get('/tasks')->assertStatus(200)->assertViewIs('tasks.index');
        $this->assertCount(3, $response->viewData('tasks'));
    }
    /** @test */
    public function user_can_visit_tasks_create()
    {
        $this->get('/tasks/create')->assertStatus(200)->assertViewIs('tasks.create');
    }
    /** @test */
    public function user_can_visit_tasks_edit()
    {
        $task = Tasks::factory()->create();
        $response = $this->get("/tasks/{$task->id}/edit");
        $this->assertEquals($task->id, $response->viewData('task')->id);
    }
}
