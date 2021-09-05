# Laravel 8 from scratch

This project was made during
watching [Laracasts laravel from scratch series](https://laracasts.com/series/laravel-8-from-scratch)

## features

The features implemented in this project are :

* posts CRUD : full Post resource create, read, update, delete has been implemented for the admin.
* category : full category resource create, read, update delete has been implemented for the admin.
* post comments : each post may have many comments.
* authentication: the authentication in this project is been implemented from scratch and no third party libraries have
  been used.
* admin : a simple admin feature has been implemented using the laravel Gate facade
* admin dashboard : the admin of the website can create posts or update them.
* authorization: Using laravel 'can' middleware authorization for resources have been implemented.
* newsletter:  using mailchimp api a newsletter has been implemented.

## technical aspects

- using form request class to separate validation logic from controllers.

## screenshots

Homepage:
![Homepage](/screen_shots/homepage.png)

Register:
![register page](/screen_shots/register.png)

All posts:
![all posts](/screen_shots/all_posts.png)

Single Post:
![single post view](/screen_shots/single_post.png)
