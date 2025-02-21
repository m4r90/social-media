# Social Media PHP MVC Application

A PHP-based social media platform built using the Model-View-Controller (MVC) architectural pattern. This application allows users to create accounts, share posts, interact with other users, and manage their social connections.

## Features

- User authentication and authorization
- Post creation and management
- Friend system
- Reactions and comments on posts
- Image uploads for posts
- Admin dashboard for user management

## Technical Stack

- PHP 7.4+
- MySQL/MariaDB
- MVC Architecture
- Composer for dependency management
- Tailwind CSS for styling

## Project Structure

- `/controllers` - Application logic and request handling
- `/models` - Data models and database interactions
- `/views` - User interface templates
- `/dao` - Data Access Objects for database operations
- `/etc` - Configuration files
- `/helpers` - Utility classes
- `/templates` - Reusable UI components

## Database Schema

The application uses several interconnected tables:
- `users` - User account information
- `posts` - User posts and content
- `friends` - Friend relationships between users
- `reactions` - Post reactions and comments
- `post_images` - Images associated with posts

## Security Features

- Password encryption
- Session management
- Input sanitization
- CSRF protection
- XSS prevention

## Getting Started

1. Install dependencies:
```bash
composer update
```

2. Configure your database in `etc/Config.php`

3. Access the application through your web server:
```
http://localhost/index.php
```

For detailed SQL queries and database operations, see the SQL commands section below.

# SQL commands

## Posts User

List the first 10 public posts from most recent ones
```sql
SELECT * FROM `posts` WHERE `public` = 1 ORDER BY `datecreate` DESC LIMIT 10;


```

List my first 10 posts
```sql
SELECT * FROM `posts` WHERE `userid` = <your_user_id> ORDER BY `datecreate` DESC LIMIT 10;

```

List the first 10 posts from all my friends
```sql
SELECT p.* 
FROM `posts` p
JOIN `friends` f ON p.`userid` = f.`fid`
WHERE f.`uid` = <your_user_id>
ORDER BY p.`datecreate` DESC
LIMIT 10;

```

List the first 10 posts from one friend
```sql
SELECT * FROM `posts` WHERE `userid` = <friend_user_id> ORDER BY `datecreate` DESC LIMIT 10;

```

List the first 10 posts with a specific date
```sql
SELECT * FROM `posts` WHERE `datecreate` = 'specific_date' AND `public` = 1 LIMIT 10;

```

List the first 10 posts with a specific month
```sql
SELECT *
FROM `posts`
WHERE MONTH(`datecreate`) = 01
AND `public` = 1
LIMIT 10;
```

List the next 10 posts from most recent (section by section)
```sql
SELECT * FROM `posts` WHERE  `public` = 1 ORDER BY `datecreate` DESC LIMIT 10 OFFSET 10;

```

## User

List all my friends
```sql
SELECT u.* FROM `users` u
JOIN `friends` f ON u.`id` = f.`fid`
WHERE f.`uid` = <your_user_id>;

```

Show my profile info
```sql
SELECT * FROM `users` where id = 1;

```

Show the name, avatar, and surname of private users (if friends)
```sql
SELECT * FROM `users` where id = 1;

```


## Admin

List all the users
```sql
SELECT * FROM `users`;

```

List blocked users
```sql
SELECT * FROM `users` WHERE `valid` = 0;

```

List all posts
```sql
SELECT * FROM `posts` ORDER BY `datecreate` DESC LIMIT 10;

```