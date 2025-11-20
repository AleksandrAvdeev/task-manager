<?php

namespace App\TasksManager\Tasks\DTO;

class TaskDTO
{
    public function __construct(
        protected string $title,
        protected string $description,
        protected int $status
    )
    {
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getStatus(): int
    {
        return $this->status;
    }
}
