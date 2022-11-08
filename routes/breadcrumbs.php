<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Dashboard Parent/induk
Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->push( trans('dashboard.title.index'), route('dashboard.index'));
});

// Dashboard -> Home
Breadcrumbs::for('dashboard-home', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Home', '#');
});

// Dashboard -> Categories
Breadcrumbs::for('dashboard-categories', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push(trans('categories.title.index'), route('categories.index'));
});

// Dashboard -> Categories -> Add Category
Breadcrumbs::for('add-category', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard-categories');
    $trail->push( trans('categories.title.create'), '#');
});

// Dashboard -> Categories -> Edit Category
Breadcrumbs::for('edit-category', function (BreadcrumbTrail $trail, $category) {
    $trail->parent('dashboard-categories');
    $trail->push(trans('categories.title.edit'), route('categories.edit', ['category' => $category]));
});

// Dashboard -> Categories -> Edit Category -> Title Category
Breadcrumbs::for('edit-category-title', function (BreadcrumbTrail $trail, $category) {
    $trail->parent('edit-category', $category);
    $trail->push($category->title, '#');
});

// Dashboard -> Categories -> Detail Category
Breadcrumbs::for('detail-category', function (BreadcrumbTrail $trail, $category) {
    $trail->parent('dashboard-categories');
    $trail->push(trans('categories.title.detail'), route('categories.show', ['category' => $category]));
});

// Dashboard -> Categories -> Detail Category -> Title Category
Breadcrumbs::for('detail-category-title', function (BreadcrumbTrail $trail, $category) {
    $trail->parent('detail-category', $category);
    $trail->push($category->title, '#');
});

// Dashboard -> Tags
Breadcrumbs::for('dashboard-tags', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push(trans('tags.title.index'), route('tags.index'));
});

// Dashboard -> Tags -> Add
Breadcrumbs::for('add-tag', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard-tags');
    $trail->push(trans('tags.title.create'), '#');
});

// Dashboard -> Tags -> Edit Tag -> [title]
Breadcrumbs::for('edit-tag', function (BreadcrumbTrail $trail, $tag) {
    $trail->parent('dashboard-tags');
    $trail->push(trans('tags.title.edit'), route('tags.edit', ['tag' => $tag]));
    $trail->push($tag->title, route('tags.edit', ['tag' => $tag] ));
});

// Dashboard -> Posts
Breadcrumbs::for('dashboard-posts', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push(trans('posts.title.index'), route('posts.index'));
});

// Dashboard -> Posts -> Add Post
Breadcrumbs::for('add-post', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard-posts');
    $trail->push(trans('posts.title.create'), '#');
});

// Dashboard -> Posts -> Detail Category -> Title
Breadcrumbs::for('detail-post', function (BreadcrumbTrail $trail, $post) {
    $trail->parent('dashboard-posts');
    $trail->push(trans('posts.title.detail'), route('posts.show', ['post' => $post]));
    $trail->push($post->title, '#');
});

// Dashboard -> Posts -> Edit Category -> Title
Breadcrumbs::for('edit-post', function (BreadcrumbTrail $trail, $post) {
    $trail->parent('dashboard-posts');
    $trail->push(trans('posts.title.edit'), route('posts.edit', ['post' => $post]));
    $trail->push($post->title, '#');
});

// Dashboard -> File Manager
Breadcrumbs::for('dashboard-filemanager', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push(trans('filemanager.title.index'), route('filemanager.index'));
});

// Dashboard -> Roles
Breadcrumbs::for('dashboard-roles', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push(trans('roles.title.index'), route('roles.index'));
});

// Dashboard -> Roles -> Detail Role -> Title
Breadcrumbs::for('detail-role', function (BreadcrumbTrail $trail, $role) {
    $trail->parent('dashboard-roles');
    $trail->push(trans('roles.title.detail'), route('roles.show', ['role' => $role]));
    $trail->push($role->name, '#');
});

// Dashboard -> Roles -> Add Role -> Title
Breadcrumbs::for('add-role', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard-roles');
    $trail->push(trans('roles.title.create'), route('roles.create'));
});

// Dashboard -> Roles -> Edit Role -> Title
Breadcrumbs::for('edit-role', function (BreadcrumbTrail $trail, $role) {
    $trail->parent('dashboard-roles');
    $trail->push(trans('roles.title.edit'), route('roles.edit', ['role' => $role]));
    $trail->push($role->name, '#');
});

// Dashboard -> Users
Breadcrumbs::for('dashboard-users', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push(trans('users.title.index'), route('users.index'));
});
