<?php

namespace App\TasksManager\Tasks\Enums;

class StatusValue
{
    public const BACKLOG_ID = 1;
    public const TODO_ID = 2;
    public const PROGRESS_ID = 3;
    public const REVIEW_ID = 4;
    public const TESTING_ID = 5;
    public const BLOCK_ID = 6;
    public const DONE_ID = 7;

    public const VALUES = [
        self::BACKLOG_ID => 'В беклоге',
        self::TODO_ID => 'Нужно сделать',
        self::PROGRESS_ID => 'В работе',
        self::REVIEW_ID => 'На ревью',
        self::TESTING_ID => 'В тестировании',
        self::BLOCK_ID => 'Заблокирована',
        self::DONE_ID => 'Готово',
    ];
}
