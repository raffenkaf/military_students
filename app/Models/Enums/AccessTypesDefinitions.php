<?php

namespace App\Models\Enums;

enum AccessTypesDefinitions: string
{
    case ADMIN_MANAGE_USERS = '1 - можливість керувати користувачами/групами(суперадмін)';
    case ADMIN_MANAGE_QUESTION_TOPICS = '2 - можливість керувати питаннями до екзаменів(суперадмін)';
    case ADMIN_MANAGE_EXAMS = '3 - можливість керувати екзаменами(суперадмін)';
    case ADMIN_MANAGE_STUDY_MATERIALS = '4 - можливість керувати учбовими матеріалами(викладач)';
    case ADMIN_WATCH_EXAM_RESULTS = '5 - можливість бачити результати екзаменів(викладач)';
    case ALL_STUDY_MATERIALS = '6 - можливість бачити всі учбові матеріали';
    case SOME_STUDY_MATERIALS = '7 - можливість бачити частину учбових матеріалів';
}
