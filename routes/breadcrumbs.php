<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.

use App\Http\Controllers\SettingController;
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('dashboard'));
});

// User
Breadcrumbs::for('user.index', function (BreadcrumbTrail $trail) {
    $trail->push('User', route('user.index'));
});

Breadcrumbs::for('user.create', function (BreadcrumbTrail $trail) {
    $trail->parent('user.index');
    $trail->push('Create', route('user.create'));
});

// Project
Breadcrumbs::for('project.index', function (BreadcrumbTrail $trail) {
    $trail->push('Project', route('project.index'));
});
Breadcrumbs::for('project.create', function (BreadcrumbTrail $trail) {
    $trail->parent('project.index');
    $trail->push('Create', route('project.create'));
});
Breadcrumbs::for('project.edit', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('project.index');
    $trail->push('Edit', route('project.edit', $id));
});

// Task
Breadcrumbs::for('task.index', function (BreadcrumbTrail $trail) {
    $trail->push('Task', route('task.index'));
});
Breadcrumbs::for('task.create', function (BreadcrumbTrail $trail) {
    $trail->parent('task.index');
    $trail->push('Create', route('task.create'));
});
Breadcrumbs::for('task.edit', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('task.index');
    $trail->push('Edit', route('task.edit', $id));
});

// Setting
Breadcrumbs::for('setting.index', function (BreadcrumbTrail $trail) {
    $trail->push('Setting', action('App\Http\Controllers\SettingController@index'));
});
Breadcrumbs::for('setting.app.create', function (BreadcrumbTrail $trail) {
    $trail->parent('setting.index');
    $trail->push('Create App-Website', route('setting.app.create'));
});
Breadcrumbs::for('setting.app.edit', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('setting.index');
    $trail->push('Edit App-Website', route('setting.app.edit', $id));
});

// Report
Breadcrumbs::for('report.all', function (BreadcrumbTrail $trail) {
    $trail->push('Report - All User', route('report.all_user'));
});
Breadcrumbs::for('report.one', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('report.all');
    $trail->push('Report - One User', route('report.one', $id));
});
Breadcrumbs::for('report.detail', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('report.one', $id);
    $trail->push('Report - Detail', route('report.detail', $id));
});

