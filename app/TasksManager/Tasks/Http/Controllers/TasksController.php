<?php

namespace App\TasksManager\Tasks\Http\Controllers;

use App\TasksManager\Tasks\DTO\TaskDTO;
use App\TasksManager\Tasks\Http\Requests\CreateRequest;
use App\TasksManager\Tasks\Http\Requests\ListRequest;
use App\TasksManager\Tasks\Http\Requests\UpdateRequest;
use App\TasksManager\Tasks\Services\TasksService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Request;

class TasksController
{
    public function __construct(protected TasksService $tasksService)
    {
    }

    public function create(CreateRequest $request): JsonResource
    {
        $title = $request->title;
        $description = $request->description;
        $status = $request->status;

        $taskDTO = new TaskDTO($title, $description, $status);

        $task = $this->tasksService->insertTaskData($taskDTO);

        return new JsonResource($task);
    }

    public function list(ListRequest $request): JsonResource
    {
        $limit = $request->limit ?? 10;
        $offset = $request->offset ?? 1;

        $tasks = $this->tasksService->getTasksPage($limit, $offset);

        return new JsonResource($tasks);
    }

    public function show(Request $request, int $id): JsonResource
    {
        $task = $this->tasksService->getTaskById($id);

        return new JsonResource($task);
    }

    /**
     * @throws \Exception
     */
    public function update(UpdateRequest $request, int $id): JsonResource
    {
        $title = $request->title;
        $description = $request->description;
        $status = $request->status;

        $taskDTO = new TaskDTO($title, $description, $status);

        $task = $this->tasksService->changeTaskData($taskDTO, $id);

        return new JsonResource($task);
    }

    public function delete(Request $request, int $id): JsonResponse
    {
        $this->tasksService->deleteTask($id);

        return new JsonResponse([
            'message' => 'Задача успешно удалена'
        ]);
    }
}
