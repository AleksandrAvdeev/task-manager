<?php

namespace App\TasksManager\Tasks\Services;

use App\TasksManager\Tasks\DTO\TaskDTO;
use App\TasksManager\Tasks\Models\Task;
use App\TasksManager\Tasks\Repositories\TasksRepository;
use Illuminate\Database\Eloquent\Collection;

class TasksService
{
    public function __construct(protected TasksRepository $tasksRepository)
    {
    }

    public function insertTaskData(TaskDTO $taskDTO): Task
    {
        return $this->tasksRepository->insertTaskDataFromDB($taskDTO);
    }

    public function getTasksPage(int $limit, int $offset): Collection
    {
        $offset = ($offset - 1) * $limit;

        $tasks = $this->tasksRepository->getTasksPageFromDB($limit, $offset);

        return $tasks;
    }

    /**
     * @throws \Exception
     */
    public function getTaskById(int $id): Task
    {
        $task = $this->tasksRepository->getTaskByIdFromDB($id);

        if ($task === null) {
            throw new \Exception('Задача не найдена', 404);
        }

        return $task;
    }

    /**
     * @throws \Exception
     */
    public function changeTaskData(TaskDTO $taskDTO, int $id): Task
    {
        $this->tasksRepository->changeTaskDataFromDB($taskDTO, $id);

        $task = $this->getTaskById($id);

        return $task;
    }

    public function deleteTask(int $id): void
    {
        $this->tasksRepository->deleteTaskFromDB($id);
    }
}
