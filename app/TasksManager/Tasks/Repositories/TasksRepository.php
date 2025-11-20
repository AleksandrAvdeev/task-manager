<?php

namespace App\TasksManager\Tasks\Repositories;

use App\TasksManager\Tasks\DTO\TaskDTO;
use App\TasksManager\Tasks\Models\Task;
use Illuminate\Database\Eloquent\Collection;

class TasksRepository
{
    public function insertTaskDataFromDB(TaskDTO $taskDTO): Task
    {
        return Task::query()->create([
            'title' => $taskDTO->getTitle(),
            'description' => $taskDTO->getDescription(),
            'status' => $taskDTO->getStatus(),
        ]);
    }

    public function getTasksPageFromDB(int $limit, int $offset): Collection
    {
        $tasks = Task::query()
            ->offset($offset)
            ->limit($limit)
            ->get();

        return $tasks;
    }

    public function getTaskByIdFromDB(int $id): ?Task
    {
        $task = Task::query()
            ->where('task_id', $id)
            ->first();

        return $task;
    }

    public function changeTaskDataFromDB(TaskDTO $taskDTO, int $id): void
    {
        Task::query()
            ->where('task_id', $id)
            ->update([
                'title' => $taskDTO->getTitle(),
                'description' => $taskDTO->getDescription(),
                'status' => $taskDTO->getStatus(),
            ]);
    }

    public function deleteTaskFromDB(int $id): void
    {
        Task::query()
            ->where('task_id', $id)
            ->delete();
    }
}
