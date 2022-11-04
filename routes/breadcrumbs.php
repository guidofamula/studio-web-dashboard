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

// Home > Blog
// Breadcrumbs::for('blog', function (BreadcrumbTrail $trail) {
//     $trail->parent('home');
//     $trail->push('Blog', route('blog'));
// });

// Home > Blog > [Category]
// Breadcrumbs::for('category', function (BreadcrumbTrail $trail, $category) {
//     $trail->parent('blog');
//     $trail->push($category->title, route('category', $category));
// });
