composer update

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