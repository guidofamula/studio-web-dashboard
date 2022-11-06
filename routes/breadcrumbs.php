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
