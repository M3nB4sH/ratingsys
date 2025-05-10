<?php

use App\Http\Controllers\RatingController;
use App\Http\Controllers\SignController;
use App\Http\Controllers\SignRatingController;
use App\Livewire\Activities\ActivityCreate;
use App\Livewire\Activities\ActivityEdit;
use App\Livewire\Activities\ActivityIndex;
use App\Livewire\Competencies\CompetenceCreate;
use App\Livewire\Competencies\CompetenceEdit;
use App\Livewire\Competencies\CompetenceIndex;
use App\Livewire\EducationalExperience\EducationalExperienceCreate;
use App\Livewire\EducationalExperience\EducationalExperienceEdit;
use App\Livewire\EducationalExperience\EducationalExperienceIndex;
use App\Livewire\Estimates\EstimateCreate;
use App\Livewire\Estimates\EstimateEdit;
use App\Livewire\Estimates\EstimateIndex;
use App\Livewire\Fields\FieldCreate;
use App\Livewire\Fields\FieldEdit;
use App\Livewire\Fields\FieldIndex;
use App\Livewire\Forms\FormActivityCreate;
use App\Livewire\Forms\FormActivityEdit;
use App\Livewire\Forms\FormCompetenceCreate;
use App\Livewire\Forms\FormCompetenceEdit;
use App\Livewire\Forms\FormFieldCreate;
use App\Livewire\Forms\FormFieldEdit;
use App\Livewire\Forms\FormIndex;
use App\Livewire\Levels\LevelCreate;
use App\Livewire\Levels\LevelEdit;
use App\Livewire\Levels\LevelIndex;
use App\Livewire\Periods\PeriodCreate;
use App\Livewire\Periods\PeriodEdit;
use App\Livewire\Periods\PeriodIndex;
use App\Livewire\Ratings\RatingCreate;
use App\Livewire\Ratings\RatingIndex;
use App\Livewire\Ratings\RatingShow;
use App\Livewire\Roles\RoleCreate;
use App\Livewire\Roles\RoleEdit;
use App\Livewire\Roles\RoleIndex;
use App\Livewire\Roles\RoleShow;
use App\Livewire\Signatures\SignCreate;
use App\Livewire\Signatures\SignEdit;
use App\Livewire\Signatures\SignIndex;
use App\Livewire\Teachers\TeacherCreate;
use App\Livewire\Teachers\TeacherEdit;
use App\Livewire\Teachers\TeacherIndex;
use App\Livewire\Teachers\TeacherShow;
use App\Livewire\Users\UserCreate;
use App\Livewire\Users\UserEdit;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Livewire\Users\UserIndex;
use App\Livewire\Users\UserShow;
use App\Livewire\Weeks\WeekCreate;
use App\Livewire\Weeks\WeekEdit;
use App\Livewire\Weeks\WeekIndex;

Route::get('/', function () {
    return view('welcome');
})->name('home');

    Route::get('/rating/{id}/show', [RatingController::class, 'show'])->name('rating.show');
    Route::get('/rating/{id}/pdf', [RatingController::class, 'pdf'])->name('rating.pdf');

    Route::get('rating/teacher/signature/{rating}', [SignRatingController::class, 'teachercreate'])->name('sign.teachercreate');
    Route::get('rating/manager/signature/{rating}', [SignRatingController::class, 'managercreate'])->name('sign.managercreate');
    Route::get('rating/director/signature/{rating}', [SignRatingController::class, 'directorcreate'])->name('sign.directorcreate');
    Route::post('rating/teacher/signature/confirm', [SignRatingController::class, 'teacherstore'])->name('sign.teacherconfirm');
    Route::post('rating/manager/signature/confirm', [SignRatingController::class, 'managerstore'])->name('sign.managerconfirm');
    Route::post('rating/director/signature/confirm', [SignRatingController::class, 'directorstore'])->name('sign.directorconfirm');

    Route::view('rating/signature/thanks', 'signature.signfinish')
    ->name('signature.thanks');
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {

    Route::redirect('settings', 'settings/profile');

    Route::get('users',UserIndex::class)->name('user.index')->middleware('permission:user.create|user.edit|user.view|user.delete');
    Route::get('users/create',UserCreate::class)->name('user.create')->middleware('permission:user.create');
    Route::get('users/{id}/edit',UserEdit::class)->name('user.edit')->middleware('permission:user.edit');
    Route::get('users/{id}',UserShow::class)->name('user.show');

    Route::get('signature', [SignController::class, 'create'])->name('sign.create');
    Route::post('signature/confirm', [SignController::class, 'store']);

    Route::get('teachers',TeacherIndex::class)->name('teacher.index')->middleware('permission:teacher.create|teacher.edit|teacher.view|teacher.delete');
    Route::get('teachers/create',TeacherCreate::class)->name(name: 'teacher.create')->middleware('permission:teacher.create');
    Route::get('teachers/{id}/edit',TeacherEdit::class)->name('teacher.edit')->middleware('permission:teacher.edit');
    Route::get('teachers/{id}',TeacherShow::class)->name('teacher.show')->middleware('permission:teacher.view');

    Route::get('roles',RoleIndex::class)->name('role.index')->middleware('permission:role.create|role.edit|role.view|role.delete');
    Route::get('role/create',RoleCreate::class)->name('role.create')->middleware('permission:role.create');
    Route::get('role/{id}/edit',RoleEdit::class)->name('role.edit')->middleware('permission:role.edit');
    Route::get('role/{id}',RoleShow::class)->name('role.show')->middleware('permission:role.view');

    Route::get('eduexps',EducationalExperienceIndex::class)->name('eduexp.index');
    Route::get('eduexps/create',EducationalExperienceCreate::class)->name('eduexp.create');
    Route::get('eduexps/{id}/edit',EducationalExperienceEdit::class)->name('eduexp.edit');

    Route::get('levels',LevelIndex::class)->name('level.index');
    Route::get('levels/create',LevelCreate::class)->name('level.create');
    Route::get('levels/{id}/edit',LevelEdit::class)->name('level.edit');

    Route::get('periods',PeriodIndex::class)->name('period.index');
    Route::get('periods/create',PeriodCreate::class)->name('period.create');
    Route::get('periods/{id}/edit',PeriodEdit::class)->name('period.edit');

    Route::get('weeks',WeekIndex::class)->name('week.index');
    Route::get('weeks/create',WeekCreate::class)->name('week.create');
    Route::get('weeks/{id}/edit',WeekEdit::class)->name('week.edit');

    Route::get('estimates',EstimateIndex::class)->name('estimate.index');
    Route::get('estimates/create',EstimateCreate::class)->name('estimate.create');
    Route::get('estimates/{id}/edit',EstimateEdit::class)->name('estimate.edit');

    Route::get('competencies',CompetenceIndex::class)->name('competence.index');
    Route::get('competencies/create',CompetenceCreate::class)->name('competence.create');
    Route::get('competencies/{id}/edit',CompetenceEdit::class)->name('competence.edit');

    Route::get('fields',FieldIndex::class)->name('field.index');
    Route::get('fields/create',FieldCreate::class)->name('field.create');
    Route::get('fields/{id}/edit',FieldEdit::class)->name('field.edit');

    Route::get('activities',ActivityIndex::class)->name('activity.index');
    Route::get('activities/create',ActivityCreate::class)->name('activity.create');
    Route::get('activities/{id}/edit',ActivityEdit::class)->name('activity.edit');

    // Forms
    Route::get('forms',FormIndex::class)->name('form.index');
    Route::get('forms/fieldcreate',FormFieldCreate::class)->name('formfield.create');
    Route::get('forms/{id}/fieldedit', FormFieldEdit::class)->name('formfield.edit');
    Route::get('forms/activitycreate',FormActivityCreate::class)->name('formactivity.create');
    Route::get('forms/{id}/activityedit', FormActivityEdit::class)->name('formactivity.edit');
    Route::get('forms/competencecreate',FormCompetenceCreate::class)->name('formcompetence.create');
    Route::get('forms/{id}/competenceyedit', FormCompetenceEdit::class)->name('formcompetence.edit');

    Route::get('ratings',RatingIndex::class)->name('rating.index');
    Route::get('ratings/create',RatingCreate::class)->name('rating.create');


    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
