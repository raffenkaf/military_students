<?php

namespace App\Models\Enums;

enum AccessTypes: int
{
    case ADMIN_MANAGE_USERS = 1;
    case ADMIN_MANAGE_QUESTION_TOPICS = 2;
    case ADMIN_MANAGE_EXAMS = 3;
    case ADMIN_MANAGE_STUDY_MATERIALS = 4;
    case ADMIN_WATCH_EXAM_RESULTS = 5;
    case ALL_STUDY_MATERIALS = 6;
    case SOME_STUDY_MATERIALS = 7;
}
